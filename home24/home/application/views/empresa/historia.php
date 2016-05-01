<script type="text/javascript">
$(function() {
    $('nav, .nav-controller').on('click', function(event) {
        $('nav').toggleClass('focus');
    });

    $('nav, .nav-controller').on('mouseover', function(event) {
        $('nav').addClass('focus');
        $('.controller-open').hide();
        $('.controller-close').show();


    }).on('mouseout', function(event) {
        $('nav').removeClass('focus');
        $('.controller-open').show();
        $('.controller-close').hide();
    })
})
</script>

<style type="text/css">

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
}

/**/
nav {
  position: fixed;
  top: 0px;
  right: -100%;
  padding-top: 65px;
  padding-bottom: 15px;
  height: 100%;
  max-width: 200px;
  text-align: right;
  background-color: rgb(255, 255, 255);
  box-shadow: -3px 0px 3px 0px rgba(160, 160, 160, 0.30);
  z-index: 100;    
  overflow: auto;
}

nav.focus {
    right: 0px;
}
nav > ul {
    list-style: none;
}
nav > ul > li > a:hover {
    font-size: 1.1em;
    font-weight: 700;
    color: rgb(51, 51, 51);
    text-decoration: none;
}
</style>



<nav class="animate" style='background:#052E3A;'>
    <p style='background:#09AFDF; padding:50px; color:white; font-size:1.1em;'>
      <strong>Todo a tu alcance.! </strong>
    </p>
    <div class="divider"></div>
    <ul>
        <li>
          <a href="<?=base_url('index.php/emp/cuentamostuhistoria')?>/<?=$data_empresa['idempresa']?>" style='color:white;'>
            Cuentanos tu historia
          </a>
        </li>
       
        <li>
          <a href="<?=base_url('index.php/emp/solicitatuartista/')?>/<?=$data_empresa['idempresa']?>" style='color:white;'>
            Solicita tu artista
          </a>
        </li>        
    </ul>      
</nav>




























 <div class="nav-controller img-down">
    <span class="fa  fa-angle-double-left  controller-open">
    </span>
    <span  style='display:none;' class="fa fa-angle-double-right   controller-close">
    </span>
</div>









<div >          
  <ul class="nav nav-pills" role="tablist">
    <li class="active">
      <a aria-expanded="true" href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals">
        <i class='fa fa-star'>
        </i>        
      </a>
      </li>
    
    <li class="" id='section-comunidad'>
      <a aria-expanded="false" href="#pill-3" role="tab" data-toggle="tab" title="Top Sellers">
        <i class=" icon-up-1">
        </i> 
        Comunidad
      </a>
    </li>
    <li class="" id='section-us'>
      <a aria-expanded="false" href="#pill-2" role="tab" data-toggle="tab" title="Featured">
      <i class="icon-heart">
      </i> 
      Nosotros
    </a>
    </li>
  </ul>

  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
      <?=$this->load->view("empresa/empresa_general.php");?>
    </div>
    <div class="tab-pane" id="pill-2">
        <?=$this->load->view("empresa/detalle_historia.php");?>
    </div>
    <div class="tab-pane" id="pill-3">
          <?=$this->load->view("empresa/historia_imagenes.php")?>
    </div>
  </div>            
</div>


            
          








<!-- *********************** CARGAMOS MODAL DE CONFIGURACION -->
<?=$this->load->view("empresa/modal/config_empresa");?>
<!-- *********************** TERMINAMOS DE CARGAMAS MODAL DE CONFIGURACION -->

<!--*****************************************************************************-->
<input type='hidden' value="<?=$data_empresa['idempresa']?>" id='id_empresa' > 
<input type='hidden' value="<?=$base_path;?>" name='base_path' id='base_path' class='base_path'> 
<input type='hidden' value='<?=$base_path_img;?>' name='base_path_img' id="base_path_img" class='base_path_img'> 

<script type="text/javascript" src="<?=base_url('application/js/directorio/emp.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/img.js')?>"></script>  
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/solicitudes.js')?>"></script>  










<style type="text/css">
  .section-description-empresa, #nombre-empresa-section, 
  .section-mision-empresa,.section-vision-empresa, #años-section,
   #section-mas-info , #reponse-exp , .reponse-exp , .slogan-edit-section {
    display: none;
  }
  
  .description-empresa-text:hover, .nombre-empresa-text:hover .misions-empresa-text:hover, .vision-empresa-text:hover, .mas-info-empresa-text:hover, .años-empresa-text:hover , .slogan-text:hover , #artistas-empresa-text:hover, #mision-empresa-text:hover{
    padding: 1px;
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
  }
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
  background: #E31F56;
  height: 40px;
  width: 40px;
  -moz-border-radius: 25px;
  border-radius: 25px;
  color:white;

}
.img-down:hover{
  cursor: pointer;
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
.tu-artista:hover , 
.social-www:hover{
  cursor: pointer;
  padding: 1px;

}
</style>
