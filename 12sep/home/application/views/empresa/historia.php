<div class='row'>  
  <div class='col-lg-12 col-md-12 col-sm-12'>
    <div class='ver-public-lg-emp'>    
      <a  href="#pill-1" role="tab" data-toggle="tab" class='links_enid' id='menu_1'>
        <i class='fa fa-star'>
        </i>        
      </a>|      
      <a  href="#pill-3" role="tab" data-toggle="tab" class='links_enid' id='section-comunidad'>
        <i class=" icon-up-1">
        </i> 
          Comunidad
      </a>|      
      <a href="#pill-2" role="tab" data-toggle="tab" class='links_enid' id='section-us'>
        <i class="icon-heart">
        </i> 
          Nosotros
      </a>          
    </div>
    <nav class="animate seccion-lateral">        
        <span class='title-mejora'>
            Mejorando la experiencia de tus eventos musicales
        </span>        
        <ul>
            <li>
              <a href="<?=base_url('index.php/emp/cuentanostuhistoria')?>/<?=$data_empresa['idempresa']?>" class='link-encuesta'>
                Cuentanos tu historia
              </a>
            </li>       
            <li>
              <a href="<?=base_url('index.php/emp/solicitatuartista/')?>/<?=$data_empresa['idempresa']?>" class='link-encuesta'>
                Solicita tu artista
              </a>
            </li>        
        </ul>      
    </nav>
    <div class="nav-controller img-down">
      <span class="fa fa-angle-double-left  controller-open">
      </span>
      <span  style='display:none;' class="fa fa-angle-double-right   controller-close">
      </span>
    </div>

    <div class="nav-controller img-down">
      <span class="fa fa-angle-double-left  controller-open">
      </span>
      <span  style='display:none;' class="fa fa-angle-double-right   controller-close">
      </span>
    </div>
    <!--Hasta aquí terminamos la barra lateral -->  
  </div>
  

</div>


<div class='row'> 
  <div class="tab-content">
    <div class="tab-pane" id="pill-1">
      <?=$this->load->view("empresa/empresa_general");?>
    </div>
    <div class="tab-pane " id="pill-2">
        <?=$this->load->view("empresa/detalle_historia");?>
    </div>

    <div class="tab-pane active" id="pill-3">
        <?=$this->load->view("empresa/historia_imagenes")?>
    </div>
  </div>            
</div>


<?=$this->load->view("empresa/modal/config_empresa");?>
<input type='hidden' value="<?=$data_empresa['idempresa']?>" id='id_empresa' class='id_empresa' > 
<script type="text/javascript" src="<?=base_url('application/js/directorio/emp.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/img.js')?>"></script>  
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/solicitudes.js')?>"></script>  

<!--Lo que ya está-->
<style type="text/css">
 .img-tmp-empresa{
    width: 100%;
    height: 400px;
  }
  .text-logo-img{
    font-size: 4.5em;  
    cursor: pointer;
    font-weight: bold;
    color: #31708f;
  }#logo_empresa_img{
    cursor: pointer;
  }
  .nombre_empresa:hover , .nombre-empresa-text:hover ,.social-fb:hover , .social-tw:hover , .social-gp:hover, .la-historia:hover,  .tu-artista:hover ,   .social-www:hover , .description-empresa-text:hover,  .misions-empresa-text:hover, .vision-empresa-text:hover, .mas-info-empresa-text:hover, .años-empresa-text:hover , .slogan-text:hover , #artistas-empresa-text:hover, #mision-empresa-text:hover , .lb-pais:hover{
    cursor: pointer;
  }.nombre-empresa-text{
    font-size: 6em;
    font-weight: bold;
    text-align: center;
  }  
  .alert-info{    
    padding: 10px;
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #31708f;    
  }.title-saber{
    font-size: 3em;
    font-weight: bold;
    padding: 10px;
    color: white;
  }
  .contenedor-title-saber{
    text-align: right;
    padding: 10px;
  }.title-mode-us{
      color:white !important;
  }.artistas-section{
      display:none;
  }.ranking{ 
    padding: 1px;
  }.title-mejora{
    font-size: 2em;
    font-weight: bold;
    color: white;    
  }.link-encuesta{
    text-decoration: none;
    color: white;
    font-weight: bold;
  }.resumen-us{
      background: #1e5771;
      color: white;
  }.lb-pais{
    font-weight: bold;
  }

#principal-contenido-historia:hover{
    cursor: pointer;    
}
.nav-controller {
    position: fixed;
    top: 45px;
    right: 65px;
    padding: 5px 6px 1px;
    border: 5px solid rgb(51, 51, 51);
    color: rgb(51, 51, 51);
    border-radius: 25px;
    font-size: 12pt;
    cursor: pointer;
    z-index: 300;
}/**/
nav{
  position: fixed;
  top: 0px;
  right: -100%;
  padding-top: 65px;
  padding-bottom: 15px;
  height: 100%;
  max-width: 200px;
  text-align: right;  
  background-color: #0f89b3;
  box-shadow: -3px 0px 3px 0px rgba(160, 160, 160, 0.30);
  z-index: 100;    
  overflow: auto;
}
/**/
nav.focus {
    right: 0px;
}
nav > ul > li > a:hover {
  font-size: 1em;
  font-weight: 700;
  color: rgb(51, 51, 51);
  text-decoration: none;
} 
</style>



<!--Lo del twwiter-->
<style type="text/css">





.panel-image img.panel-image-preview {
  width: 100%;
   border-radius: 4px 4px 0px 0px;
}.panel-heading ~ .panel-image img.panel-image-preview {
  border-radius: 0px;
}.panel-image ~ .panel-body, .panel-image.hide-panel-body ~ .panel-body {
  overflow: hidden;
}.panel-image ~ .panel-footer a {
  padding: 0px 10px;
  font-size: 1.3em;
  color: rgb(100, 100, 100);
}
.panel-image.hide-panel-body ~ .panel-body {
  height: 0px;
  padding: 0px;
}
.tag-enid-galery{
    background: #052E3A !important;
    color: white !important;
}
.text-edit-mensaje-comunidad:hover{
    cursor: pointer;
}
.img-tmp-empresa:hover{
    cursor: pointer;
}

.more-fields{
  display: none;
}
.section-description-empresa, #nombre-empresa-section, 
  .section-mision-empresa,.section-vision-empresa, #años-section,
   #section-mas-info , #reponse-exp , .reponse-exp , .slogan-edit-section , .section-header-title {
    display: none;
}      
.descripcion-empresa{
  background: #166781;
  padding: 10px;
}
.last-seccion{
  background: #032935;
  padding: 10px;
}
.title-more-us{
  color: white;
}
</style>

<style type="text/css">
  /*Primero parte */
  .links_enid{
    color: white;
  }.slogan-text{
    font-weight: bold;
    font-size: 1.2em;
  }
  .panel-nuestra-comunidad{
    background: #166781 !important;

  }
  .title-cominidad{
    color: white !important; 
  }
</style>