<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once( 'application/libraries/Facebook/autoload.php');
class Socials  extends CI_Controller {

	public function __construct(){         
	     parent::__construct();         	     
	     $this->load->library('facebook', array('appId' => '708127766008103', 'secret' => 'c39ece2b74cbd05beab3d3b6f811c4ad') );
	}
    public function login(){
		
		$user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }
        /**/
        if ($user) {

        	$data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/socials/logout'));
            //$data['logout_url'] = site_url('socials/logout');
            
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('socials/login'), 
                'scope' => array("email" , "user_friends" ,  "user_about_me" ,  "user_events")

            ));
        }
        /**/
        $this->load->view('socials/fb/login',$data);


	}
	/**/
    function logout(){
  
        $this->facebook->destroySession();     
        redirect(base_url());
    }
    	

	
}/*Termina el controlador */