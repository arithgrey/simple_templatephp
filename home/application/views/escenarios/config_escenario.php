<div class='separate-enid'>
</div>
<div>
    <div class='place_slider'>
    </div>
    <div class='slider-principal-escenario' id='slider-principal-escenario'>                                
    </div>    
    <span title='Cargar imagenes del escenario' id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-escenario-principal" class='img-button-more-imgs'>
        + Imagen
    </span>                        
    <div class='separate-enid'>
    </div>
</div>
<div class='response_img_portada_escenario' id='response_img_portada_escenario'>
</div>        

<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12'>                   
            <div >
                <div class='config_general'>
                    <span  class='experiencia_title'>
                        Del escenario
                    </span>       
                    <div  class="btn-group-vertical pull-right " role="group" aria-label="Vertical button group">    
                        <span class='place_tipo'>
                        </span>
                        <div class="btn-group btn-sm " role="group">
                            <button id="btnGroupVerticalDrop1" type="button" class="btn_config_tipo btn btn-default dropdown-toggle button-tipo-escenario " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">            
                                <?=get_start($data_escenario["tipoescenario"] , "Principal")?>
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
            </div>
          
        
       
       




        <section>
            <div class="container">             
                <h1>
                    La historia la haces tu
                </h1>
                <div class='place_descripcion'>
                </div>
                <div class='seccion-descripcion-escenario'>
                    <span title='Actualiza la experiencia que vivirá el publico en el escenario' class='descripcion-escenario-text'>                                                    
                        <?=show_text_input($data_escenario["descripcion"] , 5 , "+ La experiencia que se vivirá" )?>
                    </span>
                    <div class='section-descripcion-escenario-in'>
                        <textarea id="in-descripcion-escenario" name="descripcion_escenario"  class="form-control" placeholer="Message">
                            <?=$data_escenario["descripcion"]?>
                        </textarea>             
                    </div>            
                </div>            
                <div class='separate-enid'>
                </div>
                <button class='btn  btn-template' id='button-template' data-toggle="modal" data-target="#modal-platilla-escenarios"  >
                    <i class='fa fa-file-text-o'>
                    </i>
                    Usar plantilla
                </button>


                <div class='pull-right'>
                    <div class='place_fecha_2'>
                    </div>
                    <a  class='f_escenario' data-toggle="modal" data-target="#modal-date-escenario" title='Fecha para éste escenario'>        
                        <div id='fecha-presentacion'>
                            <i class="fa fa-calendar">
                            </i>
                            Fecha de presentación  
                            <?=fechas_enid_format($data_escenario["fecha_presentacion_inicio"] , $data_escenario["fecha_presentacion_termino"] )?>        
                        </div>    
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>



<style type="text/css">
.btn-img{
    color: #00BCD4;
}
.img-button-more-imgs{
    font-size: 1.4em;   
    font-weight: bold; 
}
</style>