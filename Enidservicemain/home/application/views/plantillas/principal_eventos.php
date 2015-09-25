<script type="text/javascript" src="<?=base_url('application/js/plantillas/principal.js')?>"></script>


<a class='pull-right' href="<?=base_url('index.php/inicio/eventos')?>">
<button type="button" class="btn btn-default" >
    Ir a la sección de eventos
</button>
</a>






<div class="container">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    
                    <li role="presentation" class="restriccion-section disabled">
                        <a data-original-title="Step 2" href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="">
                            <span class="round-tab">
                                <i class="glyphicon fa fa-exclamation-triangle"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a data-original-title="Step 3" href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="">
                            <span class="round-tab">
                                <i class="glyphicon fa fa-check"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="politicas-section disabled">
                        <a data-original-title="Complete" href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="">
                            <span class="round-tab">
                                <i class="glyphicon fa fa-circle"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="active">
                        <a data-original-title="Step 1" href="#plantillas_descripciones" data-toggle="tab" aria-controls="plantillas_descripciones" role="tab" title="">
                            <span class="round-tab">
                                <i class="glyphicon fa fa-bars"></i>
                            </span>
                        </a>
                    </li>



                </ul>
            </div>



                
                <div class="container">
                    <div class="row">
                        
                        <?=$resumen_teplates;?>
                    </div>
                </div>
                
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="plantillas_descripciones">
                        
                        
                         <div class="row">
                            <!--******************* Editor Editor **********************************-->





                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading blue-col-enid">
                            <i class="fa fa-list"></i>
                            Nueva plantilla, descripción de eventos
                             <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>                                
                             </span>
                        </header>
                        <div class="blue-col-enid-complement panel-body">
                            
                            <form action="" class="form-horizontal nueva-descripcion-template" id="nueva-descripcion-template">
                                <div class="form-group">
                                    <div class="col-md-12">                                        
                                        <div class='list-templ-descripcion' id='list-templ-descripcion'></div>
                                                                                                                    

                                                <div class="input-group">                                                
                                                  
                                                  <input type="hidden" name="type" value="1">
                                                </div>

                                                <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon1">Titulo del contenido </span>                                        
                                                  <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name" class="form-control" placeholder="" aria-describedby="sizing-addon1" required>                                          
                                                </div>


                                                <textarea rows="6" class="form-control" name="contenido_text" id="descripcion-contenid-templ" required></textarea>
                                                <button class='btn  btn-template' id='registro-template-descripcion-evento' >
                                                    
                                                    Registrar
                                                </button>
                                               
                                        


                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>









                            <!--********************Editor Editor **********************************-->
                         </div>                    
                    </div>
<div class="tab-pane" role="tabpanel" id="step2">                                            
            <div class="form-group">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading blue-col-enid">
                            <i class="fa fa-star"></i>
 Nueva plantilla de restricción  
                             <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>                                
                             </span>
                        </header>
                        <div class="blue-col-enid-complement panel-body">
                
                                    <div class='restricciones-user' id='restricciones-user'></div>
                                    <form role="form" class="form-inline" id="new-contenido-form">
                                        <div class="form-group todo-entry">
                                            <input placeholder="Nueva restricción" class="form-control" name='nuevo_contenido_name' id='nuevo-contenido-name' style="width: 100%" type="text">
                                            <textarea placeholder="Registra la descripción de la restricción" id='contenido_text'  class='contenido_text form-control' name='contenido_text' class="form-control" style="width: 100%"  required></textarea>
                                            <input type='hidden' name="type" value="3">

                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit">
                                            Registrar
                                        </button>

                                    </form>




                        </div>
                    </section>
                </div>
            </div>
</div>

<div class="tab-pane" role="tabpanel" id="step3">    
            <div class="form-group">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading blue-col-enid">
                            <i class="fa fa-heart"></i>
 Nueva plantilla Artículos permitidos
                             <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>                                
                             </span>
                        </header>
                        <div class="panel-body">                        
                        <?=$plantilla_obj_permitidos;?>
                        <div class="row">
                                <div class="col-md-12">
                                    <form role="form" class="form-inline" id="form-articulo-permitido">
                                        <div class="form-group todo-entry">
                                            <input placeholder="Nuevo articulo" class="form-control" name='nuevo_articulo' id='nuevo-articulo' style="width: 100%" type="text">
                                                                                            
                                            <textarea rows="4"  class="form-control" style="width: 100%"  name="nueva_descripcion" id="nueva_descripcion" ></textarea>
                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit">Registrar</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </section>
        </div>        
</div>
</div>


<div class="tab-pane" role="tabpanel" id="complete">
    <div class="form-group">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading blue-col-enid">
                            <i class="fa fa-flag"></i>

                            Nueva plantilla Políticas
                             <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>                                
                             </span>
                        </header>       
                    <div class="blue-col-enid-complement panel-body">                                     
                    <div class='list-politicas' id="list-politicas"></div>
                    <form action="" class="form-horizontal nueva-politica-template" id="nueva-politica-template">
                                <div class="form-group">
                                    <div class="col-md-12">
                                                <div class="input-group">                                                                                              
                                                  <input type="hidden" name="type" value="4">
                                                </div>

                                                <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon1">Titulo del contenido </span>                                        
                                                  <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name" class="form-control" placeholder="" aria-describedby="sizing-addon1" required>                                          
                                                </div>


                                                <textarea rows="6" class="form-control" name="contenido_text" id="contenido_descripcion" required></textarea>
                                                <button class='btn  btn-template' id='registro-template-descripcion-evento' >                                                    
                                                    Registrar
                                                </button>
                                                                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>        












                    </div>
                    <div class="clearfix"></div>
                </div>
            
        </div>
    </section>
   </div>
</div>




<style type="text/css">
.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
</style>
