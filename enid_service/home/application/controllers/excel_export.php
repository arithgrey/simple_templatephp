<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Excel_export extends CI_Controller {

    function index(){
		     		
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=exportacion.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $this->input->get('datos_a_enviar');	
	}		
}/*Termina el controlador */
 