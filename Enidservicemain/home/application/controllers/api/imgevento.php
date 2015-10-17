<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Imgevento extends REST_Controller{    
    function __construct() {
        parent::__construct();
        $this->load->model('upload_model');
    }

    function index() {
        //CARGAMOS LA VISTA DEL FORMULARIO
        $this->load->view('upload_view');
    }

    //FUNCIÓN PARA SUBIR LA IMAGEN Y VALIDAR EL TÍTULO
    function do_upload() {
       
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            

            $this->response($error);

        } else {

            $file_info = $this->upload->data();
            
            
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $titulo = $this->input->post('titulo');
            $imagen = $file_info['file_name'];
            
            $this->response("ok");
        }
        
    }






















}
?>






