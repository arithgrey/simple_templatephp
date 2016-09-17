<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Mailrest extends REST_Controller{
	function __construct(){
	    parent::__construct();	  
	    $this->load->model("enidmodel");  
	    $this->load->library('sessionclass');        
	}    
  

	/**/
	function prospecto_get(){

 		$this->validate_user_sesssion();          
 		$param =  $this->get();		
 		if ($param["q"] ==  "az4299Cv28R"){


 			$param["mail_user"] = $this->sessionclass->getemailuser();            
 			$user_prospecto =  $this->update_pass_prospecto($param);
 			$this->response($user_prospecto);
 			
 			

 		}
 		//$this->response($param["q"]);

	}   
	/**/
	function update_pass_prospecto($param){

		$mail_response["mail_prospecto"] = 1;
		$mail_response["mail_user"] =  $param["mail_user"];
		$db_response  =  $this->enidmodel->verifica_estatus_prospecto($param);
		if ($db_response["mail_prospecto"] ==  0 ){
			$mail_response["info_mail"] = $db_response;
			$mail_response["mail_prospecto"]=0;
			$this->mail_prospecto($param["mail_user"]  , $db_response["new_pass"] );
			
		}
		return $mail_response;

	}
	/**/

	function mail_prospecto($mail , $pass ){

 		$destinatario = "arithgrey@enidservice.com"; 
		$asunto = "Información de cuenta Enid Service"; 
		$cuerpo = $mail ."--" .$pass . "<html>
					<a href='". base_url('index.php/startsession') ."'>						
						<img src=". base_url('application/img/mail/presentacion.png') .">
						<center>
							<strong>
				                <span style='color:black;'>
				                    Buen día le agradecemos que se tome el tiempo para conocer nuestra plataforma, con Enid service usted podrá publicitar  sus eventos musicales y hacer que cada uno de sus espectadores viva la experiencia antes y después de los mismos, aumentar su marketing  y mostrar al mundo una imagen empresarial dentro del sector del entretenimiento. 
				                </span>      
			                </strong>
			            </center>
		            </a>

		            <br>
		            <center>
			            <a href='". base_url('index.php/startsession') ."'>
		                    <button class='btn btn-default login-btn ' style='border-radius: 0;
					            border-style: solid;
					            border-width: 0;
					            cursor: pointer;    
					            padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
					            font-size: 0.98889rem;
					            background-color: #008CBA;
					            border-color: #007095;
					            color: #FFFFFF;'>                    
		                        Inicia ahora.!
		                    </button>
		                </a>
		            </center>

		            <center>
			            <label>
			            	Usuario :  ". $mail ."
			            </label>
			            <label>
			            	Password: ".$pass ."
			            </label>
			            <br>
			            <label>
			            	Te recomendamos hacer el cambio  de tu contraseña al ingresar al sistema.
			            </label>
		            </center>

		       
				   </html>
				   ";

				   
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 		
		$headers .= "From: Enid Service <arithgrey@enidservice.com>\r\n"; 

		//dirección de respuesta, si queremos que sea distinta que la del remitente 
		$headers .= "Reply-To: enidservice@gmail.com\r\n"; 

		//ruta del mensaje desde origen a destino 
		$headers .= "Return-path: arithgrey@gmail.com\r\n"; 

		//direcciones que recibián copia 
		$headers .= "Cc: ".$mail.",arithgrey@gmail.com\r\n"; 
		mail($destinatario,$asunto,$cuerpo,$headers);

	}
	/**/
		/*Validar session para modificar datos*/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
                        /*Terminamos la session*/
                $this->sessionclass->logout();
        }   
    }
   /**/ 

	
}/*Termina rest*/