<div class="col-md-12 col-lg-12 col-sm-12">
    <a href="<?=base_url('index.php/inicio/eventos')?>">
        <button class='btn btn-default '>
            Ir a la sección de eventos
        </button>
    </a>

    <a href="<?=base_url('index.php/templates/eventos')?>">
        <button class='btn btn-default pull-right'>
            Cargar plantillas de eventos
        </button>
    </a>

    
</div>
<hr>

<div class='alert-ok' id='alert-plantilla-ok'>
    <em>
        Plantilla registrada correctamente 
    </em>
</div>
<div class='alert-fail' id='alert-pllantilla-fail'>
    <em>
        Error al registrar plantilla, reportar al administrador 
    </em>
</div>
<div class="col-md-12 col-lg-12 col-sm-12">
    <section class="panel">
        <header class="panel-heading blue-col-enid">
            <i class="fa fa-list">
            </i>
            Nueva plantilla, descripción del escenario             
        </header>
        <div class="blue-col-enid-complement panel-body">                            
            <div style='padding:10px;'>
                <form action="<?=base_url('index.php/api/templ/templates_content/format/json/')?>" class="form-horizontal tmp-escenario" id="tmp-escenario">
                    <div class="form-group">                                                                                                    
                        <div class="input-group">                                                                                                  
                            <input type="hidden" name="type" value="5">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1">
                                
                                Titulo del contenido 
                            </span>                                        
                            <input type="text"  id="tnuevo_contenido_name" name="nuevo_contenido_name" class="form-control" placeholder="" aria-describedby="sizing-addon1" required>                                          
                        </div>
                        <textarea rows="6" class="form-control" name="contenido_text" id="contenido_text" required>
                        </textarea>                                                
                        <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                
                        Registrar plantilla
                        </button>                                               
                    </div>
                </form>    
            </div>
            <div class='row'>
                <div class='col-lg-12 col-md-12 col-sm-12'>
                    <div class='list_plantilla_escenario' id='list_plantilla_escenario'></div>
                </div>
            </div>
        </div>
    </section>    
</div>


<script type="text/javascript" src="<?=base_url('application/js/plantillas/plantila_escenario_principal.js')?>"></script>