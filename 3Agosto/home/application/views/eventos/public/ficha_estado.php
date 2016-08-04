<?php
	$style_1 = ""; $style_2 = ""; $style_3 = ""; $config =  "";  
	switch ($param["tipo_ficha"]) {
		case 0:			
			$style_1 =  "style='display:block;' "; 
			$style_2 =  " style='display:none;' ";
			$style_3 =  " style='display:none;' ";
			break;
		case 1:

			$style_1 =  "style='display:none;' "; 
			$style_2 =  " style='display:block;' ";
			$style_3 =  " style='display:none;' ";
			break;	

		case 2:
			
			$style_1 =  "style='display:none;' "; 
			$style_2 =  " style='display:none;' ";
			$style_3 =  " style='display:block;' ";			

			break;
		default:
			
			break;
	}

?>


<div <?=$style_1;?> >
	<div class='config_f_editando'>						
		<span class='titulo_info_estado'>
			<strong>
				El evento se encontrará en edición y no será visto por el público mientras se encuentre en 
				este estato.
			</strong>
		</span>
	</div>
	<div class='panel panel_config_editando'>
		<div class='panel-control'>
			<div class='panel-body'>
				<span>
					Programar el evento para que cambie a publico el día
				</span>
				<form class='form-programacion-evento' id='form-programacion-evento' action="<?=base_url('index.php/api/event/programacion/format/json/')?>">
					<br>
					<div class="form-group ficha_f_programacion" >                                                                                                                                     			              
			            <div class='col-lg-6 col-md-6 col-sm-12'>
			                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears col-lg-12 col-sm-12 col-md-12" >
			                <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" name="fecha_programado"  type="text"  id="fecha_programado" >
			                        <span class="input-group-btn add-on">
			                            <button class="btn btn-primary" type="button">
			                                <i class="fa fa-calendar">
			                                </i>
			                            </button>
			                        </span>
			                    </div>
			            </div>    
			            <div class='col-lg-6 col-md-6 col-sm-12'>
				        	<button class='btn btn-default btn_save pull-left' type='submit'>
					        	Guardar ahora.!
					        </button>    	
			            </div>
			        </div>    
			        
			        
		        </form>
		        <div class='place_form_programacion'>
		        </div>
			</div>
		</div>
	</div>			
	<br>
</div>



<!--La sección pública -->
<div <?=$style_2;?> > 
	<div class='config_f_publico'>						
		<span class='titulo_info_estado'>
			<strong>
				El evento será visible para el público mientras se encuentre en este estado.
			</strong>
		</span>
		<div class='panel panel_config_publico'>
			<div class='panel-control'>
				<div class='panel-body'>									
					<?=muestra_estatus_event($param["status"])?>					
				</div>
			</div>
		</div>	
	</div>
	<div class='place_public'>
	</div>		
</div>



<!---->
<div <?=$style_3;?> >
	<div class='config_f_cancelado'>						
		<span class='titulo_info_estado'>
			<strong>
				Al cancelar el evento, este dejará de ser visible para el público 
			</strong>
		</span>


		<div class='panel panel_config_cancelado'>
			<div class='panel-control'>
				<div class='panel-body'>																				
					<?=tipo_cancelacion( $param["status"] , $param["id_evento"]  ,  $submotivos)?>
					<div class='place_estado_evento'>
					</div>
				</div>
			</div>
		</div>	

	</div>
	<div class='place_public'>
	</div>		
</div>

<style type="text/css">
	.config_f_editando, .config_f_publico, .config_f_cancelado{
		padding: 20px;
	}
	.panel_config_editando, .panel_config_publico , .panel_config_cancelado{
		width: 90%;
		height: 200px;
		margin: 0 auto;
	}
	.ficha_f_programacion{
		margin: 0 auto;	
	}
	.btn_cancelacion{
		width: 30%;
	}
	.cancelacion_p{
		clear: left;
	}
</style>



<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />

