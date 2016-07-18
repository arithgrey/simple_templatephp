<div>     
    <div class='place_slider'>
    </div>
    <div class='slider-principal-escenario' id='slider-principal-escenario'>                                
    </div>
</div>    
<strong title='Cargar imagenes del escenario' id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-escenario-principal" class='img-button-more-imgs' >
    <i class="fa fa-plus-circle fa-3x">
    </i>                                    
</strong>                        
<div class='response_img_portada_escenario' id='response_img_portada_escenario'>
</div>        
<a data-toggle="modal" data-target="#modal-date-escenario" title='Fecha para éste escenario'>
    <div>                            
        <i class="fa fa-calendar">
        </i>
        Fecha de presentación  
        <div id='fecha-presentacion'>
            <em>
            <?=$data_escenario["fecha_presentacion_inicio"] 
            . " - ". 
            $data_escenario["fecha_presentacion_termino"]; ?>
            </em>
        </div>
    </div>
</a>











<div>        
    <div>
      <div>
        
        

    <div class="panel">
        <div class="panel-body"> 
        <div class='pull-left col-lg-6  col-md-6 col-sm-6'>            
        </div>               

    <div class='col-lg-6  col-md-6 col-sm-6'>        
        <div class="btn-group-vertical pull-right" role="group" aria-label="Vertical button group">    
            <span class='place_tipo'>
            </span>
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


    <div class="jumbotron" >
        <span title='Actualiza la experiencia que vivirá el publico en el escenario' class='descripcion-escenario-text'>                                    
            <?=show_text_input($descripcion_escenario , 30 , "Registra la experiencia  que se vivirá" )?>
        </span>
        <div class='section-descripcion-escenario-in'>
            <label>
                        La experiencia
            </label>
            <textarea id="in-descripcion-escenario" name="descripcion_escenario"  class="form-control" placeholer="Message">
                <?=$descripcion_escenario;?> 
            </textarea>             
        </div>            
    </div>    
    <div class='place_descripcion'>
    </div>
    <div class="panel">
      <div class="panel-body">
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
