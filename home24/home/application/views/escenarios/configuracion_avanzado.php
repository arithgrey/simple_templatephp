<div class='col-lg-12 col-md-12 col-sm-12'>
    <div class='resumen-artistas-escenario-event'> 
        <?=$resumen_artistas;?>
    </div>
</div>

                
<!--*******Inicia panel -->
<!--*******seccion izquierda ************************* -->
<div class='col-lg-9 col-md-9 col-sm-9'>
<section class="panel panel-primary">
    <header class="blue-col-enid panel-heading custom-tab">
        <ul class="nav nav-tabs blue-col-enid">     
            <li class="">
                <a href="<?=base_url('index.php/eventos/nuevo/')?>/<?=$data_escenario['idevento']?>">
                <i class="fa fa-home"></i> 
                 Evento <?=$nombre_evento?>
                </a>
            </li>   


            <li class="active">
                <a data-toggle="tab" href="#panel-asignar-artistas">
                <i class="fa fa-headphones">
                </i>
                 Asigna artistas a la escena 
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#panel-img-escena">
                <i class="fa fa-camera"></i> 
                 Carga imagenes al escenario 
                </a>
            </li>   


            <li class="ver-escenario" title='Ver el escenario como lo hace el público'> 
                <a data-toggle="tab" href="">
                <i class=""></i> 
                 Ver como el público
                </a>
            </li>   



        </ul>
    </header>
    <div class="panel-body" >
        <div class="tab-content">
            <!--***************************INICIA PANEL CONGIG GENRAL -->
            <div id="panel-asignar-artistas" class="tab-pane active">                                                
             
                <div class='row'>


                    <!--Alerts  -->
                    <div class='panel  alert-ok-sm' >
                        <em>
                            Datos actualizados
                        </em>
                    </div>
                    <div class='panel alert-fail-sm'>
                        <em>
                            Falla al actualizar información,
                            reporte al administrador 
                        </em>
                    </div> 
                    <!--Terminan alerts -->

                    <div class="jumbotron" style='background:#0CB2BF; color:white;'>
                        <div  class='row'>

                            <section>
                                
                                <h3  title='Actualizar nombre del escenario' class='nombre-escenario-text' style='color:white;'>
                                    <?=$data_escenario["nombre"];?>
                                </h3>       
                                <div class="form-group">
                                    <div class='section-nombre-evento-in'>
                                        <div class='input-group'>                    
                                            <span class="input-group-addon">
                                            Nombre del escenario 
                                            </span>
                                            <input  class="form-control in-nombre-escenario" id='in-nombre-escenario' value="<?=$data_escenario["nombre"];?>" name='nuevo_nombre' style="width: 100%" type="text">                      
                                            <input type='hidden' name='action' value="carga-imgenes-escenario">                    
                                        </div>
                                    </div>
                                </div>  
                            </section>   
                        </div>
                        <h3>
                            <span class="label label-default">
                                La experiencia 
                            </span>
                        </h3>
                        <div class='well' style='color:black;'>
                            <p  title='Actializar información' class='descripcion-escenario-text' style='font-size:.9em !important;'>                        
                                <?=$descripcion_escenario;?> 
                            </p>

                            <button class='btn  btn-template' id='button-template' data-toggle="modal" data-target="#modal-platilla-escenarios"  >
                                <i class='fa fa-file-text-o'></i>
                                Usar plantilla
                            </button>
                        </div>
                        <div class='section-descripcion-escenario-in'>
                            <div class='input-group'> 
                                <span class="input-group-addon">
                                    Nombre del escenario 
                                </span>
                                <textarea id="in-descripcion-escenario"  class='form-group col-lg-12 ' name="descripcion_escenario" rows="7" >
                                    <?=$descripcion_escenario;?> 
                                </textarea>         
                            </div>
                        </div>


                    <!--Alertas tipo escenario -->   
                     <div class="alert-ok white-e" id="alert-ok-tipo-escenario" >
                        <em>
                            Datos del escenario actualizado
                        </em>
                    </div>
                    <div class="alert-fail-sm" id="alert-fail-tipo-escenario" >
                        <em>
                            Falla al actualizar los datos del escenario 
                        </em>
                    </div>

                    <!--Termina alertas tipo de escenario  -->    
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">    
                      <div class="btn-group btn-lg" role="group">
                        <button id="btnGroupVerticalDrop1" type="button" 
                        class="btn btn-default dropdown-toggle button-tipo-escenario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?=$tipo_escenario_start; ?>
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                            <li class='tipo-escenario' id='General'>
                                <a id='General'>General</a>
                            </li>
                            <li class='tipo-escenario' id='Principal' >
                                <a id='Principal'>
                                    <i class='fa fa-star'></i> Principal
                                </a> 
                            </li>
                            <li class='tipo-escenario' id='Especial'>
                                <a id='Especial' >Especial</a>
                            </li>
                        </ul>
                      </div>     
                    </div>


                     <a href="" data-toggle="modal" data-target="#modal-date-escenario" title='Fecha para éste escenario' style='color:white;'>
                        <div class='pull-right'>                            
                            <i class="fa fa-calendar"></i>
                            Presentación 
                            <div id='fecha-presentacion'>
                                <em>
                                    <?=$data_escenario["fecha_presentacion_inicio"] . " - ". $data_escenario["fecha_presentacion_termino"]; ?>
                                </em>
                            </div>
                        </div>
                    </a>


                    </div>
                </div>
                
            <!--*********************************RESUMEN  ************************************-->
                
                
            <!--*********************************TERMINA  RESUMEN  ************************************-->
                <div class='row'>
                    <div class='artistas-escenario-section' id='artistas-escenario-section'>
                                        <?=$artistas;?>     
                    </div>  
                </div>
            </div>  
            <!--***************************TERMINA CONFIG GENERAL ************** -->




        <!--************Bloque de imagenes  ******************** -->    
            <div id="panel-img-escena" class="tab-pane">                               
                <!--Carga de imagenes  inicia  -->
                 <div class='section-right'>
                   
                    <strong title='Cargar imagenes del escenario' id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-escenario-principal"  >
                        <i class="fa fa-plus-circle fa-3x">
                        </i>                                    
                    </strong>                  
                </div>   
                <center>
                    <em>
                        Imagenes cargadas al escenario 
                    </em>
                </center>

                <div class="panel-body fixed-panel" >                          
                    <div class='slider-principal-escenario' id='slider-principal-escenario'>
                        <?=$slider_principal_escenario;?>                                
                    </div>
                </div>             
                <!--Carga de imagenes finaliza  ************************ -->
            </div>
            <!--************Bloque de imagenes termina  ******************** -->    
        </div>
    </div>
</section>
</div>
<!--*******Termina seccion izquierda ************************* -->

<!--*******Seccion derecha  ************************* -->
<div class='col-lg-3 col-md-3 col-sm-3' style='background:#032B3B; color:white;'>    
        <!--Bloque go to evento -->
        <div class='panel-heading text-center' style='color:white;' >
        </div>
        <!--Bloque go to evento termina -->
        <div class="state-overview">
            <?=$otros_escenarios?>        
        </div>       
</div>
<!--*******Termina sección derecha  ************************* -->

<!--*******Terminan los paneles -->

<!--Cargamos los modal de configuración ***********-->
    <?=$this->load->view("escenarios/modal/escenario_avanzado")?>
<!--Terminamos de cargar los modal de configuración ***********-->


<input type='hidden' name='evento' id='evento' class='evento' value="<?=$data_escenario['idevento'];?>"> 
<input type='hidden' name='nombre_evento' id='nombre_evento' value="<?=$nombre_evento?>"> 
<input type='hidden' name='base_path_img' id="base_path_img" class='base_path_img' value='<?=$base_path_img;?>'>
<input type='hidden' name='base_path' id='base_path' class='base_path' value='<?=$base_path;?>'>
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$id_escenario;?>">


<!---->
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>
<input type='hidden' name='base_path_img_artista' id="base_path_img_artista" class='base_path_img_artista' value='<?=$base_path_img_artista;?>'>
<input type='hidden' name='base_path_artista' id='base_path_artista' class='base_path_artista' value='<?=$base_path_artista;?>'>
<!---->
<link href="<?=base_url('application/views/principal/dropzone.css')?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<!--pickers css-->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->
<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>

<script type="text/javascript" src="<?=base_url('application/js/escenarios/img.js')?>"></script>

<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>

<script type="text/javascript">     
    
    $('#artista').keyup(function (e){ 

        Stringentrante = $(this).val();         
        
        buscarartista(Stringentrante);
    });

    function buscarartista(Stringentrante){        
        SC.initialize({
            lient_id: '1ce2bf4dcd83ee01f111219905b4f943'
        });
         
        SC.get('/tracks', { q: Stringentrante }, function(tracks) {                        
                newcontenidodatalist ="";                
                   for(var x in tracks ) {
                    /*Genero del artista*/
                    genre =  tracks[x]["genre"];
                    username = tracks[x]["user"].username;
                    avatar_url =  tracks[x]["user"].avatar_url;
                    uri =   tracks[x]["user"].uri;
                    id = tracks[x]["id"].id;
                        newcontenidodatalist += "<option value='"+ username  +"'>" ;                        
                   }                   
                   document.getElementById('dinamic-artistas').innerHTML= newcontenidodatalist;                
        });    
    }
</script>    

<style type="text/css">
.nombre-escenario-text:hover, .descripcion-escenario-text:hover {
    cursor: pointer;
    padding: 2px;
}
.section-descripcion-escenario-in, .section-nombre-evento-in {
    display: none;
}
#img-button-more-imgs:hover{
    cursor: pointer;
    font-size: 1.1em;
}
.section-fecha-type{
    background: #062735;
}
.section-input{
    display: none;
}
.nombre-escenario-text{
    color:  black;
}
.title_main{
    display: none;
}
.alert-ok-sm , .alert-fail-sm , .alert-ok , .alert-fail {
    display: none;
}.artistas-inputs:hover{
    cursor: pointer;
}

</style>

<?=ini_set('display_errors', '1');?>


