



<div class='row'>    
    <!--Sección izquierda inicia -->       
    <div class="col-lg-9 col-lg-9 col-sm-12" id='section_main_left'>                        
            <div class="panel">
                <a class='dinamic_activity_section_left pull-right' style='display:none;' id='dinamic_activity_section_left' >
                    <i class='fa fa-angle-double-left'>
                    </i>   
                    <i class='fa fa-angle-double-left'>
                    </i>   
                </a> 
                <a class='dinamic_activity_section_right pull-right'  id='dinamic_activity_section_right' >
                    <i class='fa fa-angle-double-right'>
                    </i>   
                    <i class='fa fa-angle-double-right'>
                    </i>   
                </a>
                <header class="panel-heading blue-col-enid" >                 
                    Últimos eventos registrados 
                </header>                                

                <div class='row'>
                    <div class="panel-body panel-body-enid" >                                                        
                        <button class='btn_nnuevo btn_nuevo_evento' 
                        title='Registra un nuevo evento para el público' data-toggle="modal" data-target="#modal-nuevo-evento">
                            + Nuevo Evento 
                            <i class='fa fa-headphones'>
                            </i>
                        </button>
                        <hr>
                        <div class='row'>
                            <div class='ultimos_eventos' id='ultimos_eventos'>
                            </div>               
                        </div>            
                    </div>
                </div>

            </div>                                
        
    </div>                
    <!--Sección izquierda termina  -->      
    <!--Inicia la sección--> 
    <div class="col-lg-3 col-lg-3 col-sm-12" id='section_main_right'>      




        <div class="panel">
            
            <header class="panel-heading blue-col-enid" >                 
                Últimos acontecimientos 
            </header>                                
            

            <div>
                <div class="panel-body panel-body-enid" >                                                        
                    
                    <div class='row'>
                        <div class="panel-body scroll-vertical-enid seccion_activity_enid" >                
                            <ul class="activity-list"> 
                                <div class='last-activity-enid'>
                                </div>
                            </ul>                
                        </div>

                    </div>            
                </div>
            </div>

        </div>                                
        



        <!--
        <div class="section_activity_eventos">
            <div>
                <div>
                    <div class='blue-col-enid logs-info'>
                        <h1 class='title-acontecimientos'>
                            Últimos acontecimientos 
                        </h1>                                        
                    </div>
                    
                    <hr>
                    
                    <div class="panel-body scroll-vertical-enid seccion_activity_enid" >                
                        <ul class="activity-list"> 
                            <div class='last-activity-enid'>
                            </div>
                        </ul>                
                    </div>
                    
                </div>
            </div>
        </div>-->
        <a class="twitter-timeline" href="https://twitter.com/enidservice">
            Enid service
        </a>
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div> 
</div>












<!--Termina la sección-->            

        

<!--Incluimos los modals del panel principal -->
<?=$this->load->view("principal/modal/principal_admin");?>
<!--Terminamos de Incluir  los modals del panel principal -->
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<!--pickers initialization-->
<script type="text/javascript" src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/evento/global.js')?>"></script>    
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/principal/actividad.js')?>" ></script>


<style type="text/css">
    #dinamic-field , #success-alert{
        display: none;
    }
    #scroll{
        border:1px solid;            
        overflow-y:scroll;
        overflow-x:hidden;
    }
    .dinamic_activity_section_left , .dinamic_activity_section_right{
        background: #E31F56;
        color: white;
        padding: 7px;

    }
    .dinamic_activity_section_left:hover , .dinamic_activity_section_right:hover{
        background: #01090F;
        cursor:pointer;
        color: white;
    }
    .blog-img-sm-sup{
        
        width: 100%;
        padding-bottom: 0px;
    }
    .eslogan-text{
        font-size: .8em;
    }
    .resum_evento{
        font-size: .9em;
    }
    .section-header-title{
        display: none;
    }
    .seccion_activity_enid{
        height: 350px !important;
    }.resum_evento:hover{
        cursor: pointer;
        text-decoration: none;
    }
    .calendarios-evento{
        margin-top: 11%;
    }
    .panel-resumen-evento{
        background: #1a3441;
        padding: 10px;        
    }
    .msj-resumen{
        font-size: .8em;
        color: white;
    }.menos_info_puntos_venta , .menos_info_escenario, .menos_info_escenario , .menos_info_artistas{
        background: white;
        color: black;
        padding: 10px;
    }
    
    /*.nuevo-elemento{
        background: whitesmoke !important;
        color: #242829 !important;
    }
    */







    .nombre_evento_a{
        text-decoration: none;
        color: white  !important;

    }
    .nombre_evento_a:hover{
        text-decoration: none;
        color: white  !important;
        
    }
    .nombre_evento_text{
        
        background: rgb(4, 97, 136);
        padding: 5px;
    }
    .a_resum_event{
        color: #223c48;
        font-weight: bold;
        font-size: .9em;    
    }
    .resum_evento{
        color: #046188;
        font-size: .9em;
        font-weight: bold;
    }
    .text_resum{
        font-size: .9em;
    }
    .text-title-resum{
        color: white;
        font-size: 2em;
        font-weight: bold;
    }
    .item{color:#48453d; margin-top:30px; overflow:hidden;}     
    .tags a{background-color:white; padding:10px; color:#fff; display:inline-block; font-size:11px; text-transform:uppercase; line-height:11px; border-radius:2px; margin-bottom:5px; margin-right:2px; text-decoration:none; color: black}
    .tags a:hover{background-color:white}
    .tags_e:hover{
        cursor: pointer;
    }    
    .logs-info{

    }
    .title-acontecimientos{
        color: white;
    }
    .calendar-1, .text-inicio , 
    .calendar-2 , .text-termino{
        display: inline-block;
    }
    
    
    

    /**/
    @media only screen and (max-width: 991px) {
        .dinamic_activity_section_left,  #dinamic_activity_section_right{
            display: none;
        }    

    }

    

</style>
<input type='hidden' value='<?=$id_empresa?>' class='empresa'>  
