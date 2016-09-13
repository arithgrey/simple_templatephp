<?=template_view_like_public(base_url('index.php/eventos/accesosalevento')."/". $data_evento['idevento'])?>
<ul class="nav nav-pills"> 
    <li class='active pull-left'>
      <span aria-expanded="true" href="#tab_accesos" role="tab" data-toggle="tab" class='tab_enid'>                     
        <strong>
            Accesos
        </strong> 
      </span>
    </li>        
    <li class='tab_puntos_venta pull-right'>
      <span class='tab_enid' aria-expanded="true" href="#tab_puntos_venta" role="tab" data-toggle="tab" >                              
        Puntos de venta     
      </span>
    </li>    
</ul>
<?=template_evento_admin($data_evento["nombre_evento"] , $data_evento["idevento"])?>
<div class='seccion-principal-admin'>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="tab_accesos">        
        <div class='contenido-accesos'>
            <div class='col-lg-8 col-md-8 col-sm-12 '>  
                <div class='row'>
                    <button id="nuevo-acceso-button" title="Registrar contacto" type="button" class="btn_nnuevo" data-toggle="modal" data-target="#nuevo-acceso-modal">                
                        + Nuevo acceso
                    </button>                        
                    <div>                                                     
                        <div class='place_list_accesos'>
                        </div>
                        <div class='list-accesos' id='list-accesos'>                    
                        </div>                           
                    </div>
                </div>     
            </div>   
            <!--Sección derecha inicia puntos de venta  -->
            <div class='col-lg-4 col-md-4  col-sm-12'>    
                                   
            </div>
        </div>    
    </div>
    <div class="tab-pane" id="tab_puntos_venta">
        <?=$this->load->view("puntosventa/admin");?>
    </div>    
  </div> 
</div>














<!--Sección derecha puntos de venta  termina -->
<input id='config2' class='config2' value="" type='hidden' >
<input id="flag_config" class='flag_config' value='0' type='hidden'>
<input id='qparam' class='qparam' value="<?=$q?>" type='hidden'> 
<input id='q2' class='q2' value="<?=$q2?>" type='hidden'> 
<input type='hidden' name='evento' id='evento' class='evento' value="<?=$data_evento['idevento']?>">
<input class='dinamic_acceso' id='dinamic_acceso' type='hidden'>
<input class='empresa' id="empresa" value="<?=$empresa;?>" type='hidden'>
<input class='enid_evento' id='enid_evento' value="<?=$data_evento["nombre_evento"]?>" type='hidden'> 
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/img.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/avanzado.js')?>"></script>
<?=$this->load->view("accesos/modal/config_avanzado");?>
<style type="text/css">
    .info-punto-venta{
        -moz-transition:all ease .8s; 
        -webkit-transition:all ease .8s ;
        filter: alpha(opacity=0); 
        left: 10%; 
        opacity: 0; 
        position: absolute; 
        transition:all ease .8s;
        zoom: 1;
    }
    .img-horizontal:hover .info-punto-venta{
        filter: alpha(opacity=80);
        opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
    }
    .delete_punto_venta_evento , .puntos_venta_contacto{
        cursor:pointer;
    }
    .title_main{
        display: none;
    }
    .alert-ok , .alert-fail{
        display: none;
    }
    .section-header-title{
        display: none;
    }
    .info-punto-venta:hover{
        cursor: pointer;
    }
    .text-descripcion-acceso{
        font-size: .8em;        
    }
    .nombre_acceso{
        background: rgb(32, 116, 155) none repeat scroll 0% 0%;
        color: white !important;
        margin-left: 10px;
        border-radius: 1px;
        padding: 1px;    
    }.delete-acceso:hover , .img_acceso:hover{
        cursor: pointer;
    }
    .menu_accesos{
        background: #046188;
        padding: 15px;
    }
    .seccion_accesos_registrado{
        background: #166781;
    }    
    .seccion_pv{                
        background: rgb(8, 65, 84) !important;
        padding: 10px;
    }
    .titulo_pv{
        color: white !important;
        font-size: 1.8em;
    }
    .contenido-accesos{
        margin-top: 10px;
    }
    #nuevo-acceso-button{
        margin-bottom: 10px;   
    }
    .delete-punto-venta-icon{
        cursor: pointer;
    }
    .seccion-date-input{
        width: 95%;
    }    
    .seccion-presentacion{
        margin-bottom: 15px;
    }
    
    .nota_acceso{
        font-size: .9em;        
    }
    .a1 , .a2 , .a3 , .a4{          
        font-size: .8em;        
    }
    .a1{
        color: black;
        font-weight: bold;
        font-weight: 1em !important;
    }
    .contenedor-resumen-accesos{
        background: #428bca;
        color: white;       
        padding: 10px; 
    }
    .nombre-acceso{
        font-weight: bold;
        font-size: 1.2;
    }
    .contenedor-descrip{
        background: white;
        color: black;
    }
    .contenedor-izq{
        height: 100%;
    }
    .calendar-1, .text-inicio , 
    .calendar-2 , .text-termino{
        display: inline-block;
    }
    /**/
    @media only screen and (max-width: 991px) {    
        .titulo_pv{
            color: white !important;
            font-size: 1.5em;
        }
        .text-punto-venta{
            font-size: .9em;
        }
        .seccion-date-input{
            width: 50%;
        }
    }
</style>