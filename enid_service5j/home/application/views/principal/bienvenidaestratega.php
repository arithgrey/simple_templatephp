


<!--Sección izquierda inicia -->       
<div class="col-md-8 " id='section_main_left'>                        
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
        <div class="panel-body panel-body-enid" >                                                        
            <button class='btn btn btn_nnuevo' title='Registra un nuevo evento para el público' data-toggle="modal" data-target="#modal-nuevo-evento">
                    +  Nuevo Evento 
                <i class='fa fa-headphones'>
                </i>
            </button>
            <hr>            
            <div class='ultimos_eventos' id='ultimos_eventos'>
            </div>               
        </div>
    </div>                                
</div>                
<!--Sección izquierda termina  -->      
<!--Inicia la sección--> 
<div class="col-md-4" id='section_main_right'>      
    <div class="panel section_activity_eventos">
        <div class="panel-body">
            <div class="profile-desk">
                <h1>
                    Últimos acontecimientos 
                </h1>                
                <hr>
                <!-- ultimas actividades -->
                <div class="panel-body scroll-vertical-enid" style="height: 350px !important; ">                
                    <ul class="activity-list">                                                                                                                       
                        <div class='last-activity-enid'></div>
                    </ul>                
                </div>
                <!--Ultimas Actividades -->
            </div>
        </div>
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
<script type="text/javascript" src="<?=base_url('application/js/estratega/evento/principal.js')?>"></script>
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
</style>

