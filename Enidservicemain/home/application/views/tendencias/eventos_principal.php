<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/tendencias/principal_funnel.js')?>"></script>

<div class='row'>
	<div class='col-lg-2'></div>
					<div class='col-lg-8'>

					<form method="POST" class="update-fecha-evento-form" id="update-fecha-evento-form">
				                    <input name="update_evento" id="update_evento" type="hidden">
				                    <div class="input-group">
				                      <table class='table' >
				                        <tr>
				                          <td>
				                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2012-02-12" class="input-append date dpYears">
				                                  <input readonly="" value="2012-02-12" size="16" class="form-control" id="update_inicio" name="update_inicio" type="text">
				                                  <span class="input-group-btn add-on">
				                                   <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
				                                  </span>
				                            </div>                             
				                          </td>
				                          <td>
				                            <span class="input-group-addon">periodo </span>
				                          </td>
				                          <td>
				                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2012-02-12" class="input-append date dpYears">
				                                  <input readonly="" value="2012-02-12" size="16" class="form-control" id="update_termino" name="update_termino" type="text">
				                                  <span class="input-group-btn add-on">
				                                   <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
				                                  </span>
				                            </div>                              
				                          </td>
				                        </tr>
				                      </table>                          
					</form>
					</div>
	<div class='col-lg-2'></div>
</div>
</div>

<div class='row'>

	<div class='col-lg-5'></div>
   <form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">
			<button class='botonExcel btn btn-info  col-lg-2 '  > Exportar a Excel <i class="fa fa-file-pdf-o"></i> </button>  
			<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
    </form>
    <div class='col-lg-5'></div>
</div>    
<br>
    
<div class='row' id='print-section'>
	
	<div class='col-lg-2'></div>
	<div class='col-lg-8'>
	<?=$funel?>
	</div>
	<div class='col-lg-2'></div>
</div>




<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />







<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->

