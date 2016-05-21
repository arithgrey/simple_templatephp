











<div class=''>    
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

    <div class="panel">
      <div class="panel-body">
        <div>     
            <div class="animationload loading_portada_escenario" id='loading_portada_escenario' >
                <div class="osahanloading">
                </div>
            </div>
                               
            <div class='slider-principal-escenario' id='slider-principal-escenario'>                
            </div>
        </div>    
        <strong title='Cargar imagenes del escenario' id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-escenario-principal"  >
            <i class="fa fa-plus-circle fa-3x">
            </i>                                    
        </strong>                      
        <div class='response_img_portada_escenario' id='response_img_portada_escenario'>
        </div>
        <div class='panel  alert-ok-sm' >
            <em>
            Datos actualizados
            </em>
        </div>
        <div class='panel alert-fail-sm'>
            <em>
            Falla al actualizar información, reporte al administrador 
            </em>
        </div> 

        <hr>

    <div class="panel">
        <div class="panel-body"> 
        <div class='pull-left col-lg-6  col-md-6 col-sm-6'>
            <a href="" data-toggle="modal" data-target="#modal-date-escenario" title='Fecha para éste escenario'>
                <div >                            
                    <i class="fa fa-calendar">
                    </i>
                    Presentación 
                    <div id='fecha-presentacion'>
                        <em>
                        <?=$data_escenario["fecha_presentacion_inicio"] 
                        . " - ". 
                        $data_escenario["fecha_presentacion_termino"]; ?>
                        </em>
                    </div>
                </div>
            </a>
        </div>               

    <div class='col-lg-6  col-md-6 col-sm-6'>
        
    <div class="btn-group-vertical pull-right" role="group" aria-label="Vertical button group">    
        <div class="btn-group btn-sm" role="group">
        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle button-tipo-escenario " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=$tipo_escenario_start; ?>
            <span class="caret">
            </span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
            <li class='tipo-escenario' id='General'>
                <a id='General'>
                    General
                </a>
            </li>
            <li class='tipo-escenario' id='Principal' >
                <a id='Principal'>
                    <i class='fa fa-star'>
                    </i> 
                    Principal
                </a> 
            </li>
            <li class='tipo-escenario' id='Especial'>
                <a id='Especial' >
                    Especial
                </a>
            </li>
        </ul>
        </div>     
    </div>
    </div>
    <hr> 


        </div>
    </div>    
        
   


    <div class="panel">
      <div class="panel-body">

        <p title='Actializar información' class='descripcion-escenario-text' style='font-size:.9em !important;'>                        
            <?=$descripcion_escenario;?> 
        </p>
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

        <button class='btn  btn-template' id='button-template' data-toggle="modal" data-target="#modal-platilla-escenarios"  >
            <i class='fa fa-file-text-o'>
            </i>
            Usar plantilla
        </button>
        </div>
    </div>






      </div> 
    </div>  
    
</div>                    
<input value="<?=$data_escenario["nombre"];?>" class='nombre_escenario' type='hidden'>
