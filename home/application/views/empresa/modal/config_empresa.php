<!--*********************************LOGO DE LA EMPRESA  *******************************-->
<?=construye_header_modal('modal-logo-empresa', " Logo de la empresa  " );?>
<?=$this->load->view("imgs/logo_empresa")?>
<?=construye_footer_modal()?>  
<!--*********************************LOGO DE LA EMPRESA  TERMINA  *******************************-->
<?=construye_header_modal('modal-social-empresa', " <div class='title-modal-social  modal-title' id='title-modal-social'  ></div> " );?>
            		     
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
				<div class='response-status-fb' id="response-status-fb">
				</div>			            
			  	<button class='btn  btn-default btn_save'>
	                Registrar cambios
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
	                 	<div class='response-status-tw' id="response-status-tw">
	                 	</div>			            
	                 	<button class='btn  btn-default btn_save'>
	                 		Registrar cambios
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
			         	<div class='response-status-gp' id="response-status-gp">
			         	</div>			            
			         	<button class='btn  btn-default btn_save'>
	                 		Registrar cambios
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
			         	<div class='response-status-www' id="response-status-www">
			         	</div>			            
			         	<button class='btn  btn-default btn_save'>
	                 		Registrar cambios
	                 	</button>
                 	</form>
	         	</div>
	         	<div class='place_url_social'>
	         	</div>
<?=construye_footer_modal()?>  

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




