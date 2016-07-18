<div class='row'>			                                                            
    <h1 class='text-center'>
        <a href="<?=base_url('index.php/eventos/visualizar/'.$data_evento['idevento'])?>">
            <?=$dias_restantes_evento;?> , 
            <?=$data_evento["nombre_evento"]?>  
		</a>
    </h1>
    <div class='text-center'>
        <?=$data_evento["edicion"]?>
    </div>
    
    <div class='container'>
        <div class='row'>
    	   <?=$resumen_event?>
        </div>
        <div>
           <a style="font-size:.8em; pull-left">
               <i class="fa fa-calendar-o">
                </i>  
                <?=$data_evento["fecha_inicio"] ?>  
                            al   
                <?=$data_evento["fecha_termino"]?>
                <i class="fa fa-map-marker">
                </i> 
                <?=$data_evento["ubicacion"]?>  
            </a>                                                                           
           <a style="font-size:.8em;"  href="<?=base_url('index.php/eventos/nuevo/' . $data_evento['idevento'])?>" >
                <span class="pull-right editar_client"> 
                    Editar
                </span>
           </a>     
        </div>
        
    </div>		                                                                      
</div>




<!--******************************************************************************************-->
<div class="row">  
    <div class='container'>



        <!--***************************LA EXPERIENCIA EN EL EVENTO ***************************************************-->
            <div class='row'>        
                <!--Información del evento-->
                <div class="panel text-center" >
                    <div class="panel-body">
                        <div class="profile-desk">
                            <h1>
                               La experiencia
                            </h1>                
                            <hr>            
                            <div class='section-descripcion-evento'>                                    
                                <?= substr ( $data_evento["descripcion_evento"] , 1   , 270 );?>                                                                         
                                <center>
                                    
                                    
                                    <a  href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$data_evento['idempresa']?>" style='font-size:.8em;'>
                                        Conoce nuestra historia
                                    </a>

                                    <br>
                                    <button class='btn btn-default btn_save' id='more-info-event'>
                                        + Info. <i class="fa fa-chevron-down"></i> 
                                    </button>
                                </center>

                            </div>

                            <div class='section-descripcion-evento-complete'>                                    
                                <?=$data_evento["descripcion_evento"];?>
                                

                                <center>                                    
                                   
                                    <a  href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$data_evento['idempresa']?>" style='font-size:.8em;'>
                                        Conoce nuestra historia
                                    </a>

                                    <br>
                                    <button class='btn btn-default btn_save' id='lessinfo_event'>
                                       - Info. <i class="fa fa-chevron-up"></i>
                                    </button>
                                </center>
                            </div>


                        </div>
                    </div>
                </div>
                <!---->
            </div>    
            <!--***************************TERMINA  LA EXPERIENCIA EN EL EVENTO ***************************************************-->

        <div class="col-md-12 col-lg-12 col-sm-12">                                                                        
            <div class="row">
                <div>                            
                    <div class="panel" >
                        <div class="panel-body">
                            <div class="profile-desk">
                                <h1>
                                    <?=$dias_restantes_evento;?>
                                </h1>                
                                <a  href="#puntos-venta" style='font-size:.8em;' class='pull-right'>
                                    Dónde adquirir mis accesos
                                </a>                                            
                                <hr>            
                                <?=$accesos_evento?>                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--************************TERMINA SECTION 8-->


        <!--*******************************INICIA  PUNTOS DE VENTA ************************ -->
        <div>            
            <div class="col-md-12 col-lg-12 col-sm-12 ">            
                <div class='row'>                        
                    <div class="panel" >
                        <div class="panel-body">
                            <div class="profile-desk">
                                <h1 id="puntos-venta" >
                                    Puntos de venta
                                </h1>                
                                <hr>            
                                <?=$this->load->view("accesos/info_user_puntos_venta")?>                                                                
                            </div>
                        </div>
                    </div>                
                </div>                
            </div>        
        </div>
        <!--*******************************TERMIA PUNTOS DE VENTA ************************ -->       
    </div>                   
</div><!--**********************TERMINA ROW ***********************************************-->















































