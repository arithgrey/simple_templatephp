<?php
		$list = "";
		$escenarios_block =  "";	
        $dinamic_class ='no_escenario';
        foreach($escenarios as $row) {        

        	$nombre =  $row["nombre"];
            $idescenariovalidation  = $row["idescenario"];
            $tipoescenario =  $row["tipoescenario"];
            $numero_artistas = 0;
            $numero_artistas =  $row["numero_artistas"];                       
            $fecha_escenario= fechas_enid_format($row["fecha_presentacion_inicio"]  , $row["fecha_presentacion_termino"] );
            $url_escenario = base_url('index.php/escenario/configuracionavanzada/'.$row["idescenario"]);                        
            $img =  create_icon_img($row , " img_resumen_escenario " ,  ""  );           

	            $section_delete =  "<i data-toggle='modal' data-target='#confirmationdeleteescenario' class='fa fa-times deleteescenario pull-right' id='". $row["idescenario"] ."' >
	                                </i><br>
                                    <a href='".$url_escenario."'>
                                        <i class='fa fa-cog pull-right config_escenario_btn'>
                                        </i>
                                    </a>    
	                                ";
	            $extra_info =  $fecha_escenario . $tipoescenario . " #artistas " . $numero_artistas;                     
                    $list .= '
            			<div class="media">
            				'.$section_delete.'
            				<div class="col-lg-4 col-sm-12" >
	                            <a href="'.$url_escenario.'" class="pull-left">
	                               '. $img .'
	                            </a>
                            </div>                            
                            <div class="media-body col-lg-8 col-sm-12 ">
                                <h5 class="media-heading">
                                	<a href="'.$url_escenario.'">
                                	'.$nombre.'
                                	</a>
                                </h5>
                                <p class="resumen-escenario">                                   
                                	'.$extra_info.'
                                </p>
                            </div>
                        </div>
                        <hr>
                        ';                    

           
    }        
   	
    
    if (count($escenarios) > 0 ){
    	$escenarios_block =  "<h3>
                                Escenarios de evento
                			  </h3>                       
            			  ";	
        $dinamic_class  = '';
    }
    
    $escenarios_block .= $list;        			  
?>

<div class='seccion_escenarios_right <?=$dinamic_class?>'>
    <div class="panel" >
        <div class="panel-body">
            <div class="blog-post">            
                <?=$escenarios_block;?>     	                            
            </div>
        </div>
    </div>
</div>    
<div class='seccion_escenario_right_form'>
    <div class='panel'>
        <div class="panel-body">
            <form id="form-escenario" method="POST">
                <h4> 
                	<small class='text-escenario-lb'>                		  
                	   Cargar Escenario al evento
                	</small>
                </h4>  
                <div class="form-group todo-entry">
                    <input type="hidden" name="evento_escenario" id="evento_escenario" value="<?=$evento;?>">
                	<input placeholder="Añadir escenario" class="form-control nuevo-escenario-input"  type="text" id='nuevo-escenario-input' name='nuevoescenario'  required>
                </div>
                <button class="btn btn-primary pull-right" type="submit" id="nuevo-escenario">
                <i class="fa fa-plus">
                </i>
                </button>
            </form>
        </div>
    </div>
</div>
<style type="text/css">
.img_resumen_escenario{
	width: 100%;	
}
.resumen-escenario{
	font-size: .8em;
}
.nuevo-escenario-input{
    width: 100%    
}
.seccion_escenarios_right{
    background: rgb(53, 63, 72);
    padding: 10px;
}
.text-escenario-lb{
    color: black;    
}
.no_escenario{
    display: none;
}
.deleteescenario{
    font-size: .6em !important;
}
.config_escenario_btn{
    font-size: .9em !important;   
}
.deleteescenario:hover , .config_escenario_btn:hover{
    cursor: pointer;
}

</style>
<script type="text/javascript" src="<?=base_url('application/js/evento/escenarios.js')?>"></script>



















                        