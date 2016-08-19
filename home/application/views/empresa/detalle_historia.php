<div class='row'>
  <?=$tags_generos?>
</div>
<div class='row'>
  <div class='col-lg-8 col-md-8 col-sm-12'>  
    <div class='descripcion-empresa'>     
      <div class='contenedor-title-saber'>
        <span class='title-saber'>
            Lo que querías saber
        </span>      
      </div>
      <div class="panel">
          <div class="panel-body">
              <div class="profile-desk">
                  <h1>
                    acerca de 
                    <?=$data_empresa["nombreempresa"]?>
                  </h1>                  
                  <span class="designation">
                     Somos una organización localizada en 
                      <label class='lb-pais'> 
                        <?=$data_empresa["countryName"]?>
                      </label>
                  </span>                
                  <section>
                    <div class='description-empresa-text' id="description-empresa-text">
                      <p class='description-empresa-text_place' id="description-empresa-text_place">
                        <?=$data_empresa["quienes_somos"]?>
                      </p>
                      <div class='place_descripcion response-update-quienes-somos'>
                      </div>
                    </div>  
                  </section>
                  <div class='section-description-empresa' id="section-description-empresa">                                                                        
                    <div>
                        <label>
                            Quíenes somos
                        </label>
                        <div class="form-group">                        
                            <textarea id='descripcion-empresa-input' class='descripcion-empresa-input descripcion-empresa form-control input-sm '  rows="6">        
                                <?=$data_empresa["quienes_somos"]?>
                            </textarea>                       
                        </div>                
                    </div>                                        
                  </div>
              </div>
          </div>
      </div>
      <!--Termina about -->
      <!--Inicia Visión -->
      <div class="panel">
          <div class="panel-body">
              <div class="profile-desk">
                  <h1>
                      Visión
                  </h1> 
                  <section>
                    <div class='vision-empresa-text' id='vision-empresa-text'>
                      <p class='vision-empresa-text_place' id="vision-empresa-text_place">
                        <?=$data_empresa["vision"]?>
                      </p>
                      <div class='response-update-vision'>
                      </div>
                    </div>   
                  </section>                       
                  <div id="section-vision-empresa" class='section-vision-empresa' >                                                                                            
                    <label>
                        Visión 
                        <?=$data_empresa["nombreempresa"]?>
                    </label>
                    <div class="form-group">                     
                      <textarea   class="form-control descripcion-vision-input  input-sm"  id='descripcion-vision-input' rows="6">        
                        <?=$data_empresa["vision"]?>
                      </textarea>                       
                    </div>                                                                          
                  </div>
              </div>
          </div>
      </div>
    <!--Termina Visión -->
    <!--Inicia misión -->
    <div class="panel">
        <div class="panel-body">
            <div class="profile-desk">
                <h1>
                  Misión
                </h1>                
                <div class='mision-empresa-text' id='mision-empresa-text'>
                  <p class='mision-empresa-text_place' id="mision-empresa-text_place">
                   <?=$data_empresa["mision"]?>
                  </p>
                  <div class='response-update-mision'>
                  </div>
                </div>                
                <div id="section-mision-empresa" class='section-mision-empresa' >                                                                        
                  <div>
                      <label>
                          Misión <?=$data_empresa["nombreempresa"]?>
                      </label>
                      <div class="form-group">                                     
                        <textarea   class="form-control mision-empresa-input  input-sm" id='mision-empresa-input' rows="6">        
                           <?=$data_empresa["mision"]?>
                        </textarea>                       
                      </div>                
                  </div>                                        
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
  
  <!--inicia seccion derecha -->
  <div class='col-lg-4 col-md-4 col-sm-12'>
    <div class='seccion-derecha'>
      <div class='response_img_logo_empresa' id='response_img_logo_empresa' >
      </div>
      <div class='img-logo-empresa' id='img-logo-empresa'>
        <?=carga_logo_empresa($data_empresa , $in_session );?>
      </div>  
      <div class='ranking'>
        <div class="box">
            <div class="box-content">
                <h1 class="tag-title">
                  Los artistas que más nos solicitan.
                </h1>
                <hr/>
                <p>
                  Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. 
                  Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,
                   cuando un impresor (N. del T. persona que se dedica a la imprenta) 
                   desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de 
                   textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno
                    en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 
                    60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y 
                    más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, 
                    el cual incluye versiones de Lorem Ipsum.                            
                </p>
                <hr>
                <div class='section-artistas-solicitudes' class='section-artistas-solicitudes'>
                </div>                                
            </div>
        </div>
      </div>
    </div>
  </div>  
  <!--termina seccion derecha -->
</div>
<!--Termina row-->




<section id="services" >
  <!--Aquí inicia el resumen de la empresa-->            
  <br>
  <div class='row'>    
    <div class="row text-center resumen-us">
        <div class="col-lg-10 col-lg-offset-1 " >                    
            <hr class="small">
            <div class="row">
                          
              <!--AÑOS HACIENDO HISTORIA  -->
              <div class="col-md-3 col-sm-6">
                  <div class="service-item">
                      <span class="fa-stack fa-4x años-empresa-text" id='años-empresa-text_place' title="Editar Años haciendo historia en la escena musical">
                        <?=$data_empresa["years"];?>                                  
                      </span>
                      <div class='response-update-years'>
                      </div>
                      <div class="input-group" id="años-section" class='años-section'>        
                        <div class="input-group col-sm-12">                                                
                          <select class='form-control col-md-12' id='year-input'  name='años-input'>
                            <?=$years;?>
                          </select>
                        </div>                                        
                      </div>                                   
                      <h4>
                        <strong>
                          Años en la escena
                        </strong>
                      </h4>                                       
                  </div>
              </div>
              <!--TERMINA  AÑOS HACIENDO HISTORIA  -->
              <!--EVENTOS PUBLICADOS DESDE LA PLATAFORMA -->
              <div class="col-md-3 col-sm-6">
                  <div class="service-item">
                      <span class="fa-stack fa-4x">
                        <?=$evento_publicados;?>                                  
                      </span>
                      <h4>
                          <strong>
                            Eventos publicados
                          </strong>
                      </h4>                                  
                  </div>
              </div>
              <!--TERMINA EVENTOS PUBLICADOS DESDE LA PLATAFORMA -->
              <div class="col-md-3 col-sm-6">
                  <div class="service-item">
                      <span class="fa-stack fa-4x">                                  
                        <?=$generos_musicales_emp;?>
                      </span>
                      <h4>
                          <strong>
                            Géneros musicales representados
                          </strong>
                      </h4>                                  
                  </div>
              </div>
              <!---->
              <div class="col-md-3 col-sm-6">
                  <div class="service-item">
                      <span class="fa-stack fa-4x" id='artistas-empresa-text'>
                        <?=$data_empresa["artistas"]?>
                      </span>
                      <div class='response-update-artistas' id="response-update-artistas">
                      </div>
                      <div id="artistas-section" class='artistas-section' >
                        <?=create_select_num("artistas_representados")?>
                      </div>
                      <h4>
                        <strong>
                          Artistas de diferentes naciones
                        </strong>
                      </h4>                                                                   
                  </div>
              </div>
            </div>          
          </div>          
        </div>        
    </div>                  
</section>







<div class='last-seccion'>  
    <section>                  
      <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center title-more-us">                
          +  De nosotros
        </h1>
        <div class="separator">
        </div>              
        <div class="panel">
          <div class="panel-body">
              <div class="profile-desk">
                  <h1>
                   Siempre al día de tus expectativas
                  </h1>                        
                  <!---->      
                  <div class='mas-info-empresa-text designation' id='mas-info-empresa-text'>
                    <spam class='mas-info-empresa-text_place' id="mas-info-empresa-text_place">
                      <?=$data_empresa["mas_info"]?>
                    </spam>    
                    
                    <div class='response-update-mas-info'>
                    </div>
                  </div>            
                  <div id="section-mas-info" class='section-mas-info'>
                    <div class="input-group">               
                      <span class="input-group-addon" id="sizing-addon1">
                             + Info 
                      </span>
                      <textarea name='mas_info_empresa' class="form-control"   id='mas-info-empresa-input'   rows="3">
                        <?=$data_empresa["mas_info"]?>
                      </textarea>       
                    </div>
                  </div>                                              
                  <a class="btn p-follow-btn pull-left" href="#">
                      <i class="fa fa-check">
                      </i> 
                      Following
                  </a>                      
              </div>
          </div>
        </div>
      </div>                    
    </section>
</div>

