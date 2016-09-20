<?php	
	$promo_total =0;
	$complete ="";				
	$flag =1;	
	$elements ="";				

			foreach ($accesos as $row){
					
				$promo_total ++;
				$idacceso  =  $row["idacceso"];  
				$nombre =  $row["nombre"];
				$nota  =  $row["nota"];    
				$precio  = "<span title ='Precio del acceso al público'>" . $row["precio"] . "</span>";              
				$inicio_acceso =  $row["inicio_acceso"]; 
				$termino_acceso =$row["termino_acceso"];						
				$idevento  = $row["idevento"];          
				$idtipo_acceso = $row["idtipo_acceso"]; 						
				$vigencia = "Del " . $inicio_acceso ." al día ".   $termino_acceso;
				$idtipo_acceso = $row["idtipo_acceso"];
				$tipo = $row["tipo"];                 				
				$img_acceso = create_icon_img($row , " img_acceso  pull-left  ", $idacceso , ' data-toggle="modal" data-target="#acceso-imagen-modal"  '  ); 
				$fecha_registro =  $row["fecha_registro"];
				$img = '<div data-toggle="modal" data-target="#acceso-imagen-modal"    class="imgagen_acceso"  >'. $img_acceso .'</div>';

                $nota =  show_more_text($nota);

				$config =""; 			

				if($param["in_session"] == 1){									

						$config = '
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">             
                                        <a title = "Configura datos del acceso "  class="more  pull-right">
            		                        <i data-toggle="modal" data-target="#editar-acceso" class="fa fa-cog editar-acceso" 
                                            id="'.$idacceso.'">
                                            </i> 
            		                    </a>
            		                    <a title = "Eliminar acceso del evento "  class="more  pull-right">
            		                        <i data-toggle="modal" data-target="#confirma-delete-acceso" 
                                            class="fa fa-times delete-acceso" id="'.$idacceso.'" >
                                            </i> 
            		                    </a>
                                    </div>
                                </div>'; 
				}
			

			$elements .= '	
	<div>                             
        '.$config.'             
        <div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div>
                        '. $img .'                                                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <div class="row  contenedor-resumen-accesos">
                    <span class="nombre-acceso">
                        '.$nombre.'                                
                    </span>
                </div>

                <div class="row contenedor-resumen-accesos">
                    <div>
                        <span class="a1">
                            '.$tipo .'        
                        </span>    
                        <span class="a2">
                            $'.$precio  .'
                        </span>    
                        <span class="a3">
                            '.$vigencia.'     
                        </span>    
                        <span class="a4">
                            Fecha registro'.$fecha_registro.'                                                
                        </span>
                    </div>        
                </div>
                <div class="row">
                    <div >
                        '. $nota .'                                
                    </div>                
                </div>            
            </div>
        </div>
    </div>                    
<hr>
        ';                            
 		
        }      
                         
	
?>
<?=$elements?>
<style type="text/css">
.f_registro{
    font-size: .9em;
}
.tipo_promo{
	color: #166781 !important;
	text-align: right;
}
</style>