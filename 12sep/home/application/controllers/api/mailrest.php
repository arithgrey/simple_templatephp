<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Mailrest extends REST_Controller{
	function __construct(){
	    parent::__construct();
	    $this->load->library('email','', 'correo');
	}     
	/**/

	function nuevo_mail_prospectos_get(){
 
		date_default_timezone_set('America/Mexico_City');		
		$this->correo->from('arithgrey@gmail.com', 'enidservice'); // correo sin espacio
		$this->correo->to('enidservice@gmail.com'); // correo sin espacio
		$this->correo->subject('Esto es una prueba');
		$this->correo->message('Aqui va el cuerpo del mensaje');
		if($this->correo->send())
		{
		echo 'Correo enviado';
		}
		else
		{
		show_error($this->correo->print_debugger());
		}





	}   

	
}/*Termina rest*/