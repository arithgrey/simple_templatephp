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
	<div class="panel-body " style="">
		<div class="tab-content">
			<div id="home3" class="tab-pane active">
                                    
			<!--************Tabla general ********************-->
				
				
			
			<div style='background:#EAF4F8;'>
				<div class='list-accesos' id='list-accesos'>
					<?=$accesos_in_event;?>	
				</div>		
			</div>		
					
						
				






		<div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered' style="background:#DEE0A6; padding:50px;" >
			<h1>+ Venta, promoción, preventa .... </h1>
		<form id="form-new-acceso" action="<?=base_url('index.php/api/accesos/acceso/format/json')?>" method="post" >
			
			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
				<select class='form-control' name='tipo' class='nuevo-tipo-acceso' id='nuevo-tipo-acceso'> 
					<?=$tipos_accesos;?>
				</select>							
			</div>
			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
				<div class="input-group m-bot15">
				<span class="input-group-addon">$</span>
				<input class="form-control" type="number" name='precio' id='precio-acceso-record' required>
				<span class="input-group-addon ">.00</span>
	        </div>
			</div>
			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
				<div class="input-group" >
	                <input class="form-control dpd1" name="inicio" id="inicio-acceso-record" type="text" required>
	                <span class="input-group-addon"></span>
	                <input class="form-control dpd2" name="termino" id="termino-acceso-record" type="text" required>
	        	</div> 
			</div>
			<input type="hidden" name="evento" id="evento" value="<?=$evento;?>">
			
			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
				<label>Nota adicional</label>
				<div class="form-group">                        
                    <textarea name='descripcion' id='descripcion' rows="6" class="form-control"></textarea>                       
                </div>                
			</div>

			<div class='col-xs-12  col-sm-12 col-md-12 col-lg-1 centered' >
				<button class="btn btn-info acceso-registro-button">Registrar </button>
			</div>		
		 </form>			
		</div>		















				<!--Termina el nuevo -->



			</div>
		<div id="about3" class="tab-pane">














<div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Media Manager
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">

                            <ul id="filters" class="media-filter">
                                <li><a href="#" data-filter="*"> All</a></li>
                                <li><a href="#" data-filter=".images">Images</a></li>
                                <li><a href="#" data-filter=".audio">Audio</a></li>
                                <li><a href="#" data-filter=".video">Video</a></li>
                                <li><a href="#" data-filter=".documents">Documents</a></li>
                            </ul>

                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i> Select all</button>
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-folder-open"></i> Add New</button>
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-trash-o"></i> Delete</button>
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Upload New File</button>
                            </div>



                            <div style="position: relative; overflow: hidden; height: 250.65px;" id="gallery" class="media-gal isotope">
                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="images item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image1.jpg" alt="">
                                    </a>
                                    <p>img01.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="audio item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image2.jpg" alt="">
                                    </a>
                                    <p>img02.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="video item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image3.jpg" alt="">
                                    </a>
                                    <p>img03.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(244px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="images audio item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image4.jpg" alt="">
                                    </a>
                                    <p>img04.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;" class="images documents item  isotope-item">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image5.jpg" alt="">
                                    </a>
                                    <p>img05.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(487px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="audio item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image1.jpg" alt="">
                                    </a>
                                    <p>img01.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(244px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;" class="documents item  isotope-item">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image2.jpg" alt="">
                                    </a>
                                    <p>img02.jpg </p>
                                </div>
                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(244px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="video item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image3.jpg" alt="">
                                    </a>
                                    <p>img03.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(731px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="images item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image4.jpg" alt="">
                                    </a>
                                    <p>img04.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(487px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;" class="documents item  isotope-item">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image5.jpg" alt="">
                                    </a>
                                    <p>img05.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(487px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="video item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image1.jpg" alt="">
                                    </a>
                                    <p>img01.jpg </p>
                                </div>

                                <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(731px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;" class="audio images item  isotope-item isotope-hidden">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image2.jpg" alt="">
                                    </a>
                                    <p>img02.jpg </p>
                                </div>

                            </div>

                            <div class="col-md-12 text-center clearfix">
                                <ul class="pagination">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Edit Media Gallery</h4>
                                        </div>

                                        <div class="modal-body row">

                                            <div class="col-md-5 img-modal">
                                                <img src="images/gallery/image1.jpg" alt="">
                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit Image</a>
                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> View Full Size</a>

                                                <p class="mtop10"><strong>File Name:</strong> img01.jpg</p>
                                                <p><strong>File Type:</strong> jpg</p>
                                                <p><strong>Resolution:</strong> 300x200</p>
                                                <p><strong>Uploaded By:</strong> <a href="#">ThemeBucket</a></p>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label> Name</label>
                                                    <input id="name" value="img01.jpg" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label> Tittle Text</label>
                                                    <input id="title" value="awesome image" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label> Description</label>
                                                    <textarea rows="2" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label> Link URL</label>
                                                    <input id="link" value="images/gallery/img01.jpg" class="form-control">
                                                </div>
                                                <div class="pull-right">
                                                    <button class="btn btn-danger btn-sm" type="button">Delete</button>
                                                    <button class="btn btn-success btn-sm" type="button">Save changes</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- modal -->

                        </div>
                    </section>
                </div>
































	</div>
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
				<button class="btn btn-info new-acceso">Guardar</button>
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



