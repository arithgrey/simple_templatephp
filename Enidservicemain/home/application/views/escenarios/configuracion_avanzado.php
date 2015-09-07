<style type="text/css">
.nombre-escenario-text:hover, .descripcion-escenario-text:hover {
	cursor: pointer;
	padding: 2px;
}
#in-nombre-escenario, #in-descripcion-escenario {
	display: none;
}
</style>

<button id="avanzado-config-escenario" class='btn btn-info pull-right'><i class="fa fa-eye"></i> Ver</button>













                  















<div class="container"> 
    <div class="jumbotron">
    	<div class='row'>
	    <h1 class='nombre-escenario-text'><?=$data_escenario["nombre"];?></h1>	    
	    <div class="form-group todo-entry">
			<input  class="form-control in-nombre-escenario " id='in-nombre-escenario' value="<?=$data_escenario["nombre"];?>" name='nuevo_nombre' style="width: 100%" type="text">			
		</div>
	    </div>	   
	    <div class='row'>
		    <p class='descripcion-escenario-text'>
		    	<?=$data_escenario["descripcion"]?>
		    </p>
		   	<textarea id="in-descripcion-escenario"  class='form-group todo-entry' name="descripcion_escenario" >
				<?=$data_escenario["descripcion"]?>
		   	</textarea>	    	
		</div>	        	    
		<!--********************************Tipos de escenarios *************************************-->
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
		<!--*********************************************************************-->
   	</div>















    <section class="panel">
                        <header class="blue-col-enid panel-heading custom-tab turquoise-tab">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#home3">
                                        <i class="fa fa-play"></i>
                                        Artistas que se presentarán en est escenario 
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
		<div class="input-group input-large custom-date-range" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
		<input class="form-control dpd1"  id='inicio' name="from" type="text" required>
		<span class="input-group-addon"> al día </span>
			<input class="form-control dpd2"  id='termino' name="to" type="text" required>
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



















<!---->
<div class="modal fade" id="modal_link_sound" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">track de sound cloud</h4>
            </div>
            <div class="modal-body">    						
								<div class="col-md-12">
                                    <form role="form" id="form-arista-social-sound" class="form-inline" action="<?=base_url('index.php/api/escenario/escenario_artista_social/format/json/')?>">
                                        <div class="input-group input-group-sm m-bot15">
			                                <span class="input-group-addon">URL de algún track de sound cloud</span>
			                                <input name="url_sound"  id="url_sound" class="form-control" placeholder="" type="url" required>
			                            </div>

                                        <button class="btn btn-primary pull-right" type="submit">registrar</button>
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

                                        <button class="btn btn-primary pull-right" type="submit">registrar</button>
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
            <div class="modal-footer">
            	<button type="button" class="guardar_horario btn btn-default" data-dismiss="modal">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>

<input type='hidden' name='escenario' id="escenario" value="<?=$data_escenario['idescenario']?>">













                    





















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
<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/gmap.js')?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>

<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>
