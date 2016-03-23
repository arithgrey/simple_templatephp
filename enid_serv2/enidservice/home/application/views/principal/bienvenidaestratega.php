<!--Sección izquierda inicia -->       
<div class="col-md-8">                        
        <div class="panel">
            <header class="panel-heading blue-col-enid" >                 
                <?=$pagination_event;?>                
            </header>                                
            <div class="panel-body panel-body-enid" >                                                        
                <button class='btn btn btn_nnuevo' title='Registra un nuevo evento para el público' data-toggle="modal" data-target="#modal-nuevo-evento">
                    +  Nuevo Evento 
                    <i class='fa fa-headphones'>
                    </i>
                </button>
                <hr>

                <!--last 5 -->
                <?=$ultimos_eventos;?>
                <!--Termina-->
            </div>
        </div>                                
</div>                
<!--Sección izquierda termina  -->      

<!--Inicia la sección  --> 
<div class="col-md-4">  
    <div>
        
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="profile-desk">
                <h1>
                    Últimos acontecimientos 
                </h1>                
                <hr>
                <!-- ultimas actividades -->
                <div class="panel-body scroll-vertical-enid" style="height: 400px !important; ">                
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
</style>





