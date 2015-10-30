<?=ini_set('display_errors', '1');?>
<div class='col-lg-1'>

</div>
<div class='col-lg-9'>
<div class="center-block">

    <div class='row'>
        <div class='slider-principal-escenario' id='slider-principal-escenario'>
            <?=$slider_principal_escenario;?>                                
        </div>
    </div>
    <div class='row'>
        <strong id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-escenario-principal"  >
        <i class="fa fa-plus-circle fa-5x"></i>                            
        <span style='color:white;'>Cargar Imagenes</span>
        </strong>
    </div>
    <input type='hidden' name='action' value="carga-imgenes-escenario">                    
</div>    

<div class='row'>
    <h1 class='nombre-escenario-text'><?=$data_escenario["nombre"];?></h1>       
</div>        
<div>
    <div class="form-group">
        <div class='section-nombre-evento-in'>
            <div class='input-group'>                    
                    <span class="input-group-addon">Nombre del escenario </span>
                    <input  class="form-control in-nombre-escenario" id='in-nombre-escenario' value="<?=$data_escenario["nombre"];?>" name='nuevo_nombre' style="width: 100%" type="text">			            
            </div>
        </div>
    </div>	   
</div>
<div class='row'>

    <div class="jumbotron">
        <h3><span class="label label-default">La experiencia </span></h3>
    <p class='descripcion-escenario-text'>                        
        <?=$descripcion_escenario;?> 
    </p>


        <div class='section-descripcion-escenario-in'>
        <div class='input-group'> 
            <span class="input-group-addon">Nombre del escenario </span>
            <textarea id="in-descripcion-escenario"  class='form-group col-lg-12 ' name="descripcion_escenario" rows="7" >
                <?=$descripcion_escenario;?> 
            </textarea>         
        </div>
    </div>



    </div>


</div>







<!--********************************Tipos de escenarios *************************************-->
	<div class='row section-fecha-type'>
    	<div class="btn-group-vertical" role="group" aria-label="Vertical button group">    
	      <div class="btn-group btn-lg" role="group">
	        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <?=$data_escenario["tipoescenario"];?>
	          <span class="caret"></span>
	        </button>
	        <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
	          <li class='tipo-escenario' id='General'><a id='General'>General</a></li>
	          <li class='tipo-escenario' id='Principal' ><a id='Principal'>Principal</a></li>
	          <li class='tipo-escenario' id='Especial'><a id='Especial' >Especial</a></li>
	        </ul>
	      </div>     
	    </div>
<!--*********************************************************************-->	    
        <a href="" data-toggle="modal" data-target="#modal-date-escenario">
            <div class='pull-right'>
            <i class="fa fa-calendar"></i>
            Presentación 
            <div id='fecha-presentacion'><?= $data_escenario["fecha_presentacion_inicio"] . " - ". $data_escenario["fecha_presentacion_termino"]; ?></div>
            </div>
        </a>
    </div>       




<!--*********************************************************************-->
<div> 
    <?=$resumen_artistas;?>
</div>
<section class="panel">        
<header class="blue-col-enid panel-heading custom-tab turquoise-tab">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#home3">
            <i class="fa fa-play"></i>
                Artistas que se presentarán en este escenario 
            </a>
        </li>                                                                
    </ul>
</header>                        
<div class="blue-col-enid-complement panel-body">                                                        
    <div class="tab-content">
        <div id="home3" class="tab-pane active">
                                    <!--Artistas en el escenario -->
        <div class='artistas-escenario-section' id='artistas-escenario-section'>
        <?=$artistas;?>     
        </div>  
        </div>
        <div id="about3" class="tab-pane">Puntos de venta</div>                                
    </div>
</div>
</section>
</div>

</div></div>
<div class='col-lg-1'>
    


    <div class="row">
                <div class="col-md-12">
                    <!--statistics start-->
                    <div class="row state-overview">

                        <?=$otros_escenarios?>

                        
                        
                    <!--statistics end-->
                    </div>
              
                </div>
    </div>






































































<!---->
<div class="modal fade" id="modal-date-escenario" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            	<h4 class="modal-title" id="myModalLabel">Presentación del escenario</h4>

            </div>
            <div class="modal-body">    	
	<div class="col-md-12">
    <form id="form-nueva-fecha">

        <div  class='col-md-12'>
            <div  class='col-md-6'>
                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2012-02-12" class="input-append date dpYears"  >
                            <input readonly="" value="2012-02-12" size="16" class="form-control"   id='inicio' name="from"   type="text"  >
                    <span class="input-group-btn add-on">
                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                    </span>
                    </div>
            </div>
            <div  class='col-md-6'>
                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2012-02-12" class="input-append date dpYears"  >
                            <input readonly="" value="2012-02-12" size="16" class="form-control" id='termino' name="to"   type="text"  >
                    <span class="input-group-btn add-on">
                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                    </span>
                    </div>
            </div>
        </div>        
		<span class="help-block">Seleccione la fecha para este escenario</span>
	</div>
	<button class='btn btn-primary' id='btn-guardar-fecha'>Guardar</button>
	<div id='repo-update-fecha'></div>
	</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>            
            </div>
            </div>
        </div>
    </div>
</div>


















<!---->
<div class="modal fade" id="modal_link_sound" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Track de sound cloud</h4>
            </div>
            <div class="modal-body">    						
								<div class="col-md-12">
                                    <form role="form" id="form-arista-social-sound" class="form-inline" action="<?=base_url('index.php/api/escenario/escenario_artista_social/format/json/')?>">
                                        <div class="input-group input-group-sm m-bot15">
			                                <span class="input-group-addon">URL de algún track de sound cloud</span>
			                                <input name="url_sound"  id="url_sound" class="form-control" placeholder="" type="url" required>
			                            </div>

                                        <div class='response-sound' id='response-sound' ></div>
                                        <button class="btn btn-primary pull-left" type="submit">registrar</button>
                                    </form>
                                </div>

            </div>
            <div class="modal-footer">            	
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
            </div>
        </div>
    </div>
</div>

<!---->










<!--link youtube inicia -->
<div class="modal fade" id="modal_link_youtube" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Video publicitario de youtube </h4>
            </div>
            <div class="modal-body">
    	
								<div class="col-md-12">
                                    <form role="form" id="form-arista-social-youtube" class="form-inline" action="<?=base_url('index.php/api/escenario/escenario_artista_social/format/json/')?>">
                                        <div class="input-group input-group-sm m-bot15">
			                                <span class="input-group-addon">URL video de youtube</span>
			                                <input name="url_youtube"  id="url_youtube" class="form-control" placeholder="" type="url" required>
			                            </div>

                                        <div class='response_youtube' id='response_youtube'></div>
                                        <button class="btn btn-primary pull-left" type="submit">registrar</button>
                                    </form>
                                </div>

            </div>
            <div class="modal-footer">
            	
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>
<!--link youtube termina -->











<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="modal_record_horario" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Horario de presentación</h4>
            </div>
            <div class="modal-body">
    	



<div class="row">
  <div class="form-group">
  <label class="control-label col-md-3">Hora de inicio</label>
    <div class="col-md-4">
      <div class="input-group bootstrap-timepicker">
        <input class="form-control timepicker-default" id="hiartista" name="hiartista" type="text">
          <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
          </span>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="form-group">
  <label class="control-label col-md-3">Hora de término</label>
    <div class="col-md-4">
      <div class="input-group bootstrap-timepicker">
        <input class="form-control timepicker-default" id="htartista" name="htartista" type="text">
          <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
          </span>
      </div>
    </div>
  </div>
</div>











            </div>
            <button type="button" class="pull-left guardar_horario btn btn-default" data-dismiss="modal">Guardar</button>
            <div class="modal-footer">
            	
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>


































































<div class="modal fade" id="modal-img-escenario-principal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cargar imagenes al escenario</h4>
            </div>
            <div class="modal-body">
            


            <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_escenario" enctype="multipart/form-data" id='formulario-principal-img' class='pull-right'>
                <div class="form-group">
                Imagen:<input type="file" name="images[]"  id="imgs-escenario">
                        <input type='hidden' name="e" value='1'>
                </div>                      
            </form>


            </div>            
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>               
            </div>
        </div>
    </div>
</div>





























<!---->
<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="modal-img-artista-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cargar foto del artista</h4>
            </div>
            <div class="modal-body">
        

                <div class='response-img-artista' id='response-img-artista'></div>
                <div class='row'>
                    <div class='lista-imagenes-artista' id='lista-imagenes-artista'></div>
                </div>
                <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post"  enctype="multipart/form-data" id='formulario-artista' >
                     <div class="form-group">
                        Foto del artista:<input type="file" name="imagesartista[]"  id="imgs-arista">
                               <input type='hidden' name="e" value='1'>
                     </div>                      
                 </form>









            </div>
            
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
            </div>
        </div>
    </div>
</div>
<!---->































<!--************************configura el status del artista en este escenario ***********************************-->
<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="edit-status-confirmacion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cargar foto del artista</h4>
            </div>
            <div class="modal-body">
        

            <div class='input-group'>
              <span class="input-group-addon">Estado de confirmación del artista</span>
              <select class='form-control' name='status-artista-evento' id='status-artista-evento'>                     
                    <option>Seleccione</option>

                    <option value='pendiente por confirmar'> Pendiente por confirmar</option> 
                    <option value='Artista confirmado'>Artista confirmado</option> 
                    <option value='Cancela su asistencia' >Cancela su asistencia </option> 
                    <option value='Promesa de asistencia'>Promesa de asistencia</option>
                    
              </select>
              <span id="response-update-status" class='response-update-status'> </span>
              <input type='hidden' id='dinamic-artista'>
            </div>    





            </div>
            
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
            </div>
        </div>
    </div>
</div>
<!--************************termina de  configura el status del artista en este escenario ***********************************-->
















<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="edit-nombre-artista" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cargar foto del artista</h4>
            </div>
            <div class="modal-body">
        

                <div class='row'>
                    <div class="section-input input-group" >
                        <span class="input-group-addon">Artista</span>
                        <input type="text" class="form-control" id='nuevo-nombre-artista'>
                    <div>
                </div>
                <span id="response-update-nombre" class='response-update-nombre'> </span>



            </div>
        </div class='pull-rigth'>
            <div class='row'>
                    <button type="button" id='modifica-nombre-artista' class="btn btn-default" >Modificar</button>                
            </div>
                
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
            </div>
        </div>
    </div>
</div>
                                       













<!--modal para definir la hora de inicio y termino en la presentación de un artista-->











































<input type='hidden' name='base_path_img' id="base_path_img" class='base_path_img' value='<?=$base_path_img;?>'>
<input type='hidden' name='base_path' id='base_path' class='base_path' value='<?=$base_path;?>'>
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$id_escenario;?>">


<!---->
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>
<input type='hidden' name='base_path_img_artista' id="base_path_img_artista" class='base_path_img_artista' value='<?=$base_path_img_artista;?>'>
<input type='hidden' name='base_path_artista' id='base_path_artista' class='base_path_artista' value='<?=$base_path_artista;?>'>

<!---->

















                    















<link href="<?=base_url('application/views/principal/dropzone.css')?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />


<!--pickers css-->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->



<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/img.js')?>"></script>
<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>










<script type="text/javascript">     
    
    $('#artista').keyup(function (e){ 

        Stringentrante = $(this).val();         
        
        buscarartista(Stringentrante);
    });

    function buscarartista(Stringentrante){        
        SC.initialize({
            lient_id: '1ce2bf4dcd83ee01f111219905b4f943'
        });
         
        SC.get('/tracks', { q: Stringentrante }, function(tracks) {                        
                newcontenidodatalist ="";                
                   for(var x in tracks ) {
                    /*Genero del artista*/
                    genre =  tracks[x]["genre"];
                    username = tracks[x]["user"].username;
                    avatar_url =  tracks[x]["user"].avatar_url;
                    uri =   tracks[x]["user"].uri;
                    id = tracks[x]["id"].id;
                        newcontenidodatalist += "<option value='"+ username  +"'>" ;                        
                   }                   
                   document.getElementById('dinamic-artistas').innerHTML= newcontenidodatalist;                
        });    
    }
</script>    




<style type="text/css">
.nombre-escenario-text:hover, .descripcion-escenario-text:hover {
    cursor: pointer;
    padding: 2px;
}
 .section-descripcion-escenario-in, .section-nombre-evento-in {
    display: none;
}
#img-button-more-imgs:hover{
    cursor: pointer;
    font-size: 1.1em;
}
.section-fecha-type{
    background: #062735;
}
.section-input{
    display: none;
}
</style>





