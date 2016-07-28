<form accept-charset="utf-8" method="POST" id="form_img_enid_pv"  class="form_img_enid_pv" enctype="multipart/form-data" >
	<input type="file" id='imagen_upload_punto_venta' class='imagen_upload_punto_venta' name="imagen"/>
	<input type='hidden' name='q' value='punto_venta_cliente'>			
	<input class='dinamic_punto_venta' id='dinamic_punto_venta'  name='d_punto_venta' type='hidden' value='<?=$param["punto_venta"]?>'>
	<center>
		<br>			
		<div class='lista_imagenes_punto_venta' id='lista_imagenes_punto_venta'>
		</div>		
		<br>
		<button type="submit" class='btn btn btn-sm guardar_img_enid' id='guardar_img_enid'>
				Cargar ahora.!
		</button>
			
	</center>	
</form>
<style type="text/css">
	.guardar_img_enid{
		display: none;
	}
	.guardar_img_enid{
		color:white;
	}
</style>