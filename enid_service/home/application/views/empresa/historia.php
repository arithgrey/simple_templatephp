


<div class='pag-1'>
<div class='img-down pull-right'>
  <i class="fa fa-angle-double-down text-center"></i>
</div>
<br>
<br>
<br>
<div class="row animated rubberBand " style='height:90%; margin-left: 20%; margin-right:20%;' >  
  <!--El nombre de la empresa -->
    <div class='row text-center'>
      <div class='nombre-emp'>
        <h1 class='nombre-empresa-text' id='nombre-empresa-text' style='font-size:6em;'>
          <?=$data_empresa["nombreempresa"];?>                  
        </h1>                       
        <div class='editar-nombre-empresa editar-lb-enid' id="editar-nombre-empresa">        
          <span >
            Editar el nombre de tu organización
            <i class='fa fa-pencil-square-o'>
            </i>
          </span>
        </div> 
        <div class='response-update-nombre'>
        </div>
      </div>
      <div class='nombre-empresa-section' id="nombre-empresa-section">
        <div class="input-group">        
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                Nombre 
              </button>
            </span>
            <input type="text"  value="<?=$data_empresa["nombreempresa"];?>" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
        </div>
      </div>
    </div>
<!--Termina el nombre de la empresa -->
  <div class='row text-center'>
    <!--El slogan de la empresa-->
    <div class='slogan-emp'>      
        <span class="slogan-text designation" id="slogan-text" style='font-weight: normal' >
          <?=$data_empresa["slogan"];?>                  
        </span>       
        <div class='editar-slogan-empresa editar-lb-enid'>
            <span >            
              Editar el slogan con el cual te identifica tu público
              <i class='fa fa-pencil-square-o'>
              </i>
            </span>
        </div>    
    </div>
    <div class='response-update-slogan' id='response-update-slogan'>
    </div>
    <div class='slogan-edit-section' id='slogan-edit-section'>
      <div class="input-group">        
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              slogan de la organización
            </button>
          </span>
          <input type="text"  value="<?=$data_empresa["slogan"];?>" name='nslogan' class="form-control"   id='nslogan' placeholder="Slogan de tu empresa">
        </div>
    </div>  
  </div>
</div>

<!--Termina  el slogan de la empresa-->           
<hr>
<section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>
                      Conoce nuestra historia.!
                    </h2>                    
                </div>
            </div>            
        </div>        
</section>

<div class='row' style='height:100%; background:#F5F5F5;'>
    <section id="services" class="services bg-primary"><!--Aquí inicia el resumen de la empresa-->
            <div class="container">
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
      </section><!--Aquí termina el resumen de la empresa-->






      <!-- Aquí iniciamos  la carga de misión, visión etc -->
      <br>

      
        <div  class='row'>
        <div class='col-lg-8 col-sm-8 col-md-8' >
          <br>
          <!--Aquí definimos la historia de la empresa  -->
          <div class="[ col-sm-12  col-md-12]">
            <div class="[ info-card ]">
              <img style="width: 100%" src="" />
              <div class="[ info-card-details ] animate">
                <div class="[ info-card-header ]">
                  <h1>¿Quienes somos?</h1>              
                </div>
                <div class="[ info-card-detail ]">
                  <!-- Description -->
                  <div class='description-empresa-text' id="description-empresa-text">
                    <span  class='description-empresa-text_place' id="description-empresa-text_place" >
                      <?=$data_empresa["quienes_somos"]?>
                    </span>                                         
                    <div class='editar-quienes-somos-empresa editar-lb-enid' id="editar-quienes-somos-empresa">        
                      <span >
                        Edita la descripción de tu organización
                        <i class='fa fa-pencil-square-o'>
                        </i>
                      </span>
                    </div> 
                    <div class='response-update-quienes-somos'>
                    </div>
                  </div>                                                               

                  <div class='section-description-empresa' id="section-description-empresa">                                                        
                        <div class="input-group">               
                          <span class="input-group-addon" id="sizing-addon1" title='editar'>
                            Quiénes somos
                          </span>
                          <div>        
                            <textarea class="form-control" id='descripcion-empresa-input' class='descripcion-empresa-input' rows="3">
                            <?=$data_empresa["quienes_somos"]?>
                            </textarea>
                          </div>      
                        </div>      
                  </div> 
                  <hr>
                  <div class='text-center'>
                      <?=$tags_generos?>
                  </div>                                                            
                  <hr>              
            </div>
          </div>
        </div>
      </div>
      <!--Aquí terminamos la historia de la empresa  -->


      <!--Aquí definimos la misión  de la empresa  -->
      <div class="[ col-sm-12 col-md-12 ]">
        <div class="[ info-card ]">
          <img style="width: 100%" src="" />
          <div class="[ info-card-details ] animate">
            <div class="[ info-card-header ]">
              <h1>
                Nuestra misión y visión
              </h1>              
            </div>
            <div>
              <h5>
                Misión
              </h5>
            </div>
            <div class="[ info-card-detail ]">
              <!---->
              <div class='mision-empresa-text' id='mision-empresa-text'>
                <span class='mision-empresa-text_place' id="mision-empresa-text_place">
                    <?=$data_empresa["mision"]?>
                </span>  
                <div class='editar-mision-empresa editar-lb-enid' id="editar-mision-empresa">        
                  <span >
                        Edita la misión de tu organización
                    <i class='fa fa-pencil-square-o'>
                    </i>
                  </span>
                </div> 
                <div class='response-update-mision'>
                </div>
              </div>  
              <div id="section-mision-empresa" class='row section-mision-empresa'>
                <div class="input-group">               
                  <span class="input-group-addon" id="sizing-addon1">
                    Misión
                  </span>
                  <textarea class="form-control" id='mision-empresa-input' class='mision-empresa-input' rows="3">
                    <?=$data_empresa["mision"]?>
                  </textarea>
                </div>
              </div>       
              <!----> 
              <hr>

            
              <h5>
                Visión
              </h5>              
            
            <div class='vision-empresa-text' id='vision-empresa-text'>
              <span class='vision-empresa-text_place' id="vision-empresa-text_place">
                <?=$data_empresa["vision"]?>
              </span>                     
              <div class='editar-vision-empresa editar-lb-enid' id="editar-vision-empresa">        
                <span>
                  Edita la visión de tu organización
                  <i class='fa fa-pencil-square-o'>
                  </i>
                </span>
              </div> 
              <div class='response-update-vision'>
              </div>
            </div> 
            <div id="section-vision-empresa" class='section-vision-empresa'>
              <div class="input-group">               
                <span class="input-group-addon" id="sizing-addon1">
                Visión
                </span>
                <textarea class="form-control" class="form-control descripcion-vision-input" id='descripcion-vision-input' rows="3">
                  <?=$data_empresa["vision"]?>
                </textarea>
              </div>
            </div>     
            
            </div>
          </div>
        </div>
      </div>
      <!--Aquí terminamos de definir  definimos la misión  de la empresa  -->
</div>





        <div class='col-lg-4 col-sm-4 col-md-4' style='background:black;'>

              <br>    
              <div class="panel panel-default" >
                <div class="panel-body" >                    
                    <div class="profile-desk">

                        <h1 class='la-historia client-history '>
                          Cuentanos tu historia.!
                        </h1>                    
                        <span>
                          Lo que has vivido en nuestros eventos 
                        </span>  



                        <!---->      
                        <hr>
                        <h1 class='tu-artista'>
                          Solicita tu artista
                        </h1>  
                        <span>
                          Ayudanos a mejorar tu experiencia
                        </span>                          
                    </div>          
                </div>
              </div>  
                      
              <hr>              
              <div >
                <div class="col-xs-12 col-sm-12">
                    <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox"> 
                        <img src="https://s3.amazonaws.com/ooomf-com-files/lqCNpAk3SCm0bdyd5aA0_IMG_4060_1%20copy.jpg" alt="...">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox"> 
                        <img src="https://s3.amazonaws.com/ooomf-com-files/deYU3EyQP9cN23moYfLw_Dandelion.jpg" alt="...">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox"> 
                        <img src="https://s3.amazonaws.com/ooomf-com-files/8H0UdTsvRFqe03hZkNJr_New%20York%20-%20On%20the%20rock%20-%20Empire%20State%20Building.jpg" alt="...">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox"> 
                        <img src="https://s3.amazonaws.com/ooomf-com-files/Z3LXxzFMRe65FC3Dmhnp_woody_unsplash_DSC0129.jpg" alt="...">
                    </a>
                </div>                
              </div>          
        </div>

      </div>        
<!-- Aquí    termina  la carga de misión, visión etc -->
  </div>
</div>









<!---->
<div class='row' style='height:100%; background:#152A2D;'>
  <div class='col-lg-12 col-md-12 col-sm-12'>
    <section >                  
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

                        <!---->
                        <ul class="p-social-link pull-right">                          
                            <li class='social-fb' id="<?=$data_empresa["idempresa"]?>" data-toggle="modal" data-target="#modal-social-empresa">                              
                              <i class="fa fa-facebook">
                              </i>                                
                            </li>
                            <li class='social-tw' id="<?=$data_empresa["idempresa"]?>" data-toggle="modal" data-target="#modal-social-empresa"  >                                
                                <i class="fa fa-twitter">
                                </i>                                
                            </li>
                            <li class='social-gp' id="<?=$data_empresa["idempresa"]?>" data-toggle="modal" data-target="#modal-social-empresa" >                                
                                <i class="fa fa-google-plus">
                                </i>                              
                            </li>
                        </ul>
                         <!---->
                    </div>
                </div>
            </div>
            </div>                    
    </section>

  </div>
</div>
<!---->

























































<!-- *********************** CARGAMOS MODAL DE CONFIGURACION -->
<?=$this->load->view("empresa/modal/config_empresa");?>
<!-- *********************** TERMINAMOS DE CARGAMAS MODAL DE CONFIGURACION -->

<!--*****************************************************************************-->
<input type='hidden' value="<?=$base_path;?>" name='base_path' id='base_path' class='base_path'> 
<input type='hidden' value='<?=$base_path_img;?>' name='base_path_img' id="base_path_img" class='base_path_img'> 

<script type="text/javascript" src="<?=base_url('application/js/directorio/emp.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/img.js')?>"></script>  






<style type="text/css">

.section-experiencia-cliente{
  display: none;
}
.descripcion-section-q{
  background: #E4E6AC;
}
#form p {
  text-align: center;
}
input[type="radio"] {
  display: none;
}
label {
  color: #337AB7;
  font-size: 2.5em;
}
.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}
label:hover,
label:hover ~ label {
  color: #E8DBC2;
}
input[type="radio"]:checked ~ label {
  color: #E8DBC2;
}
.pais_empresa_input{
  display: none;
}
.title_main{
  display: none;
}
.contactos-sec:hover{
  padding: 10px;
  cursor: pointer;
}
.status-registro{
  display: none;
}
#telefono-info:hover{
  cursor: pointer;
}
.web_link{
  color: white;
}
.main_section_emp{
  background: #0F272C !important;
}
.well{
  background: white !important;
  //color: white;
}
.solicitud-artista-section{
  display: none;
}

.principal-contenido-historia{
  display: none;
}

</style>









<style type="text/css">
  .section-description-empresa, #nombre-empresa-section, 
  .section-mision-empresa,.section-vision-empresa, #años-section,
   #section-mas-info , #reponse-exp , .reponse-exp , .slogan-edit-section {
    display: none;
  }
  .description-empresa-text, .misions-empresa-text,  .mas-info-empresa-text{
    font-size: 1.2em;
    border-radius: 10px;
  }
  .description-empresa-text:hover, .nombre-empresa-text:hover .misions-empresa-text:hover, .vision-empresa-text:hover, .mas-info-empresa-text:hover, .años-empresa-text:hover , .slogan-text:hover , #artistas-empresa-text:hover, #mision-empresa-text:hover{
    padding: 2px;
    cursor: pointer;    
  }
  #nombre-empresa-text:hover{
    cursor: pointer;
    padding: 5px;
  }
  #principal-contenido-historia:hover{
    cursor: pointer;
    padding: 100px;
  }
  .section-header-title{
    display: none;
  }
</style>


<!--
  <link href="<?=base_url('application/css/fg.css')?>" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?=base_url('application/css/animate.css')?>">
-->






<style type="text/css">
      
  .animate {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }
  .info-card {
    width: 100%;
    border: 1px solid rgb(215, 215, 215);
    position: relative;
    font-family: 'Lato', sans-serif;
    margin-bottom: 20px;
    overflow: hidden;
  }
  .info-card > img {
    width: 100px;
    margin-bottom: 60px;
  }
  .info-card .info-card-details,
  .info-card .info-card-details .info-card-header  {
    width: 100%;
    height: 100%;
    position: absolute;
    bottom: -100%;
    left: 0;
    padding: 0 15px;
    background: rgb(255, 255, 255);
    text-align: center;
  }
  .info-card .info-card-details::-webkit-scrollbar {
    width: 8px;
  }
  .info-card .info-card-details::-webkit-scrollbar-button {
    width: 8px;
    height: 0px;
  }
  .info-card .info-card-details::-webkit-scrollbar-track {
    background: transparent;
  }
  .info-card .info-card-details::-webkit-scrollbar-thumb {
    background: rgb(160, 160, 160);
  }
  .info-card .info-card-details::-webkit-scrollbar-thumb:hover {
    background: rgb(130, 130, 130);
  }           

  .info-card .info-card-details .info-card-header {
    height: auto;   
    bottom: 100%;
    padding: 10px 5px;
  }
  .info-card:hover .info-card-details {
    bottom: 0px;
    overflow: auto;
    padding-bottom: 25px;
  }
  .info-card:hover .info-card-details .info-card-header {
    position: relative;
    bottom: 0px;
    padding-top: 45px;
    padding-bottom: 25px;
  }
  .info-card .info-card-details .info-card-header h1, 
  .info-card .info-card-details .info-card-header h3 {
    color: rgb(62, 62, 62);
    font-size: 22px;
    font-weight: 900;
    text-transform: uppercase;
    margin: 0 !important;
    padding: 0 !important;
  }
  .info-card .info-card-details .info-card-header h3 {
    color: rgb(142, 182, 52);
    font-size: 15px;
    font-weight: 400;
    margin-top: 5px;
  }
  .info-card .info-card-details .info-card-detail .social {
    list-style: none;
    padding: 0px;
    margin-top: 25px;
    text-align: center;
  }
  .info-card .info-card-details .info-card-detail .social a {
    position: relative;
    display: inline-block;
    min-width: 40px;
    padding: 10px 0px;
    margin: 0px 5px;
    overflow: hidden;
    text-align: center;
    background-color: rgb(215, 215, 215);
    border-radius: 40px;
  }

  a.social-icon {
    text-decoration: none !important;
    box-shadow: 0px 0px 1px rgb(51, 51, 51);
    box-shadow: 0px 0px 1px rgba(51, 51, 51, 0.7);
  }
  a.social-icon:hover {
    color: rgb(255, 255, 255) !important;
  }
  a.facebook {
    color: rgb(59, 90, 154) !important;
  }
  a.facebook:hover {    
    background-color: rgb(59, 90, 154) !important;
  }
  a.twitter {
    color: rgb(45, 168, 225) !important;
  }
  a.twitter:hover {
    background-color: rgb(45, 168, 225) !important;
  }
  a.github {
    color: rgb(51, 51, 51) !important;
  }
  a.github:hover {
    background-color: rgb(51, 51, 51) !important;
  }
  a.google-plus {
    color: rgb(244, 94, 75) !important;
  }
  a.google-plus:hover {
    background-color: rgb(244, 94, 75) !important;
  }
  a.linkedin {
    color: rgb(1, 116, 179) !important;
  }
  a.linkedin:hover {
    background-color: rgb(1, 116, 179) !important;
  }</style>






<style type="text/css">

#lightbox .modal-content {
    display: inline-block;
    text-align: center;   
}

#lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    
    z-index:1032;
}

  </style>




<style type="text/css">
.slogan-emp:hover .editar-slogan-empresa{
    filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;
}
.nombre-emp:hover .editar-nombre-empresa{
    filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;
}
.img-down{  
  background: #68b6c9;
  height: 70px;
  width: 70px;
  -moz-border-radius: 35px;
  border-radius: 35px;
}
.description-empresa-text_place:hover .editar-quienes-somos-empresa {
  filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;
} 
.mision-empresa-text:hover .editar-mision-empresa{
  filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;
}
.vision-empresa-text:hover .editar-vision-empresa{
 filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white; 
}
.mas-info-empresa-text:hover .editar-mas-info-empresa{
  filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;   
}
.social-fb:hover , 
.social-tw:hover ,
.social-gp:hover, 
.la-historia:hover, 
.tu-artista:hover{
  cursor: pointer;
  padding: 2px;
}
</style>


