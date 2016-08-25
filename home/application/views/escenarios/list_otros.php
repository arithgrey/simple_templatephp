<?php

    $dinamic_class=""; 
    if(count($escenarios) == 3){
        $dinamic_class="otros_escenarios2";
    }else if(count($escenarios) > 3 ){
        $dinamic_class="otros_escenarios3";
    }

    //$list =  "<div class='$dinamic_class'>";      
    $list =  "<div>
    			    <h6 class='description description_seccion'>
			         Otros escenarios
			        </h6>
			  ";      
    foreach ($escenarios as $row){    	
        

        $url = base_url('index.php/escenario/inevento')."/".$row["idescenario"]."/".$id_evento;        
        $nombre = $row["nombre"];                
        $tipoescenario =  $row["tipoescenario"];        
        $fecha_escenario =  fechas_enid_format($row["fecha_presentacion_inicio"]  , $row["fecha_presentacion_termino"] ); 
        $img =  create_icon_img($row , "img-responsive", " ");        
        $descripcion = part_descripcion($row["descripcion"] ,  5  , 200 );                 
        
        if ($id_escenario !=  $row["idescenario"]) {
				


        	$list .=  '
			<section class="team"> 
			    <div>			      
			        <div>
			          <div class="row pt-md">
			            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile">
			              <a href="'.$url .'">
				              <div class="img-box">			                
				                '.$img.'
				              </div>
			              </a>

			              <div class="info-otros">
				              <h1 class="profile">
				              	'.$nombre.'
				              </h1>
				              <h3>
				              	'.$tipoescenario.'/'.$fecha_escenario.'
				              </h3>
				              <p>
				              	'.$descripcion .'
				              </p>
				          </div>    

			            </div>            
			          </div>
			        </div>			      
			    </div>  
			</section>
			';

		           
           	/* 
            $list .= '						                       
						<div>
						    <div class="contenido_escenario">       
						      <a href="'.$url.'" >
						          <div class="col-lg-6 col-md-6 col-sm-12" >                               
						          '. $img .'                               
						          </div>
						          <div >
						              <span class="col-lg-6 col-md-6 col-sm-12 text-center  otros_contenido ">                                                                        
						              '. $nombre .'                                    
						                  <br>
						              '.$footer_escenarios.'
						              </span>
						          </div>    
						      </a>    
						      <div class="row">
						          <div class="seccion_descripcion">
						          	<div class="col-lg-12 col-md-12 col-sm-12">
						              <p class="p-escenario-enid">
						                  <span class="experiencia_esc">
						                  La experiencia
						                  </span>
						                    <br>
						                  <span class="seccion_descripcion_otros">
						                  	'.$descripcion.
						                  '</span>
						              </p>
						            </div>
						          </div>
						      </div>
						    </div>  
						</div>
						<hr>                            
			';
			*/
                
      }    

    }

$list .=  "</div>";   					      

?>
<?=$list;?>
<style type="text/css">
.otros_contenido{	
	padding: 50px;
    background: #03A9F4;
    color: white;
}
.p-escenario-enid{	
	background: #b7e3e8;
	margin: 0 auto;
	padding: 10px;	
}
.description_seccion{
	background: #0c9ec7;
    padding: 10px;
    width: 90%;
    margin: 0 auto;
    color: white;
    font-size: 2em;
    font-weight: bold;
}.info-otros{
	width: 90% !important;
	margin: 0 auto;
}
</style>


