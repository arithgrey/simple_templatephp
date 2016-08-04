<br>
<br>
<?php 	

	$list = "";		
	$estado_user =  ""; 
	$id_usuario =  0; 
	foreach ($usuario as $row ){	        
		$list = "Configurar estado del usuario " . $row["email"] . " " . $row["nombre"] . " estado actual ";   		
		$estado_user = $row["status"];
		$id_usuario =  $row["idusuario"];		
	}
?>

<form class='form_estatus' id="form_estatus" action="<?=base_url('index.php/api/user/estado/format/json/')?>">	
	<div class='col-lg-6'>
		<p class='center text-descripcion-user' >
			<?=$list?>
		</p>
	</div>
	<div class='col-lg-2'>
		<input type="hidden" name="usuario_modificacion" value="<?=$id_usuario;?>">		
		<?=create_select_estados_user($estado_user , " form-control input-sm ")?>
	</div>
	<div  class='col-lg-2' >
		
		<button type="submit" class='form-control'>
			Modificar estado
		</button>
	</div>
</form>
	<div  class='col-lg-2' >
		<button  class='form-control' id="btn_cancelar">
			Cancelar
		</button>
	</div>	
<style type="text/css">
	.text-descripcion-user{
		font-size: .85em;
	}
</style>
<script type="text/javascript" src="<?=base_url('application/js/usuarios/config_user.js')?>"></script>