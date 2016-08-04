<?=$tags_generos?>
<div class='row'>
  <div class='col-lg-8 col-md-8 col-sm-12'>
    <!--Inicia about -->  
      <div class="panel">
          <div class="panel-body">
              <div class="profile-desk">
                  <h1>
                    acerca de <?=$data_empresa["nombreempresa"]?>
                  </h1>
                  <span class="designation">
                   Somos una organización localizada en <?=$data_empresa["countryName"]?>
                  </span>
                  <div class='description-empresa-text' id="description-empresa-text">
                    <p class='description-empresa-text_place' id="description-empresa-text_place">
                      <?=$data_empresa["quienes_somos"]?>
                    </p>
                    <div class='response-update-quienes-somos'>
                    </div>
                  </div>              
                  <div class='section-description-empresa' id="section-description-empresa">                                                                        
                    <div>
                        <label>
                            Quíenes somos
                        </label>
                        <div class="form-group">                        
                            <textarea   class="form-control input-sm" id='descripcion-empresa-input' class='descripcion-empresa-input'  rows="6">        
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
                  <div class='vision-empresa-text' id='vision-empresa-text'>
                    <p class='vision-empresa-text_place' id="vision-empresa-text_place">
                      <?=$data_empresa["quienes_somos"]?>
                    </p>
                    <div class='response-update-vision'>
                    </div>
                  </div>                
                  <div id="section-vision-empresa" class='section-vision-empresa' >                                                                        
                    <div>
                        <label>
                            Visión <?=$data_empresa["nombreempresa"]?>
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


    
  <div class='col-lg-4 col-md-4 col-sm-12'>
    <div class='response_img_logo_empresa' id='response_img_logo_empresa' >
    </div>
      <div class='img-logo-empresa' id='img-logo-empresa'>
        <?=carga_logo_empresa($data_empresa , $in_session );?>
      </div>
    <div  class='alert-ok-logo' id='alert-ok-logo' style='display:none'>
      Logo cargado .!
    </div>

                <br>
                <div class="block clearfix">
                  <center>
                    <h4 >
                      Los artístas más solicitados
                    </h4>
                  </center>                
                  <!---->
                  <div class='section-artistas-solicitudes' class='section-artistas-solicitudes'>
                  </div>
                  <!---->



                </div>

  </div>  
</div>


















   



 
  <!----> 
    <section id="services" ><!--Aquí inicia el resumen de la empresa-->            
              <div class='row'>
                <div class="row text-center">
                    <div class="col-lg-10 col-lg-offset-1">                    
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

                          <!--  -->
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
                          <!--  -->
                          <div class="col-md-3 col-sm-6">
                              <div class="service-item">
                                  <span class="fa-stack fa-4x" id='artistas-empresa-text'>
                                    <?=$data_empresa["artistas"]?>
                                  </span>
                                  <div class='response-update-artistas' id="response-update-artistas">
                                  </div>
                                  <div id="artistas-section" class='artistas-section' style='display:none;'>
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







<div  style='height:100%; background:#152A2D;'>  
    <section>                  
            <div class="col-md-8 col-md-offset-2">
              <h1 class="text-center" style='color:white !important;'>                
               +  De nosotros
              </h1>
              <div class="separator"></div>              



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
                          <div class='editar-mas-info-empresa editar-lb-enid' id="editar-mas-info-empresa">        
                            <span>
                              Edita la información adicional de tu empresa 
                              <i class='fa fa-pencil-square-o'>
                              </i>
                            </span>
                          </div> 
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
                        <!---->                        
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

<style type="text/css">
.img-tmp-empresa{
  width: 100%;
  height: 400px;
}
.text-logo-img{
  font-size: 4.5em;
  color: white;
  cursor: pointer;
}#logo_empresa_img{
  cursor: pointer;
}
</style>