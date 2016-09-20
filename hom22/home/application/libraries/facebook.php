<?php
require_once "base_facebook.php";
class Facebook extends BaseFacebook
{
  
  const FBSS_COOKIE_NAME = 'fbss';
  const FBSS_COOKIE_EXPIRE = 31556926; // 1 year

  /**
   * Stores the shared session ID if one is set.
   *
   * @var string
   */
  protected $sharedSessionID;
  public function __construct($config) {

    if ((function_exists('session_status') 
      && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
      session_start();
    }

    $_REQUEST += $_GET;

    if($config == null){
      $this->_ci =& get_instance();
      $this->_ci->load->config('facebook');
      $config = array(
        'appId' => $this->_ci->config->item('appId'),
        'secret' => $this->_ci->config->item('secret'),
        );
    }
    
    if( !isset($config['appId']) || !isset($config['secret']) ){
      $this->_ci =& get_instance();
      $this->_ci->load->config('facebook');
      $config['appId'] = $this->_ci->config->item('appId');
      $config['secret'] = $this->_ci->config->item('secret');
    }

    parent::__construct($config);
    if (!empty($config['sharedSession'])) {
      $this->initSharedSession();

      // re-load the persisted state, since parent
      // attempted to read out of non-shared cookie
      $state = $this->getPersistentData('state');
      if (!empty($state)) {
        $this->state = $state;
      } else {
        $this->state = null;
      }

    }
  }
  /**/
  protected static $kSupportedKeys =
    array('state', 'code', 'access_token', 'user_id');

  
  protected function initSharedSession() {
    $cookie_name = $this->getSharedSessionCookieName();
    if (isset($_COOKIE[$cookie_name])) {
      $data = $this->parseSignedRequest($_COOKIE[$cookie_name]);
      if ($data && !empty($data['domain']) &&
          self::isAllowedDomain($this->getHttpHost(), $data['domain'])) {
        // good case
        $this->sharedSessionID = $data['id'];
        return;
      }
      // ignoring potentially unreachable data
    }
    // evil/corrupt/missing case
    $base_domain = $this->getBaseDomain();
    $this->sharedSessionID = md5(uniqid(mt_rand(), true));
    $cookie_value = $this->makeSignedRequest(
      array(
        'domain' => $base_domain,
        'id' => $this->sharedSessionID,
      )
    );
    $_COOKIE[$cookie_name] = $cookie_value;
    if (!headers_sent()) {
      $expire = time() + self::FBSS_COOKIE_EXPIRE;
      setcookie($cookie_name, $cookie_value, $expire, '/', '.'.$base_domain);
    } else {
      // @codeCoverageIgnoreStart
      self::errorLog(
        'Shared session ID cookie could not be set! You must ensure you '.
        'create the Facebook instance before headers have been sent. This '.
        'will cause authentication issues after the first request.'
      );
      // @codeCoverageIgnoreEnd
    }
  }
  /**/
  protected function setPersistentData($key, $value) {
    if (!in_array($key, self::$kSupportedKeys)) {
      self::errorLog('Unsupported key passed to setPersistentData.');
      return;
    }

    $session_var_name = $this->constructSessionVariableName($key);
    $_SESSION[$session_var_name] = $value;
  }
  /**/
  protected function getPersistentData($key, $default = false) {
    if (!in_array($key, self::$kSupportedKeys)) {
      self::errorLog('Unsupported key passed to getPersistentData.');
      return $default;
    }

    $session_var_name = $this->constructSessionVariableName($key);
    return isset($_SESSION[$session_var_name]) ?
      $_SESSION[$session_var_name] : $default;
  }

  /**
   * {@inheritdoc}
   *
   * @see BaseFacebook::clearPersistentData()
   */
  protected function clearPersistentData($key) {
    if (!in_array($key, self::$kSupportedKeys)) {
      self::errorLog('Unsupported key passed to clearPersistentData.');
      return;
    }

    $session_var_name = $this->constructSessionVariableName($key);
    if (isset($_SESSION[$session_var_name])) {
      unset($_SESSION[$session_var_name]);
    }
  }

  /**
   * {@inheritdoc}
   *
   * @see BaseFacebook::clearAllPersistentData()
   */
  protected function clearAllPersistentData() {
    foreach (self::$kSupportedKeys as $key) {
      $this->clearPersistentData($key);
    }
    if ($this->sharedSessionID) {
      $this->deleteSharedSessionCookie();
    }
  }

  /**
   * Deletes Shared session cookie
   */
  protected function deleteSharedSessionCookie() {
    $cookie_name = $this->getSharedSessionCookieName();
    unset($_COOKIE[$cookie_name]);
    $base_domain = $this->getBaseDomain();
    setcookie($cookie_name, '', 1, '/', '.'.$base_domain);
  }

  /**
   * Returns the Shared session cookie name
   *
   * @return string The Shared session cookie name
   */
  protected function getSharedSessionCookieName() {
    return self::FBSS_COOKIE_NAME . '_' . $this->getAppId();
  }

  /**
   * Constructs and returns the name of the session key.
   *
   * @see setPersistentData()
   * @param string $key The key for which the session variable name to construct.
   *
   * @return string The name of the session key.
   */
  protected function constructSessionVariableName($key) {
    $parts = array('fb', $this->getAppId(), $key);
    if ($this->sharedSessionID) {
      array_unshift($parts, $this->sharedSessionID);
    }
    return implode('_', $parts);
  }
}