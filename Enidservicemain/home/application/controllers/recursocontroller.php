<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recursocontroller extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model("cuentageneralmodel");
		$this->load->library('sessionclass');  
		
		
	}
	/**/
	function perfiles(){
		
			$data = $this->validate_user_sesssion("Perfiles");			
			$this->load->view('TemplateEnid/header_template', $data);						
			$this->load->view('perfiles/principal', $data);							
			$this->load->view('TemplateEnid/footer_template', $data);	
		
	}	








	function usuarios(){

				$perfil = $this->sessionclass->getperfiles();

				$data= $this->validate_user_sesssion("Miembros de la cuenta ");
				
				$iduser  = $this->sessionclass->getidusuario();
		        $integrantes  = $this->cuentageneralmodel->getintegrantesinforme($iduser);
				
				
		        $data["integrantes"]= $integrantes;
				$this->load->view('TemplateEnid/header_template', $data);
				$this->load->view(displayviewusuario( $perfil ), $data);	
				$this->load->view('TemplateEnid/footer_template', $data);



	
	}

	function tiposeventos(){

		if ( $this->sessionclass->is_logged_in() == 1) {	
				/*Load data*/				
				$menu = $this->sessionclass->generadinamymenu();			
				$data["menu"] = $menu;
				$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
				
				$nombre = $this->sessionclass->getnombre();			
				$data["nombre"]= $nombre;
						
				
				$data['titulo']='Tipos eventos';
				

				$this->load->view('Template/header_template', $data);						
				$this->load->view('Template/footer_template', $data);			


			}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}


		
		
	}

	function servicios(){


		if ( $this->sessionclass->is_logged_in() == 1) {			
				/*Load data*/				
				$menu = $this->sessionclass->generadinamymenu();			
				$data["menu"] = $menu;
				$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
				
				$nombre = $this->sessionclass->getnombre();			
				$data["nombre"]= $nombre;


				$data['titulo']='Servicios';

				
				$this->load->view('Template/header_template', $data);						
				$this->load->view('Template/footer_template', $data);	
				

				
				



			}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}

		
	}
	function tiposservicios(){


		if ( $this->sessionclass->is_logged_in() == 1) {						
				/*Load data*/				
				$menu = $this->sessionclass->generadinamymenu();			
				$data["menu"] = $menu;
				$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
				
				$nombre = $this->sessionclass->getnombre();			
				$data["nombre"]= $nombre;


				$data['titulo']='Tipos servicios';
				
			
				$this->load->view('Template/header_template', $data);						
				$this->load->view('Template/footer_template', $data);	
			
				

			}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}

			
	}
	

	/*Inicia eventos*/
	function eventos(){

		if ( $this->sessionclass->is_logged_in() == 1) {			
				/*Load data*/				
				$menu = $this->sessionclass->generadinamymenu();			
				$data["menu"] = $menu;
				$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
				
				$nombre = $this->sessionclass->getnombre();			
				$data["nombre"]= $nombre;
				

				$data['titulo']='Eventos';
				
				
				$this->load->view('Template/header_template', $data);						
				$this->load->view('Template/footer_template', $data);	
			
				
			}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}	
			
	}/*Termina evetos*/




	function informacioncuenta(){
		if ( $this->sessionclass->is_logged_in() == 1) {			
				/*Load data*/				
				$menu = $this->sessionclass->generadinamymenu();			
				$data["menu"] = $menu;
				$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
				
				$nombre = $this->sessionclass->getnombre();			
				$data["nombre"]= $nombre;
				

				$data['titulo']='Mi cuenta';
				
					
				$this->load->view('TemplateEnid/header_template', $data);						
				$this->load->view('micuenta/principal' , $data);	
				$this->load->view('TemplateEnid/footer_template', $data);	
				
				
			}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}	
	}/**/

	

/*Inicia primeros pasos */
	function primerospasos(){

		if ( $this->sessionclass->is_logged_in() == 1) {			
				/*Load data*/				
				$menu = $this->sessionclass->generadinamymenu();			
				$data["menu"] = $menu;
				$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
				
				$nombre = $this->sessionclass->getnombre();			
				$data["nombre"]= $nombre;
				

				$data['titulo']='Ayuda y primeros pasos';
				
				
				$this->load->view('Template/header_template', $data);						
				$this->load->view('Template/footer_template', $data);	
				
				
							
			}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}	
			
	}/*Termina primeros pasos */





	

	/*Inicia perfil avanzado*/
	function perfilesavanzado(){
		
		if ( $this->sessionclass->is_logged_in() == 1) {	
				/*Load data*/				
				$menu = $this->sessionclass->generadinamymenu();			
				$data["menu"] = $menu;
				$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
				
				$nombre = $this->sessionclass->getnombre();			
				$data["nombre"]= $nombre;

				$recurso = $this->input->get("moduloconfig");
						

				$data['titulo']='Configuración perfiles';
				$data["modulo"] = $recurso;
			
				$this->load->view('TemplateEnid/header_template', $data);		
				$this->load->view('modulo/moduloconfig.php' , $data);				
				$this->load->view('TemplateEnid/footer_template', $data);	
			

				

			}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}		
		
	}/*Termina perfil avanzado*/	




	function validate_user_sesssion($titulo_dinamico_page){

            if ( $this->sessionclass->is_logged_in() == 1) {                        
                    
                    
                    $menu = $this->sessionclass->generadinamymenu();
                    $nombre = $this->sessionclass->getnombre();                                         
                    $data['titulo']=$titulo_dinamico_page;              
                    $data["menu"] = $menu;              
                    $data["nombre"]= $nombre;                                               
                    $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                

                    return $data;

                }else{
                /*Terminamos la session*/
                $this->sessionclass->logout();
            }   
    }





		
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */