<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Mailrest extends REST_Controller{
	function __construct(){
	    parent::__construct();	    
	}     
	/**/
	function nuevo_mail_prospectos_get(){
 	

		//
 	
 		$destinatario = "arithgrey@enidservice.com"; 
		$asunto = "Este mensaje es de prueba"; 
		$cuerpo = "<html>
					<img src=". base_url('application/img/mail/presentacion.png') .">
					<center>
						<strong>
			                <span style='color:black;'>
			                    Buen día le agradecemos que se tome el tiempo para conocer nuestra plataforma, con Enid service usted podrá publicitar  sus eventos musicales y hacer que cada uno de sus espectadores viva la experiencia antes y después de los mismos, aumentar su marketing  y mostrar al mundo una imagen empresarial dentro del sector del entretenimiento. 
			                </span>      
		                </strong>
		            </center>

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
		       
				   </html>
				   ";


		

		 


 		
		
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

		
		$headers .= "From: Enid Service <arithgrey@enidservice.com>\r\n"; 

		//dirección de respuesta, si queremos que sea distinta que la del remitente 
		//$headers .= "Reply-To: arithgrey@gmail.com\r\n"; 

		//ruta del mensaje desde origen a destino 
		$headers .= "Return-path: arithgrey@gmail.com\r\n"; 

		//direcciones que recibián copia 
		$headers .= "Cc: enidservice@gmail.com,arithgrey@gmail.com\r\n"; 
		mail($destinatario,$asunto,$cuerpo,$headers);

		

	}   
	/**/

	
}/*Termina rest*/