<?=$this->load->view('escenarios/otros_escenarios')?>
<?=template_view_like_public(base_url('index.php/escenario/inevento')."/".$data_escenario['idescenario'] . "/".$data_escenario["idevento"] )?>
<div>          
  <ul class="nav nav-pills">    
    <li class='artistas-btn active tab_escenario tab_enid pull-left'>
      <span class='' href="#pill-1" role="tab" data-toggle="tab" >
        <i class=" icon-up-1">
        </i> 
        <strong>
            Escenario
        </strong> - <?=$data_escenario["nombre"]?>
      </span>
    </li>

    
        <li class='tab_enid pull-right link_to_view'>
            |<span class='link_to_view_seccion'>        
            Ver como el público 
            <i class='fa fa-arrow-circle-o-right'> 
            </i>
            </span>
        </li>              
    
    


    <li class='artistas-btn tab_artistas tab_enid pull-right'>
      <span  href="#pill-3" role="tab" data-toggle="tab" >
        <i class=" icon-up-1">
        </i> 
        Artistas 
      </span>
    </li>        

    
      




  </ul>
</div>
<?=template_evento_admin($evento["nombre_evento"] , $evento["idevento"])?>

<div class="tab-content">
    <div class="tab-pane tab_escenario active" id="pill-1">
        <?=$this->load->view("escenarios/config_escenario");?>
    </div>
    <div class="tab-pane tab_artistas" id="pill-3">       
        <section>        
            <div class='response_img_artista' id='response_img_artista'>
            </div>                                      
            <div class='place_config_artistas'>
            </div>
            <div class='place_artistas'>
            </div>
            <div class='artistas-escenario-section' id='artistas-escenario-section'>   
            </div>        
        </section>
    </div>    
</div>  

<div class='seccion-links-extra'>          
  <ul class="nav nav-pills">    
    <li class='tab_accesos tab_enid pull-right'>
      <span>             
        <a class='text_link_accesos_enid' href="<?=base_url('index.php/eventos/accesosalevento'). "/" . $evento["idevento"]?> " >
          |Accesos 
        </a>                
      </span>
    </li> 
    <li class='tab_accesos tab_enid pull-right'>
      <span>             
        <a class='text_link_accesos_enid' href="<?=base_url('index.php/eventos/diaevento/'). "/" . $evento["idevento"]?>" >
          Servicios 
        </a>                
      </span>
    </li>
  </ul>  
</div>  

<!--Cargamos los modal de configuración ***********-->
<?=$this->load->view("escenarios/modal/escenario_avanzado")?>
<!--Terminamos de cargar los modal de configuración ***********-->
<input value="<?=$data_escenario["nombre"];?>" class='nombre_escenario' type='hidden'>
<input type='hidden' name='evento' id='evento' class='evento' value="<?=$evento['idevento'];?>"> 
<input type='hidden' name='nombre_evento' id='nombre_evento' value="<?=$evento['nombre_evento']?>"> 
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$data_escenario['idescenario'];?>">
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>
<input type='hidden' name='q' class='qparam' value="<?=$q?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />





<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>



<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/img.js')?>"></script>
<input type='hidden' value="<?=$evento['nombre_evento']?>" class='enid_evento' id='enid_evento'>
<input type='hidden' value="<?=$data_escenario["nombre"];?>" class='enid_escenario' id='enid_escenario'> 






<style type="text/css">
    .nombre-escenario-text:hover, .descripcion-escenario-text:hover {
        cursor: pointer;    
    }.section-descripcion-escenario-in, .section-nombre-evento-in {
        display: none;
    }.section-fecha-type{
        background: #062735;
    }.section-input{
        display: none;
    }.title_main{
        display: none;
    }.artistas-inputs:hover{
        cursor: pointer;
    }.img-artista-evento:hover{
        cursor: pointer;
    }
</style>
<!--Todo lo que es nuevo -->
<style type="text/css">
    .tipos-escenarios , .fechas-escenario-presentacion{
        display: inline-block;
    }.f_escenario{
        color: white;
        text-decoration: none;
    }
    .f_escenario:hover{
        color: white;
        text-decoration: none;
    }
    .contenedor_slider_imgs{
    background:  rgb(54, 70, 84);   
    }.f_escenario:hover{
        cursor: pointer;
        text-decoration: none;
    }.img-button-more-imgs{
        margin-left: 1%;
    }.seccion-descripcion-escenario{
        
        font-size: .9em;
        padding: 10px;
    }.experiencia_title{
        font-size: 2em;
        font-weight: bold;
    }#img-button-more-imgs:hover{
        cursor: pointer;
    }
    .activa_focus{
        background: red;
    }
</style>




























<style type="text/css">
    .seccion-portada-escenario{
        background: rgb(4, 97, 136);
    }    
    .hidden_desc{
        display: none;
    }   
    
    .text_estado_artista{
        background: #2a323f;
        padding: 1px 10px;
        color: white;
    }
    .seccion-btn-registro{
        margin-top: 10px;
    }
    .seccion-links-extra{
        display: none;
    }
    /**/
    




    /*Todo lo que pertenece a medios*/
      @media only screen and (max-width: 991px) {    
        .config-general-escenario{
            margin-top: 10px;
        }
        .btn-registro-tipo{
            margin-top: 10px;   
        }
        .btn-nota-registro{
            margin-top: 10px;
        }
        .seccion-btn-confim{
            margin-top: 10px;   
        }
        .seccion-links-extra{
            display: block;
        }
        .link_to_view_seccion{
            display: none;
        }
  }
</style>



