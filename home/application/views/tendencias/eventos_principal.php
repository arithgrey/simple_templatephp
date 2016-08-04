
<div class='col-lg-12' id="">
	<div class='col-lg-2 col-md-2 col-sm-2'></div>
	<div class='col-lg-8 col-md-8 col-sm-8  '>

					<form method="POST" class="update-fecha-evento-form" id="update-fecha-evento-form">
						<div class='col-lg-4 col-md-4 col-sm-4 '>
				                      		<input name="update_evento" id="update_evento" type="hidden">				                    
				                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=enid_now()?>" class="input-append date dpYears">
				                                  <input readonly="" value="<?=enid_now()?>" size="16" class="form-control" id="update_inicio" name="update_inicio" type="text">
				                                  <span class="input-group-btn add-on">
				                                   <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
				                                  </span>
				                            </div>                             
				                          
				        </div> 
						<div class='col-lg-4 col-sm-4 col-sm-4'>				                         
				                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=enid_now()?>" class="input-append date dpYears">
				                                  <input readonly="" value="<?=enid_now()?>" size="16" class="form-control" id="update_termino" name="update_termino" type="text">
				                                  <span class="input-group-btn add-on">
				                                   <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
				                                  </span>
				                            </div>                              
						</div>              
						<div class='col-lg-4 col-md-4 col-sm-4'>
							<button class='col-lg-12 btn btn btn_nnuevo'>Buscar</button>
						</div>                				                      
				                  
					</form>				
	</div>
	<div class='col-lg-2 col-md-2 col-sm-2'></div>				
</div>
<div class='col-lg-12 col-md-12 col-sm-12'>
	<?=$funel?>	
</div>	
<div class='col-lg-12 col-md-12 col-sm-12'>
	<div class='col-lg-3 col-md-3 col-sm-3'>


		<form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">         
	        <button class='botonExcel btn btn-default'> 
	            Exportar a Excel 
	            <i class="fa fa-file-pdf-o"></i> 
	        </button>  
	        <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
	    </form>
		
	   
	</div>
</div>    
</div>

<!--***************************************************-->
<div class="modal fade" id="dinamic_modal_event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
        	<h3 class='dinamic-title' id="dinamic-title"></h3>
        </h4>
      </div>
      <div class="modal-body">        	
        	<!--************************Contenido dinamico que muestr los escenarios, puntos de venta, artistas etc *********************************************-->
        	<div class='row'>
        		<div class='dinamic-section' id="dinamic-section"></div>
        	</div>
        	<div class='row'>
	        	<button class='botonExcel btn btn-default pull-center'  >        		
	        		Exportar        				
	        	</button>  
        	</div>
        	<!--************************TERMINA Contenido dinamico que muestr los escenarios, puntos de venta, artistas etc *********************************************-->        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
      </div>
    </div>
  </div>
</div>
<!--***********************************************************************************************-->
<style type="text/css">
.ver-artistas:hover{
	cursor: pointer;
}
</style>


<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/tendencias/principal_funnel.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/tendencias/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>







