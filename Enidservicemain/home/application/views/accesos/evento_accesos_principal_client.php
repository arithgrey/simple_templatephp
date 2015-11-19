<style type="text/css">
.wrapper{
	background: #124048 !important;
}
.title_main{
	display: none;
}

</style>
<div class='row'>

	<div class='col-lg-1'></div>
	<div class='col-lg-10' style='background:white;'>

	<!--*****************************************************************************-->	
<div class='row'>
            

                 <div class="panel panel-primary" >
                   <div class="panel-heading" style='background:#E12B25 !important; height: 250px !important; '>
                   		
                   		<div class='col-lg-12'>                   			
                   			<h1><a style='color:white;' href="<?=base_url('index.php/eventos/visualizar')?>/<?=$data_evento['idevento']?>"><i class="fa fa-pencil-square-o"></i> </a><?=$data_evento["nombre_evento"] ?></h1>                   			
                   		</div>		


                   		<div class='col-lg-12'><?=$data_evento["edicion"]?></div>

                   		<div class='col-lg-12'>
                   			<div class='pull-right'>
                   				  <i class="fa fa-calendar-o"></i> Del <?=$data_evento["fecha_inicio"]?> al <?=$data_evento["fecha_termino"]?> | <i class="fa fa-map-marker"></i>
 <?=$data_evento["ubicacion"]?>
                   			</div>

                   			

                   		</div>                   		
                   		<div class='col-lg-12'>
                   			<?=$resumen_event?>
                   		</div>                   		
                   </div> 	
                   <div class='col-lg-12' ><span class='pull-right' style='font-size: .9em;'> <?=$data_evento["eslogan"]?></span></div>

                   <!--************************************-->
                   <div class='col-lg-12'>























<div class="col-md-12" style="color:black; background:white !important;">                    
                
            <h2 style="color:#1C84A7;">Nuestras promociones <a href="<?=base_url('index.php/accesos/configuracionavanzada/0/')?>/<?=$data_evento['idevento']?>"><i class="fa fa-pencil-square-o"></i></a></h2>                                     
            <div class="row grid-space-10">
            	
            		<?=$accesos_evento?>
            	
            </div>
</div>

















                   </div>
                   <!--************************************-->



                   
                </div>




</div> 













	<!--*****************************************************************************-->	

	</div>
	<div class='col-lg-1'></div>

</div>
