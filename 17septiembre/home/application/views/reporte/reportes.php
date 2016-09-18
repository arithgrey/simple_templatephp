<!--Termina  la seccion de propuestas  -->
<div class='row'>
	<center>
		<div class='seccion_selected_action'>	
			<center>
				<span class='accion'>
						¿Qué quieres hacer?
					<select  name='action_user' class='action_user form-control text-center'>						
						<option value='1'>
							Reportar un error del sistema 
						</option>
						<option value='2'>
							Proponer una mejora 
						</option>
						
					</select>
				</span>
			</center>		
		</div>  
	</center>
</div>


<div class='row seccion_formularios'>
	<!--Seccion de posibles errores -->
	<div class='seccion_errores '>
		<div class='place_error_disponibles'>
		</div>
	</div>
	<!--Termina  la seccion de posibles errores -->
	<!--Seccion de propuestas  -->
	<div class='seccion_propuestas '>
		<div class='place_seccion_propuestas'>
		</div>
	</div>
	<!--Termina  la seccion de propuestas  -->	
</div>

<style type="text/css">



/**/
.seccion_selected_action{	
	width: 25%;
	margin-left: 1%;
}
.accion{
  top: 14%; 
  left: 6%;   
  font-weight: bold;
}
.version_sistema{
	top: 95%; 
	position: absolute;
	font-size: .9em;
	color: #023D5A;
}
.seccion_propuestas, .seccion_funcionalidad{
	display: none;
}
.seccion_formularios{
	margin-top: 5%;
}.action_user{
	text-align: center;
}
</style>
<script type="text/javascript" src="<?=base_url('application/js/reportes/reporte.js')?>"></script>