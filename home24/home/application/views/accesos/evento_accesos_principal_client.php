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























































<!---CARGAMOS MODALS -->
<?=$this->load->view("accesos/modal/view_user.php")?>
<!---TERMINAMOS DE CARGAR  MODALS -->
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal_cliente.js')?>"></script>
<style>
    .title_main{
        display: none;
    }
    .web_link{
        color: #F6D314 !important;
    }
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
        .section-header-title, .section-descripcion-evento-complete{
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

