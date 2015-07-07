<?php
class Mailclass extends CI_Controller
{
public function __construct(){
	
	parent::__construct();
	$this->load->library("email");
}
function index(){
	echo "string.";
} 






public function sendMailGmail(){
		//cargamos la libreria email de ci
		date_default_timezone_set('America/New_York');
		$this->load->library("email");
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'enidservice@gmail.com',
			'smtp_pass' => 'ubuntuJavaJava.1',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);
 
		$this->email->from('enidservice@gmail.com');
		$this->email->to("arithgrey@gmail.com");
		$this->email->subject('Bienvenido/a a uno-de-piera.com');
		$this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');
		$this->email->send();
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());
	}










	public function sendMailYahoo(){
	//cargamos la libreria email de ci
	$this->load->library("email");
	 
	//configuracion para yahoo
	$configYahoo = array(
	'protocol' => 'smtp',
	'smtp_host' => 'smtp.mail.yahoo.com',
	'smtp_port' => 587,
	'smtp_crypto' => 'tls',
	'smtp_user' => 'emaildeyahoo',
	'smtp_pass' => 'password',
	'mailtype' => 'html',
	'charset' => 'utf-8',
	'newline' => "\r\n"
	);
 
	//cargamos la configuración para enviar con yahoo
	$this->email->initialize($configYahoo);
	 
	$this->email->from('correo que envia los emails');//correo de yahoo o no funcionará
	$this->email->to("correo que recibe el email");
	$this->email->subject('');
	$this->email->message('<h2>Email enviado</h2><hr><br> Bienvenido al blog');
	$this->email->send();
	//con esto podemos ver el resultado
	var_dump($this->email->print_debugger());
	 
	}
}
