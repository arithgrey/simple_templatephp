<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/avanzado.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>








				<section class="panel">
                        <header class="blue-col-enid panel-heading custom-tab turquoise-tab">
                            <ul class="nav nav-tabs blue-col-enid">
                                <li class="active">
                                    <a data-toggle="tab" href="#home3">
                                        <i class="fa fa-money"></i>
                                        Accesesos y promociones
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#about3">
                                        <i class="fa fa-map-marker"></i> puntos de venta
                                    </a>
                                </li>
                                
                            </ul>
                        </header>
                        <div class="panel-body blue-col-enid-complement" style="">
                            <div class="tab-content">
                                <div id="home3" class="tab-pane active">
                                    
<!--************Tabla general ********************-->
	<table class="display table table-bordered table-striped dataTable" id="dynamic-table">
		<thead class="blue-col-enid">
			<tr role="row">
				<th>#</th>
				<th></th>
				<th></th>	
				<th></th>
				<th></th>	
				<th></th>
				<th></th>
			</tr>
		</thead>
		        
		<tfoot class="blue-col-enid">
			<tr>
				<th>#</th>
				<th></th>
				<th></th>	
				<th></th>
				<th></th>	
				<th></th>
				<th></th>
			</tr>
		</tfoot>		              
		<tbody class="list-accesos" id="list-accesos">
			<!--************Contenido de la tabla general ********************-->
			<?=$accesos_in_event;?>	
			<!--************Termina Contenido de la tabla general ********************-->
		</tbody>
		
	</table><!--************Termina la tabla general ********************-->

                                </div>
                                <div id="about3" class="tab-pane">About</div>
                                <div id="contact3" class="tab-pane">Contact</div>
                            </div>
                        </div>
                    </section>








<!--************Contenido de la tabla general ********************-->
<div id="editar-acceso" class="modal fade">
  
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Actualizar Ventas, promociones, preventas .... </h4>
        </div>        
        <div class="modal-body">  


        		<div class='row'>
		<form class='dinamic-form' id='dinamic-form' action='' method='post'>

		<div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered' >
			
			
			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
				<select class='form-control' name='nuevo_tipo_acceso' class='nuevo-tipo-acceso' id='nuevo-tipo-acceso'> 
				<?=$tipos_accesos;?>
			</select>
			<input type="hidden" name="evento" id="evento" value="<?=$evento;?>">
			<input type="hidden" name="acceso" id="acceso" class='acceso' value="">
			</div>
			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
				<div class="input-group m-bot15">
				<span class="input-group-addon">$</span>
				<input class="form-control" type="text" name='nuevo_precio' id='nuevo-precio'>
				<span class="input-group-addon ">.00</span>
	        </div>
			</div>
			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
				<div class="input-group" >
	                <input class="form-control dpd1" name="nuevo_inicio_acceso" id="nuevo-inicio-acceso" type="text" required>
	                <span class="input-group-addon"></span>
	                <input class="form-control dpd2" name="nuevo_termino_acceso" id="nuevo-termino-acceso" type="text" required>
	        	</div> 
			</div>
			
			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
				<label>Nota adicional</label>
				<div class="form-group">                        
                    <textarea name='nueva_descripcion' id='nueva-descripcion' rows="6" class="form-control"></textarea>                       
                </div>                
			</div>


			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-1 centered' >
				<button class="btn btn-info new-acceso"><i class="fa fa-save fa-2x"></i> </button>
			</div>


			

			
			
	    </form>
        </div>			


	</div>	





                 <div class="modal-footer">
            
                      
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                      
                  </div>
         </div>         
      </div>
    </div>
  </div>
</div>



	
	

























    <button id="avanzado-config-acceso" class='btn btn-info'>
      <i class="fa fa-eye"></i>
      Ver
    </button>
<!--***********************************INICIA   CONFIRMAR DELETE ACCESOS MODAL *************************-->
<div id="confirma-delete-acceso" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">      
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Eliminar</h4>
        </div>        
        <div class="modal-body">  
                 <div class="modal-footer">
                      Realmente decea quitar de la lista el acceso??
                      <button type="button" class="btn btn-default" id="aceptar-delete-acceso" data-dismiss="modal">Aceptar</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                      
                  </div>
         </div>         
      </div>
    </div>
  </div>
</div>
<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->

