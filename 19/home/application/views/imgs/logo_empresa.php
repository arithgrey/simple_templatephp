<div class="modal-body">
	 <div class='response_img' id='response_img'>
	 </div>
	 <div class='lista-imagene' id='lista-imagene'>
	 </div>
    <form accept-charset="utf-8" method="POST" id="form_img_logo_empresa"  class="form_img_logo_empresa" enctype="multipart/form-data" >      
    	<input type="file" id='imagen_logo_empresa' class='imagen_logo_empresa' name="imagen"/>
		<input type='hidden' name='q' value='logo_empresa_cliente'>			
		<input class='dinamic_logo_empresa' id='dinamic_logo_empresa' name='dinamic_logo_empresa' type='hidden'>
		<center>
			<br>	
			
			<div class='lista_imagenes_logo' id='lista_imagenes_logo'>
			</div>		
			<br>
			<button type="submit" class='btn btn btn-sm guardar_img_enid' id='guardar_img_logo_empresa' style='color:white;'>
				Cargar ahora.!
			</button>			
		</center>       	
    </form>
</div>                








 <!--***************************End Header modal *********************************-->
	      <!--
	      <div class="modal-body">                  
	       
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
	
	      </div>            
	      -->
