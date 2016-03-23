<?php
class Correo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function sendMailGmail()
	{
		   date_default_timezone_set('America/Mexico_City');
		   

		/*
			$configGmail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				//'smtp_port' => 465,
				'smtp_port' => 587,
				'smtp_user' => 'jmedranoenid@gmail.com',
				'smtp_pass' => 'ubuntuJavaJava.1',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n",
				'crlf' => "\r\n"
			);    
	*/

	/*
			$config['protocol'] = 'sendmail'; 		        	     
	        $config["smtp_user"] = 'arithgrey@enidservice.com';
	        $config["smtp_pass"] = 'ubuntuJavaJava.1';   
	        $config["smtp_port"] = '587';
	        $config['charset'] = 'utf-8';
	        $config['wordwrap'] = TRUE;
	       	$config['validate'] = true;	       	 
	

	       	$this->email->initialize($config);
	*/       	


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
			$this->email->subject('Bienvenido');
			$this->email->message('<h1>Email enviado con codeigniter haciendo uso del smtp de gmail Bienvenido al blog</h1>');
			
		
		if ($this->email->send()) {
			
		}else{
			print_r($this->email->print_debugger());	
		}

		
	}

	public function sendMailYahoo()
	{
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
		$this->email->subject('Bienvenido/a a uno-de-piera.com');
		$this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de yahoo</h2><hr><br> Bienvenido al blog');
		$this->email->send();
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());
	}
}