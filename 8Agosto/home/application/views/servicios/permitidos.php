<div class='blocke-par'>		
	<span class='msj_articulos'>
	   Artículos permitidos
	</span>
	<p class='descripcion_permitido'>     
	  <?=validacion_objs_permitidos($param["descripcion_permitido"],  $param["in_session"]   , $param["id_evento"] ,  "objs/#portlet_tab2");?>
	</p>
	<div class='listado_permitidos' id='listado_obj_permitidos'>
		<?=objs_pemitidos($objs , $param["in_session"] , $param["id_evento"])?>
	</div>
	<hr>
	<br><br>

	<span class='msj_politicas'>
	   Políticas
	</span>
	<p class='descripcion_politica'>     
		<?=validacion_objs_permitidos($param["descripcion_politica"],  $param["in_session"]   , $param["id_evento"] ,  "politicas/#portlet_tab2");?>
	</p>
	<div class='place_list_politicas' id='place_list_politicas'>
	</div>                                 
	<div class='list_politicas' id='list_politicas'>
	</div>                                 
	<hr>
	<br><br>
	<span class='msj_restricciones'>
	Restricciones 
	</span>
	<p class='descripcion_restricciones'>     
		<?=validacion_objs_permitidos($param["descripcion_restriccion"],  $param["in_session"]   , $param["id_evento"] , "restricciones/#portlet_tab2");?>
	</p>
	<div class='place_list_restricciones' id='place_list_restricciones'>
	</div>                                 
	<div class='list_restricciones' id='list_restricciones'>
	</div>                                 
</div>




<!---->
<style type="text/css">
	.table_objs_permitidos{
		width: 100%;
	}
	.table_objs_permitidos td {
		font-size:  .8em;
	}
	.seccion_table_objs{
		height: 100px;
	}
	.seccion_table_objs_scroll{
		overflow-y:scroll;
	}
	.listado_permitidos{
		background: whitesmoke;		
	}
	.msj_articulos , .msj_politicas , .msj_restricciones{
	    font-size: 2em;  
	  font-weight: bold;
	}

	.blocke-par{
		background: #f9f9f9;
		padding: 20px;	
	}
	

</style>