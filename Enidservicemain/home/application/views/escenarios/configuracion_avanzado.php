<button id="avanzado-config-escenario" class='btn btn-info pull-right'><i class="fa fa-eye"></i> Ver</button>
<div class="container"> 
    <div class="jumbotron">
	    <h1><?=$data_escenario["nombre"];?></h1>

	    <p><?=$data_escenario["descripcion"]?></p>
	        	    
		<!--********************************Tipos de escenarios *************************************-->
		<div class="btn-group-vertical" role="group" aria-label="Vertical button group">    
	      <div class="btn-group btn-lg" role="group">
	        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <?=$data_escenario["tipoescenario"];?>
	          <span class="caret"></span>
	        </button>
	        <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
	          <li><a href="#">General</a></li>
	          <li><a href="#">Principal</a></li>
	          <li><a href="#">Especial</a></li>
	        </ul>
	      </div>     
	    </div>
	    <!--*********************************************************************-->
	    <div class='pull-right'>
	    	<i class="fa fa-calendar"></i>
	    	Presentación 
			<?= $data_escenario["fecha_presentacion_inicio"] . " - ". $data_escenario["fecha_presentacion_termino"]; ?>
		</div>
		<!--*********************************************************************-->


	  
   	</div>
</div>




	