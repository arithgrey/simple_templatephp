<hr>
<div class='principal-objs'>
	<div class='row'>
		<div class='col-lg-12 col-md-12 col-sm-12 '>				
			<span class='text-title-enid'>
				Artículos permitidos
			</span>
			<p class='descripcion_permitido'>     
				<?=validacion_objs_permitidos($param["descripcion_permitido"],  $param["in_session"]   , $param["id_evento"]  ,  "ref_1" , "ref_2"  ,  "objs/#portlet_tab2");?>
			</p>
			<div class='listado_permitidos listado-contente-enid' id='listado_obj_permitidos'>
				<?=objs_pemitidos($objs , $param["in_session"] , $param["id_evento"])?>
			</div>
			<hr>
			<span class='text-title-enid'>
				Políticas
			</span>
			<p class='descripcion_politica'>     
				<?=validacion_objs_permitidos($param["descripcion_politica"],  $param["in_session"]   , $param["id_evento"] ,  "ref_3" , "ref_4" ,  "politicas/#portlet_tab2");?>
			</p>
			<div class='listado-contente-enid'>
				<div class='place_list_politicas' id='place_list_politicas'>
				</div>                                 
				<div class='list_politicas' id='list_politicas'>
				</div>                                 
			</div>			
			<hr>	
			<span class='text-title-enid'>
				Restricciones 
			</span>
			<p class='descripcion_restricciones'>     
				<?=validacion_objs_permitidos($param["descripcion_restriccion"],  $param["in_session"]   , $param["id_evento"] ,   "ref_5" , "ref_6"  , "restricciones/#portlet_tab2");?>
			</p>
			<div class='place_list_restricciones' id='place_list_restricciones'>
			</div>                                 
			<div class='list_restricciones' id='list_restricciones'>
			</div>  	                             		
		</div>
	</div>
</div>


<style type="text/css">
.ref_1 ,
.ref_2{	
	display: inline-table !important;	
}
.ref_3 ,
.ref_4{	
	display: inline-table !important;
}
.ref_5 ,
.ref_6{	
	display: inline-table !important;	
}
.ref_1 ,
.ref_2 ,
.ref_3 ,
.ref_4 ,
.ref_5 ,
.ref_6{
	font-size: .8em;	
}
</style>