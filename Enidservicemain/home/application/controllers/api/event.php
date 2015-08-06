<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Event extends REST_Controller{
      
    function __construct(){
            parent::__construct();
                
             
            $this->load->model("eventmodel");                
            $this->load->helper("eventosh");   
            $this->load->library('sessionclass');

            
        }     


/**/
    function delete_byid_post(){
    

        if ($this->sessionclass->is_logged_in() == 1){

            $id_usuario = $this->sessionclass->getidusuario();    
            $id_empresa =  $this->sessionclass->getidempresa();            
            $id_evento = $this->post("evento");

          
            $responsedb = $this->eventmodel->delete_byid($id_evento , $id_usuario , $id_empresa );
            $this->response($responsedb);

        }else{
            $this->sessionclass->logout();    
        }   




    }    

/**/
    function update_objeto_permitido_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            
            $idevento = $this->post("evento");
            $idobjeto =  $this->post("objetopermitido");


            $responsedb = $this->eventmodel->update_obj_permitidobyId($idevento, $idobjeto);
            $this->response($responsedb);

        }else{
            $this->sessionclass->logout();    
        }   





    }    

    function objetospermitidos_get(){

        if ($this->sessionclass->is_logged_in() == 1){

            
            $idevento = $this->get("evento");


            $this->response( listobjetosp($this->eventmodel->getObjetosPermitidos($idevento ) ));

        }else{
            $this->sessionclass->logout();    
        }   

    }    



    function updateurlbyid_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            $nueva_url = $this->post("url_social_evento");            
            $idevento = $this->post("evento_social");


            $this->response($this->eventmodel->updateurl($nueva_url , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   


    }/*Termina la función*/    




    function updateurlyoutubebyid_post(){
        
        if ($this->sessionclass->is_logged_in() == 1){

            $nueva_url = $this->post("url_social_evento_youtube");            
            $idevento = $this->post("evento_social_y");


            $this->response($this->eventmodel->updateurlyout($nueva_url , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   

    }









    /**/    

    function updategeneros_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            $nuevos_generos = $this->post("generos");
            $idevento = $this->post("evento");

            $this->response($this->eventmodel->updategeneros($nuevos_generos , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   


    }/*Termina la función*/    

    function updateubicacion_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            $nueva_ubicacion = $this->post("ubicacion");
            $idevento = $this->post("evento");

            $this->response($this->eventmodel->updateUbicacion($nueva_ubicacion , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   

    
    }   


    function updatenombre_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            $nuevo_nombre = $this->post("nombre");
            $idevento = $this->post("evento");

            $this->response($this->eventmodel->updateNombre( validate_text($nuevo_nombre)  , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   

    }    

    


    function updateedicion_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            $nuevo_edicion = $this->post("edicion");
            $idevento = $this->post("evento");


            $this->response($this->eventmodel->updateEdicion( validate_text($nuevo_edicion) , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   

    }    



    
    

    function updatedescripcion_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            
            $nueva_descripcion = $this->post("descripcion_evento");
            $idevento = $this->post("evento");




            

            $this->response($this->eventmodel->updateDescripcion( validate_text( $nueva_descripcion)  , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   

    }    





    /*updatepoliticas********+updatepoliticasupdatepoliticasupdatepoliticasupdatepoliticasupdatepolit*/



    function updatepoliticas_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            $nueva_politica = $this->post("politicas_evento");
            $idevento = $this->post("evento");

            $this->response($this->eventmodel->updatePoliticas( validate_text($nueva_politica) , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   

    }    







/**Load temántica *Load temántica *Load temántica *Load temántica *Load temántica *Load temántica **/
function loadtematicabyid_get(){
    if ($this->sessionclass->is_logged_in() == 1){

            $idevento = $this->get("id_evento_tematica");
            $idempresa =  $this->sessionclass->getidempresa();
            $this->response($this->eventmodel->getTematicaByid($idevento , $idempresa));

        }else{
            $this->sessionclass->logout();    
        }   

}




/*End tematica load End tematica load End tematica load End tematica load End tematica load */




function update_tematica_by_id_post(){

    if ($this->sessionclass->is_logged_in() == 1){


            
            
            $idevento = $this->post("id_evento_tematica");
            $tematica_select = $this->post("tematica_select");
            $idempresa =  $this->sessionclass->getidempresa();
            $this->response($this->eventmodel->update_tematicaby_id( $idevento , $tematica_select, $idempresa ));

        }else{
            $this->sessionclass->logout();    
        }   
}




/*****************Permitido *Permitido *Permitido *Permitido *Permitido *Permitido *****/
function updatepermitido_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            $nuevo_permitido = $this->post("permitido_evento");
            $idevento = $this->post("evento");

            $this->response($this->eventmodel->updatePermitido( validate_text($nuevo_permitido)  , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   

    }    

/*restricciones **restricciones **restricciones **restricciones **restricciones ***/





function updaterestricciones_post(){

        if ($this->sessionclass->is_logged_in() == 1){

            $nueva_restriccion = $this->post("restricciones_evento");
            $idevento = $this->post("evento");

            $this->response($this->eventmodel->updateRestricciones( validate_text( $nueva_restriccion )  , $idevento ) );

        }else{
            $this->sessionclass->logout();    
        }   

    }   








/*****************************************************************************/
    
    function get_event_by_id_get(){
        

        if ($this->sessionclass->is_logged_in() == 1) {

            $idevento = $this->get("evento");

            $this->response($this->eventmodel->getEventbyid($idevento));

        }else{
            $this->sessionclass->logout();    
        }    

    }    



    function nuevo_evento_POST(){
                
        if ( $this->sessionclass->is_logged_in() == 1) {  
            /*Capturamos datos*/
                $generic_response = ["Nombre muy corto para el evento" , "Registre fecha"];        


                $nombre  = $this->post("nuevo_evento");
                $edicion = $this->post("nueva_edicion");
                $inicio = $this->post("nuevo_inicio");
                $termino = $this->post("nuevo_termino");

                $idusuario = $this->sessionclass->getidusuario();    
                $idempresa =  $this->sessionclass->getidempresa();
                $perfiles  =  $this->sessionclass->getperfiles();
                $data[0]= false;
                    
                    if (validatenotnullnotspace($nombre)) {
                        if (validatenotnullnotspace($inicio) ==  true && validatenotnullnotspace($termino)) {
                            

                                $dbresponse = $this->eventmodel->create(  $nombre , $edicion , $inicio , $termino , $idusuario , $idempresa,  $perfiles  );
                                

                                if (is_numeric($dbresponse)) {

                                    $data[0]= true;
                                    $extra = $this->create_directorio($dbresponse); 
                                    $data[1]= base_url('index.php/eventos/nuevo/'.$dbresponse);
                                       
                                    $this->response($data); 
                                }else{
                                    $this->response($generic_response[0]);             
                                } 
                                


                        }else{
                                $this->response($generic_response[1]);
                        }
                        
                            

                            
                                


                    }else{
                        $this->response($generic_response[0]);
                    }

                
                
        }else{
            $this->sessionclass->logout();
        
        }    
    }

/****************************** ******************************* **************************/
function create_directorio($id_event){
    
        
        $storeFolder = 'uploads';           
        $directorio = dirname(dirname( __FILE__ )). "/". $storeFolder."/".$storeFolder."/".$id_event."/";            
        return $directorio;
}


function update_eslogan_post(){

        if ( $this->sessionclass->is_logged_in() == 1) {  
                
                $id_evento= $this->post("evento");
                $eslogan = $this->post("eslogan");

                $this->response($this->eventmodel->update_eslogan($id_evento , validate_text($eslogan)) );
        }else{
            $this->sessionclass->logout();    
        }  

}/*Termina rest*/



}
?>

