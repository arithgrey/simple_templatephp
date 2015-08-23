<script type="text/javascript" src="<?=base_url('application/js/plantillas/principal.js')?>"></script>

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

                    <li role="presentation" class="disabled">
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

            
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="plantillas_descripciones">
                        
                        <div class="page-header">
                          <h1>Mis plantillas<small> descripción de eventos</small></h1>
                        </div>
                         <div class="row">
                            <!--******************* Editor Editor **********************************-->



                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading blue-col-enid">
                            Nueva plantilla, dedicada a la descripción de los eventos
                             <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>                                
                             </span>
                        </header>
                        <div class="panel-body">
                            <form action="" class="form-horizontal nueva-descripcion-template" id="nueva-descripcion-template">
                                <div class="form-group">
                                    <div class="col-md-12">


                                        

                                        <div class='list-templ-descripcion' id='list-templ-descripcion'>
                                            <?=$plantillas_descripcion;?>
                                        </div>

                                        

                                        <br>
                                        

                                        

                                                <div class="input-group">
                                                

                                                  
                                                  <input type="hidden" name="tipo_templ" value="1">
                                                </div>

                                                <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon1">Titulo del contenido </span>                                        
                                                  <input type="text"  id="titulo-contenido-tmpl" name="titulo_contenido_tmpl" class="form-control" placeholder="" aria-describedby="sizing-addon1" required>                                          
                                                </div>


                                                <textarea rows="6" class="form-control" name="descripcion_contenid_templ" id="descripcion-contenid-templ" required></textarea>
                                                <button class='btn  btn-template' id='registro-template-descripcion-evento' >
                                                    <i class="fa fa-file-text"></i>
                                                    Registrar plantilla
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


                                        
                                        <div class="page-header">
                                          <h1>Mis plantillas<small> restricciones</small></h1>
                                        </div>

                                        
                                        

                                        <br>
                                        

                                        

                                            <div class="panel">
                        
                        <div class="panel-body">
                            
                            <div class='restricciones-user' id='restricciones-user'></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form role="form" class="form-inline" id="new-restriccion-form">
                                        <div class="form-group todo-entry">

                                            <textarea placeholder="Registra la descripción de la restricción" id='restriccion_text' class='restriccion_text' name='restriccion_text' class="form-control" style="width: 100%" ></textarea>

                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit">+</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                                               
                                        

                                    </div>
                                </div>
                            

                        
                        

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        

                        <h1>Mis plantillas<small> articulos permitidos</small></h1>

                        
                        <?=$plantilla_obj_permitidos;?>


                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
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
