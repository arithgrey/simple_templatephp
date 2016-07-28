<?php
	
	$promo_total =0;
	$complete ="";				
	$flag =1;	
	$elements ="<div class='col-12 col-md-12 col-sm-12'>";				

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
				$config =""; 			
				if($param["in_session"] == 1){									

						$config = '
							<a title = "Configura datos del acceso "  class="more  pull-right">
		                        <i data-toggle="modal" data-target="#editar-acceso"    class="fa fa-cog editar-acceso" id="'.$idacceso.'"></i> 
		                    </a>
		                    <a title = "Eliminar acceso del evento "  class="more  pull-right">
		                        <i data-toggle="modal" data-target="#confirma-delete-acceso" class="fa  fa-times delete-acceso" id="'.$idacceso.'" ></i> 
		                    </a>


	                    '; 
				}
			
			$elements .= '			        
        <div class="panel"> 
        					
        		'.$config.'
        		
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="blog-img-sm">
                            	
                                '. $img .'
                                
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h1 class="">
                            	<a href="">
                            	'. $nombre  .'
                            	</a>
                            </h1>

                            <p>
                            <p class=" auth-row">
                                <a href="#">
                                </a> 
                                	$'.$precio  .'  
                                	|  
                                	'.$vigencia.'   
                                	| 
                                <a class="tipo_promo" href="#">
	                                <strong>
	                                '.$tipo .'	
	                                </strong>
                                </a>
                            </p>
                            <span class="f_registro">
                            Registrado el '.$fecha_registro.'
                            </span>                            
                            '. $nota .'
                            </p>                          
                        </div>
                    </div>
                </div>
            </div>

            	
            <hr>
        ';                            
 		
        }      
        $elements .=  "</div>";                      
	
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