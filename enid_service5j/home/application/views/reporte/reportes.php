


























<script type="text/javascript" src="<?=base_url('application/js/reportes/reporte.js')?>"></script>
<div class='row'>
<div class='col-md-3'></div>
<div class='col-md-6'>


<section class="panel">
	<div class="panel-body">
		<form id="reporteForm">
			<div>
				<label>Reporte</label>
				<br>
				<input class="form-control" placeholder="Breve descripción del reporte" name="algoTexto" id="texto" type="text">
			</div>			
			<div>
				<label>
					Observaciones
				</label>

				<textarea rows="5" cols="20" class="form-control" id="cajaTX" name="cajaDeTexto" placeholder="Descripción del reporte o recomendación"></textarea>
			</div>
			
			<div>
				<label>
					Tipo
				</label>
				<select class="form-control m-bot15" name="seleccion" id="seleccion">
					<option value="Quiero que el sistema haga algo más de lo que ofrece ">
						Quiero que el sistema haga algo más de lo que ofrece 
					</option>
					<option value="Error en el funcionamiento">
						Error en el funcionamiento
					</option>
					<option value="Sugerencia">
						Sugerencia
					</option>
					<option value="Reporte de Error">
						Reporte de Error
					</option>
					<option value="Informacion inconsistente">
						Informacion inconsistente (No concuerda)
					</option>
					<option value="No se visualiza la pagina en mi dispositivo correctamente">
						No se visualiza la pagina en mi dispositivo correctamente
					</option>
					<option value="El sistema es lento">
						El sistema es lento 
					</option>
					<option value="No es la funcionalidad que deseo en algún apartado">
						No es la funcionalidad que deseo en algún apartado
					</option>
					<option value="No cumple con las necesidades de mi negocio">
						No cumple con las necesidades de mi negocio
					</option>
					<option value="Alǵun reporte del sistema presenta datos erroneos  ">
						Alǵun reporte del sistema presenta datos erroneos  
					</option>
					<option value="otro">
						otro
					</option>
				</select>
			</div>
			<div>
			
				<button type="submit" class="btn btn-primary" id="Enviar" >Enviar</button>
			</div>
		</form>
		<div id="etiquetaA"></div>
	</div>
</section>

</div>
<div class='col-md-3'></div>
</div>





