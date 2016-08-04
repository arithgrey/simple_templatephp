<section>
        <div class="wizard">            
            <div class="wizard-inner">
        
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="restriciones_disponibles tb_restricciones"  >
                        <a data-original-title="Step 2" href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title='Registra las restricciones más comunes que la organización exige a sus clientes en los eventos'>
                            <span class="round-tab">
                                <i class="glyphicon fa fa-exclamation-triangle">
                                </i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class='tb_objs tb_objs_secccion' >
                        <a data-original-title="Step 3" href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Registra los articulos que usualmente la empresa permite ingresar a los clientes en los eventos" >
                            <span class="round-tab">
                                <i class="glyphicon fa fa-check">
                                </i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="politicas-section tb_politicas" >
                        <a data-original-title="Complete" href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title='Redacta las políticas frecuentes de los eventos'>
                            <span class="round-tab">
                                <i class="glyphicon fa fa-circle">
                                </i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="active tb_presentacion" >
                        <a data-original-title="Step 1" href="#plantillas_descripciones" data-toggle="tab" aria-controls="plantillas_descripciones" role="tab"  title='Redacta la experiencia  que los clientes usualmente viven en tus eventos'>
                            <span class="round-tab">
                                <i class="glyphicon fa fa-bars">
                                </i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div><!--Termina  wizard-inner  -->
                

            <!--INICIA EL RESUMEN -->    
            
                
            <div class="tab-content">                 
                <!--********************Editor Editor **********************************-->
                <!--Para la experiencia en los eventos -->
                <div class="tab-pane tb_presentacion active " role="tabpanel" id="plantillas_descripciones">                                                        
                    <section>                        
                            <button   class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-descripcion-eventos">
                                + La experiencia en los eventos
                            </button>                
                            <div class='separate-enid'></div>                                                         
                            <div class='place_experiencias'>
                            </div>
                            <div class='experiencias'>
                            </div>                        
                    </section>                                                
                </div>
                <!--Para las restricciones en los eventos-->
                <div class="tab-pane tb_restricciones " role="tabpanel" id="step2">                                                                
                    <section>
                            <button class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-restriccion-eventos">
                                + Restricción
                            </button>                         
                            <div class='place_restriciones' id='place_restriciones'>
                            </div>
                            <div class='restriciones' id='restriciones'>
                            </div>
                    </section>                                                        
                </div>

                <div class="tab-pane tb_objs" role="tabpanel" id="step3">    
                    <button   class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-articulo-eventos">
                        + Articulo permitido
                    </button> 
                    <div class='place_objs'>
                    </div>
                    <div class='objs'>
                    </div>
                </div>        
                    
            
                <div class="tab-pane tb_politicas" role="tabpanel" id="complete">
                        <section>
                            <button   class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-politica-eventos">
                                + Politica
                            </button> 
                            <div class='place_politicas'></div>
                            <div class='politicas'></div>
                        </section>
                    </div>
                </div>   
                
            </div>
      
        </div>            
    
    </section>