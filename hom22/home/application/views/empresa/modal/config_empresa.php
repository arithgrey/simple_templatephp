<!---->
<!--************************************************** NOTA DEL CONTACTO-->
<?=construye_header_modal('reservaciones-modal', "Reservaciones" );?>                           
   <form class='form-servaciones' id='form-servaciones'
    action="<?=base_url('index.php/api/emp/reservacion/format/json/')?>">  
        <label>
            Teléfono para reservaciones
        </label>
          



        <div class="input-group m-bot15">
            <span class="input-group-addon">
				Tel.
            </span>
            <input class="form-control input-sm" name="reservacion_tel" id="reservacion_tel" placeholder="Teléfono" maxlength="10" required="" type="tel">                                                                
        </div>

        <span class='place_tel'>            
        </span>
        


        <div class="input-group m-bot15">
	        <span class="input-group-addon">
	           Correo @
	        </span>
	        <input id='reservacion_mail' class="form-control input-sm" name="reservacion_mail" placeholder="arithgrey@gmail.com" type="text">
        </div>

        <br>
        <button  id="button-registrar" class="btn btn-default btn_save ">
            Registrar 
        </button>
   </form>           
   <span class='place_reservaciones'>   	
   </span>
<?=construye_footer_modal()?>  







<!---->




<?=construye_header_modal('modal-locacion', " Logo de la empresa  " );?>
	<form class='form-paises' id='form-paises' action="<?=base_url('index.php/api/emp/pais/format/json/')?>">
		<?=get_select_paises($paises, "pais_empresa" , "pais_empresa", "pais_empresa" )?>	
		<br>
		<button class="btn  btn-default btn_save">
			Registrar cambios
		</button>	
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
				<span class='place_pais'>			
				</span>		
			</div>
			
		</div>
		
	</form>
	
	
<?=construye_footer_modal()?>  



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




