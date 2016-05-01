
<!--*********************************LOGO DE LA EMPRESA  *******************************-->
<div id="modal-logo-empresa" class="modal fade">  
	<div class="modal-dialog">
	  <div class="modal-content">      
	      <!--*************************** Header modal *********************************-->
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">
	        	&times;
	        </button>
	        <h4 class="modal-title">
	        	Logo de la empresa 
	        </h4>
	      </div>            
	      <!--***************************End Header modal *********************************-->
	      <div class="modal-body">                  
	        <div class='response_img' id='response_img'>
	        </div>
	        <div class='row'>
	            <div class='lista-imagene' id='lista-imagene'>
	            </div>
	        </div>	               
	        <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post"  enctype="multipart/form-data" id='formulario-logo' >
	            <div class="form-group">
		            Logo de la empresa :
		            <input type="file" name="imageempresa[]"  id="imgs-empresa">
		            <input type='hidden' name="e" value='1'>
	            </div>                      
	        </form>        
	      </div><!--*********************Termina body modal ******************* -->             
	      <!--Modal footer -->
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">
	        	Cerrar
	        </button>
	      </div>
	  </div>
	</div>
</div>

<!--*********************************LOGO DE LA EMPRESA  TERMINA  *******************************-->






























<!---->
<div id="modal-social-empresa" class="modal fade">  
	<div class="modal-dialog">
	  <div class="modal-content">      
	      <!--*************************** Header modal *********************************-->
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">
	        	&times;
	        </button>
	        <h4 class="title-modal-social  modal-title" id='title-modal-social'>
	        	
	        </h4>
	      </div>            
	      <!--***************************End Header modal *********************************-->
	      <div class="modal-body">                  
	       
	      			     
		      	<div id='section-form-url-fb'>
		      		<form action="<?=base_url('index.php/api/emp/q/format/json/')?>" id="form-social-fb" class='form-social-fb'>
				      	<div class="form-group">            
			                <div class="input-group m-bot15">
			                   <span class="input-group-addon">
			                        https://www.facebook.com/
			                   </span>
			                   <input class="form-control" name="npagina_fb" id="npagina_fb" type="text" placeholder="enidservice">
			                </div>
			            </div>
			            <div class='response-status-fb' id="response-status-fb"></div>			            
			            <button class='btn  btn-default btn_save'>
	                 		Actualizar ahora.!
	                 	</button>
                 	</form>
	         	</div>




	         	<div id='section-form-url-tw' >
	         		<form action="<?=base_url('index.php/api/emp/q/format/json/')?>" id="form-social-tw" class='form-social-tw'>
				      	<div class="form-group">            
		                    <div class="input-group m-bot15">
		                       <span class="input-group-addon">
		                            https://twitter.com/
		                       </span>
		                       <input class="form-control" name="npagina_tw" id="npagina_tw" type="text" placeholder="enidservice">
		                    </div>
	                 	</div>
	                 	<div class='response-status-tw' id="response-status-tw"></div>			            
	                 	<button class='btn  btn-default btn_save'>
	                 		Actualizar ahora.!
	                 	</button>
                 	</form>

	         	</div>



	         	<div id='section-form-url-gp' >
	         		<form action="<?=base_url('index.php/api/emp/q/format/json/')?>" id="form-social-gp" class='form-social-gp'>
				      	<div class="form-group">            
				             <div class="input-group m-bot15">
				                <span class="input-group-addon">
				                    G + 
				                </span>
				                <input class="form-control" name="npagina_gp" id="npagina_gp" placeholder="www" type="text">
				             </div>
			         	</div>
			         	<div class='response-status-gp' id="response-status-gp"></div>			            
			         	<button class='btn  btn-default btn_save'>
	                 		Actualizar ahora.!
	                 	</button>
                 	</form>
	         	</div>
         	


	        
	         	<div id='section-form-url-www' class='section-form-url-www'>
	         		<form action="<?=base_url('index.php/api/emp/q/format/json/')?>" id="form-social-www" class='form-social-www'>
				      	<div class="form-group">            
				             <div class="input-group m-bot15">
				                <span class="input-group-addon">
				                    wwww + 
				                </span>
				                <input class="form-control" name="npagina_www" id="npagina_www" placeholder="www" type="text">
				             </div>
			         	</div>
			         	<div class='response-status-www' id="response-status-www"></div>			            
			         	<button class='btn  btn-default btn_save'>
	                 		Actualizar ahora.!
	                 	</button>
                 	</form>
	         	</div>
         	


		


	      </div><!--*********************Termina body modal ******************* -->             
	      <!--Modal footer -->
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">
	        	Cerrar
	        </button>
	      </div>
	  </div>
	</div>
</div>
<!---->

































<!--MODAL QUE MIESTRA LAS IMG EN GRANDE -->
<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">
        ×
        </button>
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>
<!--TERMINA  MODAL QUE MIESTRA LAS IMG EN GRANDE -->




