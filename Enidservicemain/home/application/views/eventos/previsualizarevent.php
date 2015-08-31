<link href="<?=base_url('application/tema/plugins/rs-plugin/css/settings.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/owl-carousel/owl.transitions.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<script type="text/javascript" src="<?=base_url('application/tema/plugins/SmoothScroll.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/js/template.js')?>"></script>

<style type="text/css">
.title_main{
  display: none;
}
</style>
<?php 
  $img_f = $base_img. $img_event[0]["name"];
  $img_s = $base_img. $img_event[1]["name"];
  
   $img_t = '<span class="icon large circle"><i class="fa fa-play-circle"></i></span>';
   $img_c = '<span class="icon large circle"><i class="fa fa-heart"></i></span>';
   $img_cc = '<span class="icon large circle"><i class="fa fa-chevron-right"></i></span>';
?>







  





  


















































<div class='row' class='evento_principal'>
<div class="banner clearfix">
      <div class="slideshow">          
          <div class="slider-banner-container">
            <div class="slider-banner-fullscreen">
              <ul class="slides">
                <!-- slide 1 start -->
                <!-- ================ -->
<li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on"
 data-title="La experiencia">                
<img src="<?=$img_f?>" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">
                
                <!-- Transparent Background -->
                <div class="tp-caption dark-translucent-bg"
                  data-x="center"
                  data-y="bottom"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="0">
                </div>

                <!-- LAYER NR. 1 -->
                <div class="tp-caption sfr stl xlarge_white"
                  data-x="center"
                  data-y="70"
                  data-speed="200"
                  data-easing="easeOutQuad"
                  data-start="1000"
                  data-end="2500"
                  data-splitin="chars"
                  data-elementdelay="0.1"
                  data-endelementdelay="0.1"
                  data-splitout="chars">Disfruta 
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption sfl str xlarge_white"
                  data-x="center"
                  data-y="70"
                  data-speed="200"
                  data-easing="easeOutQuad"
                  data-start="2500"
                  data-end="4000"
                  data-splitin="chars"
                  data-elementdelay="0.1"
                  data-endelementdelay="0.1"
                  data-splitout="chars">Forma parte 
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption sfr stt xlarge_white"
                  data-x="center"
                  data-y="70"
                  data-speed="200"
                  data-easing="easeOutQuad"
                  data-start="4000"
                  data-end="6000"
                  data-splitin="chars"
                  data-elementdelay="0.1"
                  data-endelementdelay="0.1"
                  data-splitout="chars"
                  data-endspeed="400"> <?=$evento["fecha_inicio"]?> - <?=$evento["fecha_termino"]?>
                </div> 
                <!-- LAYER NR. 4 -->
                <div class="tp-caption sft fadeout text-center large_white"
                  data-x="center"
                  data-y="70"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="6400"
                  data-end="10000">

                  <span class="logo-font">
                    <span class="text-default"><?=$evento["nombre_evento"]?></span>
                </div>  

                <!-- LAYER NR. 5 -->
                <div class="tp-caption sfr fadeout"
                  data-x="center"
                  data-y="210"
                  data-hoffset="-232"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="1000"
                  data-end="5500">                                      
                    <?=$img_t?>
                </div>

                <!-- LAYER NR. 6 -->
                <div class="tp-caption sfl fadeout"
                  data-x="center"
                  data-y="210"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="2500"
                  data-end="5500">                 

                  <?=$img_c?>
                </div>

                <!-- LAYER NR. 7 -->
                <div class="tp-caption sfr fadeout"
                  data-x="center"
                  data-y="210"
                  data-hoffset="232"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="4000"
                  data-end="5500">
                   <?=$img_cc?>
                </div>

                <!-- LAYER NR. 8 -->
                <div class="tp-caption ZoomIn fadeout text-center tp-resizeme large_white"
                  data-x="center"
                  data-y="170"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="6400"
                  data-end="10000"><div class="separator light"></div>
                </div>  

                <!-- LAYER NR. 9 -->
                <div class="tp-caption sft fadeout medium_white text-center"
                  data-x="center"
                  data-y="210"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="5800"
                  data-end="10000"
                  data-endspeed="600">
                  
                </div>

                <!-- LAYER NR. 10 -->
                <div class="tp-caption fade fadeout"
                  data-x="center"
                  data-y="bottom"
                  data-voffset="100"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="2000"
                  data-end="10000"
                  data-endspeed="200">
                  <a href="#page-start" class="btn btn-lg moving smooth-scroll">
                    <i class="icon-down-open-big"></i><i class="icon-down-open-big"></i>
                    <i class="icon-down-open-big"></i></a>
                </div>
  </li>

<li class='li_enid' data-transition="random" data-slotamount="7" data-masterspeed="500"
 data-saveperformance="on" data-title="<?=$evento['nombre_evento'];?>  <?=$evento['fecha_inicio']?> - <?=$evento['fecha_termino']?>">                
<img src="<?=$img_s;?>" alt="slidebg2" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">

                <div class="tp-caption dark-translucent-bg"
                  data-x="center"
                  data-y="bottom"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="0">
                </div>

                <div class="tp-caption sfb fadeout large_white"
                  data-x="left"
                  data-y="70"
                  data-speed="500"
                  data-start="1000"
                  data-easing="easeOutQuad"
                  data-end="10000"><span class="logo-font"><?=$evento['nombre_evento'];?></span> <br> 
                  
                </div>  

                <!-- LAYER NR. 2 -->
                <div class="tp-caption sfb fadeout text-left medium_white"
                  data-x="left"
                  data-y="200" 
                  data-speed="500"
                  data-start="1300"
                  data-easing="easeOutQuad"
                  data-endspeed="600">
                <span class="icon default-bg circle small hidden-xs"><i class="fa fa-play"></i>
</span> Escenarios & artistas
                </div>

               <div class="tp-caption sfb fadeout text-left medium_white"
                  data-x="left"
                  data-y="260" 
                  data-speed="500"
                  data-start="1600"
                  data-easing="easeOutQuad"
                  data-endspeed="600">
                  <span class="icon default-bg circle small hidden-xs"><i class="fa fa-star"></i>

</span> La experiencia
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption sfb fadeout text-left medium_white"
                  data-x="left"
                  data-y="320" 
                  data-speed="500"
                  data-start="1900"
                  data-easing="easeOutQuad"
                  data-endspeed="600">
                  <span class="icon default-bg circle small hidden-xs"><i class="fa fa-credit-card"></i>
                </span> Adquiere tus accesos.!
                </div>
              
            
          </li>




















             </ul>

            </div>
          </div>
        </div>
      </div>

<!--*************************************************** *************************************+-->






































































      <section class="section default-bg clearfix">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="call-to-action text-center">
                <div class="row">
                  <div class="col-sm-8">
                    <h1 class="title"><?=$evento["eslogan"]?></h1></div>
                  <div class="col-sm-4">
                    <br>
                    <p style="background:white">
                      <a href="<?=base_url('index.php/emp/lahistoria')?>" class="btn btn-lg btn-gray-transparent btn-animated">
                        Conoce nuestra historia
                        <i class="fa fa-arrow-right pl-20"></i>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>









<section class="section default-bg clearfix">
        <div class="container">
          <div class="row">
            



            <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">
              <div class="row">
                <div class="col-md-4">
                    
                  <div class="blog-post">

                  <?=$escenarios;?>
                  </div>








                </div>
                <div class="col-md-8">
                  <h2>TODO A TU ALCANCE</h2>
                  <label><?=$evento["nombre_evento"]?>  edición <?=$evento["edicion"]?></label>
                  <p><?=$evento["descripcion_evento"];  ?>

                  </p>

                  <i class='fa fa-calendar'></i> <?=$evento["fecha_inicio"]?> - <?=$evento["fecha_termino"]?>
                  <?=$generos_musicales_tags;?>



                 
                  
                </div>
                
               

              </div>
              <hr>
             
            </div>
            <!-- main end -->

          </div>







            
          </div>
        </div>
</section>


      <div style='background: #0A142D !important;' class="dark-bg  default-hovered footer-top animated-text">
        <div class="container">
          <a href="<?=base_url('index.php/eventos/accesosalevento/'. $evento['idevento']) ."/" .$evento['status'] ?> ">
          <div class="row">
            <div class="col-md-12">
              <div class="call-to-action text-center">
                <div class="row">
                  <div class="col-sm-8">
                    <h2>Consigue tus accesos</h2>
                    <h2>Promociones increibles</h2>
                  </div>
                  <div class="col-sm-4">
                    <p class="mt-10"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent ">Dónde<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>

        </div>
      </div>


 

  <div class="row mb-20">

            <div class="col-md-12">              
              <table class='table text-center' >
                <tr class='text-center'>
                    <td class='blue-col-enid' rowspan="2">El día del evento</td>
                    <td>
                      <a href="<?=base_url('index.php/eventos/diaevento/' ).'/'.$evento["idevento"]?>">                        
                        <span class="icon circle small default-bg"><i class="fa fa-check"></i></span>                        
                      </a>Lo permitido
                    </td>
                    <td>
                      <a href="<?=base_url('index.php/eventos/diaevento/').'/'.$evento["idevento"]?>">                        
                          <span class="icon circle small default-bg"><i class="fa fa-circle"></i> 
                          </span>                          
                        </a> Politicas
                    </td>
                    <td>
                      <a href="<?=base_url('index.php/eventos/diaevento/').'/'.$evento["idevento"]?>">                        
                          <span class="icon circle small default-bg"><i class="fa fa-exclamation-triangle"></i> 
                          </span> 
                      </a> Lo prohibido                      
                       
                    </td>
                </tr>
                
                
                <tr>
                  
                    <td>
                      <a style='text-decoration:none;' href="<?=base_url('index.php/eventos/diaevento/').'/'.$evento["idevento"]?>">                        
                      <span style='font-size: .8em'><?=substr($evento["permitido"], 0 , 300); ?> ....</span>                      
                      </a>
                      <a href="<?=base_url('index.php/eventos/diaevento/'.$evento["idevento"]."#articulos-permitidos")?>"><button class='btn btn-lg btn-default btn-animated'>Artículos permitidos </button></a>
                    </td>
                    <td>
                      <a style='text-decoration:none;' href="<?=base_url('index.php/eventos/diaevento/').'/'.$evento["idevento"]?>">                        
                      <span style='font-size: .8em'><?=substr($evento["politicas"],  0 , 300); ?>...</span>
                      </a>
                    </td>
                    <td>
                      <a style='text-decoration:none;'href="<?=base_url('index.php/eventos/diaevento/').'/'.$evento["idevento"]?>">                        
                      <span style='font-size: .8em'><?=substr($evento["politicas"],  0 , 300); ?></span>
                      </a>
                    </td>
                </tr>
              
             </table>
            </div>



            <div class="col-md-8">            
                
                  <h2><i class="fa fa-map-marker"></i> Locación</h2>
                  <p><?=$evento["ubicacion"]?></p>                                  
            </div>

            <div class="col-md-4">
              
                
              <a href="<?=base_url('index.php/emp/solicitatusartistaspreferidos'. '/'. $evento["idevento"] ."/" . $evento["status"] )?>">
                <div class="alert alert-icon alert-success">
                  <i class="fa fa-check-square"></i>Solicita tu artista
                </div>
              </a>

              <a href="<?=base_url('index.php/emp/entuciudad/'. $evento["idevento"] ."/" . $evento["status"] )?>">
                <div class="alert alert-icon alert-info" role="alert">
                  <i class="fa  fa-spinner"></i>Pide nuestros eventos
                </div>
              </a>
                

              
            </div>

            

          </div>

</div><!--Termina el row principal-->
<!--***********************************INICIA SERVICIOS MODAL  *************************-->
<?php $this->load->view("eventos/modal_config_event_template");?>
<!--***********************************TERMINA SERVICIOS MODAL  *************************-->


<script type="text/javascript" src="<?=base_url('application/tema/plugins/modernizr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/owl-carousel/owl.carousel.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/js/template.js')?>"></script>

