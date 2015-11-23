
<style>
    .form_hover {
        padding: 0px;
        position: relative;
        overflow: hidden;
        height: 240px;
    }

        .form_hover:hover .header {
            opacity: 1;
            transform: translateY(-172px);
            -webkit-transform: translateY(-172px);
            -moz-transform: translateY(-172px);
            -ms-transform: translateY(-172px);
            -o-transform: translateY(-172px);
        }

        .form_hover img {
            z-index: 4;
        }

        .form_hover .header {
            position: absolute;
            top: 170px;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form_hover .blur {
            height: 240px;
            z-index: 5;
            position: absolute;
            width: 100%;
        }

        .form_hover .caption-text {
            z-index: 10;
            color: #fff;
            position: absolute;
            height: 240px;
            text-align: center;
            top: -20px;
            width: 100%;
        }
</style>







































<div class='row'>
	<div class='col-md-12'>
		<div class="panel header-panel">
              <div class="panel-heading"><h1 style="color:#0F272C;" ><?=$titulo ?> </h1></div>
              <div class="panel-body fixed-panel panel-contenido"  >                                            
                  
		 
		            	<h2 class='col-md-12'>
		            		<a style="color:white;" href="<?=base_url('index.php/eventos/visualizar/'.$data_evento['idevento'])?>"> 
		            			<?=$data_evento["nombre_evento"]?>  
		            		</a>
		            	</h2>
                    	<h4 class='col-md-12'>
                    		<span><?=$data_evento["edicion"]?></span>
                    	</h4>                                                                    
						<div class='col-md-12'>
							<?=$resumen_event?>
						</div>		                                      
                    	
                    	<div class='col-md-12'>
	                    	<span class='pull-left'>
	                    		 <i class="fa fa-calendar-o"></i>  <?=$data_evento["fecha_inicio"] ?>   al   <?=$data_evento["fecha_termino"]?>| <i class="fa fa-map-marker"></i> <?=$data_evento["ubicacion"]?>  
		                    </span> 						                                                    
	                    	<a  href="<?=base_url('index.php/eventos/nuevo/' . $data_evento['idevento'])?>" ><span style="color:white; font-size:.9em;"  class="pull-right editar_client"> Editar</span></a>     
                  		</div>
                   













              </div>
        </div>    
	</div>
</div>



















            <div class="row">
                
                <div class="col-md-8">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                
                                <footer class="panel-footer">
                                    
                                    <ul class="nav nav-pills p-option">
                                        <li>
                                            <a style='color:white'  href="<?=$data_evento['url_social']?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a style='color:white' href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a style='color:white' href="<?=$data_evento['url_social_youtube']?>"><i class="fa fa-youtube-play"></i></a>
                                        </li>
                                        
                                    </ul>
                                    <a  href="<?=base_url('index.php/accesos/configuracionavanzada/0/' . $data_evento['idevento'])?>" ><span style="color:white; font-size:.9em;"  class="pull-right editar_client"> Editar</span></a>     
                                </footer>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <header class="panel-heading">
                                     <?=$days_to_event?>     
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                     	
                                     </span>
                                </header>
                                <div class="panel-body">

                                	<?=$accesos_evento?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                       
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states">
                                    <div class="summary pull-left">
                                        <h4>Total <span>Sales</span></h4>
                                        <span>Monthly Summary</span>
                                        <h3>$ 5,600</h3>
                                    </div>
                                    <div id="expense" class="chart-bar"><canvas height="35" width="68" style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states green-box">
                                    <div class="summary pull-left">
                                        <h4>Product <span>refund</span></h4>
                                        <span>Monthly Summary</span>
                                        <h3>160</h3>
                                    </div>
                                    <div id="pro-refund" class="chart-bar"><canvas height="35" width="68" style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states">
                                    <div class="summary pull-left">
                                        <h4>Total <span>Earning</span></h4>
                                        <span>Monthly Summary</span>
                                        <h3>$ 51,2600</h3>
                                    </div>
                                    <div id="expense2" class="chart-bar"><canvas height="35" width="68" style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



<div class="col-md-12"  style='background: #32AE94; padding:10px;'>
	<h1 style='color:white;'>Puntos de venta</h1>
	<?=$puntos_venta?>	
</div> 	
                       















<script type="text/javascript" src="<?=base_url('application/js/accesos/principal_cliente.js')?>"></script>
<style type="text/css">
.title_main{
	display: none;
}
</style>
<script type="text/javascript">
$(document).on("ready" , function(){

	$(".action_animate").click(function(){
		$('.action_animate').addClass('animated zoomIn');
	});
});
</script>