<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Mailrest extends REST_Controller{

	function __construct(){
	    parent::__construct();
	    $this->load->library("email");
	    $this->load->model("recuperapasswordmodel");
	    $this->load->model("usuariogeneralmodel");   
	    $this->load->library('sessionclass');  

	}         
	/**************************************************************************************/
	function recuperarPassword_get(){
	    
	    $email = $this->get('email');
	    /*Conslta que exista */
		$respuestaDB = $this->recuperapasswordmodel->recuperarPassword($email);
	    if($respuestaDB > 0){
	    		$this->response($this->reenvioContrasena($email));
	    }else{
	    
	    	$this->response("El correo no existe...");
	    }
	}
	/**/
	function reenvioContrasena($email){

			$cadena = $this->RandomString();
	    	$Cifrada = sha1($cadena);
	    	$exito = $this->recuperapasswordmodel->actualizaPassword($email, $Cifrada);

	    	if($exito == true){

	    		/*Se envia email */
				$mensaje ="<h1>Enid service </h1>
				<label> 
				
				Mensajes enviado por el desarrollador de la plataforma, dudas y aclaraciones
				 comunicarse con  arithgrey@gmail.com</label><br>
				<h2>Tu usuario es tu correo: ".trim($email )." </h2>
				<h3>Tu contraseña es: ". trim( $cadena) ."</h3><br>
				Para iniciar sessión al sistema dirigete a: ". base_url('index.php/sessioncontroller/iniciosessionuser')."
				";

				$subject ="Recuperación de contraseña";
		    		$this->response($this->sendMailGmailnuevainvitacioncuenta($email , $cadena, $mensaje, $subject));
		    	}else{
		    		$this->response("Intente de nuevo...");
		    	}

			$cadena = $this->RandomString();
			return $cadena;		
	}
/**************************************************************************************/


	function send_mail_gmail_invitaticon_post(){

		$this->validate_user_sesssion();

		$clientresponse ="";	
		$idperfil = $this->post("idperfil");
		$mailnewcontact =  $this->post("mailnewcontact");
		$nombre = $this->post("nombre");

		$idempresa = $this->sessionclass->getidempresa();
		$contraseñaaleatoria = $this->RandomString();
		$pw = sha1($contraseñaaleatoria);

		$usuarioexiste = $this->isuserexist($nombre ,  $mailnewcontact); 
				
		if ($usuarioexiste ==  true) {				
			$clientresponse = "Intente con otro usuario, el que ingresó ya existe en el sistema";
		}else{
			$registro  = $this->recordusergeneral($nombre , $mailnewcontact, $pw , $idempresa , $idperfil );
				
				if ($registro == 1) {
					$mensaje ="<h1>Enid service</h1>
						<label>Hola que tal, el administrador de la cuenta de Enid Service ha 
						registrado tu usuario en el sistema, la contraseña es provisional así 
						que una vez que inicies sesión en el sistema tendrás que cambiarla por 
						motivos de seguridad. 

						Mensaje generado desde la plataforma, dudas y aclaraciones
						comunicarse con arithgrey@enidservice.com ó arithgrey@gmail.com</label><br>
						<h2>Tu usuario es tu correo: ".trim($mailnewcontact)." </h2>
						<h3>Tu contraseña es: ".trim( $contraseñaaleatoria )."</h3><br>
						Para iniciar sessión al sistema dirigete a: ". base_url('index.php/sessioncontroller/iniciosessionuser')."
						";

					$subject ='Invitación a formar parte del sistema Enid Service';
						
					$clientresponse = $this->sendMailGmailnuevainvitacioncuenta( trim($mailnewcontact) ,$contraseñaaleatoria, $mensaje, $subject);

				}else{
					$clientresponse ="Intente nuevamente, si persiste el error reporte al desarrollador";			
				}		

		}

		$this->response($clientresponse);
	}
	/**/

	function sendMailGmailnuevainvitacioncuenta($mail , $pw, $mensaje,  $subject){
			
			$configGmail = array(
					'protocol' => 'sendmail',								
					'smtp_port' => 587,
					'smtp_user' => 'arithgrey@enidservice.com',
					'smtp_pass' => 'ubuntuJavaJava.1',
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'wordwrap' => TRUE, 
					'validate' => true

			);    

		    $this->email->initialize($configGmail);
		    $this->email->set_newline("\r\n");				 
			$this->email->from('arithgrey@enidservice.com');
			$this->email->to($mail);
			$this->email->subject($subject);	
			$this->email->message($mensaje);

			if ($this->email->send()) {
				return $this->email->send();	
			}else{
				return $this->email->print_debugger();
			}
	}/*Termina la función*/


/*******************************************************************************/
	function sendMailGmail_get(){
			  

		$configGmail = array(
				'protocol' => 'sendmail',								
				'smtp_port' => 587,
				'smtp_user' => 'arithgrey@enidservice.com',
				'smtp_pass' => 'ubuntuJavaJava.1',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'wordwrap' => TRUE, 
				'validate' => true

		);    

		$this->email->initialize($configGmail);
		$this->email->set_newline("\r\n");				
	
		$this->email->from('arithgrey@enidservice.com');
		$this->email->to("arithgrey@gmail.com");
		$this->email->subject('Invitación a formar parte del sistema Enid Service');
		$this->email->message('<h2>by desde el rest @arithgrey</h2>');
		$this->email->send();
			
		$this->response($this->email->print_debugger());
	}
	/**/
	function isuserexist($user ,  $mail){

	    $responsedb = $this->usuariogeneralmodel->validaexistuser($user , $mail );                
	    if ($responsedb >0) {
	        return true;  
	    }else{
	        return false; 	
	    }	                	                                      
	}
  	/**/
	function recordusergeneral($usuario , $mail , $pw , $idempresaregistrada , $perfil ){

		$responsedb = $this->usuariogeneralmodel->recordusergeneralconperfil($usuario , $mail , $pw , $idempresaregistrada, $perfil);                
	    if ($responsedb != true){
	        return 0;
	    }else{
	       	return 1;
	    }                                          
	}/*termina */
	/**/
	function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE){
		
	    $source = 'abcdefghijklmnopqrstuvwxyz';
	    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    if($n==1) $source .= '1234567890';
	    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
	    if($length>0){
	        $rstr = "";
	        $source = str_split($source,1);
	        for($i=1; $i<=$length; $i++){
	            mt_srand((double)microtime() * 1000000);
	            $num = mt_rand(1,count($source));
	            $rstr .= $source[$num-1];
	        }
	 
	    }
	    return $rstr;
	}
	/**/
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        

                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */




	
}/*Termina rest*/
