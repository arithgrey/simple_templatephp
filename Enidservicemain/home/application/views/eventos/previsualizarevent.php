<link href="<?=base_url('application/tema/plugins/rs-plugin/css/settings.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/owl-carousel/owl.transitions.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<script type="text/javascript" src="<?=base_url('application/tema/plugins/modernizr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/owl-carousel/owl.carousel.js')?>"></script>

<script type="text/javascript" src="<?=base_url('application/tema/js/template.js')?>"></script>

<?php 

  $img_f = $base_img. $img_event[0]["name"];
  $img_s = $base_img. $img_event[1]["name"];


   $img_t = '<span class="icon large circle"><i class="fa fa-play-circle"></i></span>';
   $img_c = '<span class="icon large circle"><i class="fa fa-heart"></i></span>';
   $img_cc = '<span class="icon large circle"><i class="fa fa-chevron-right"></i></span>';

  /*if (count($img_event)>4) {

      $img_t = "<img class='icon large circle' src='". $base_img. $img_event[2]["name"] . "'>"; 
      $img_c = "<img class='icon large circle' src='".  $base_img. $img_event[3]["name"] . "'>"; 
      $img_cc = "<img class='icon large circle' src='".  $base_img. $img_event[4]["name"] . "'>"; 
  }*/

?>





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
                  data-endspeed="400"> <?$evento["fecha_inicio"]?> - <?=$evento["fecha_termino"]?>
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
                    <h1 class="title">WE OFFER MORE POSSIBILITIES TO MEET YOUR EVERY NEED</h1></div>
                  <div class="col-sm-4">
                    <br>
                    <p style="background:white"><a href="#" class="btn btn-lg btn-gray-transparent btn-animated">Learn More<i class="fa fa-arrow-right pl-20"></i></a>
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
                  <p><?=$evento["descripcion_evento"];  ?>...

                  </p>

                 
                  <a href="#" class="btn btn-lg btn-default btn-animated">Conoce más <i class="fa fa-cart-arrow-down pl-20"></i></a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6 col-md-push-6">
                  <img class="pv-30" src="images/section-image-2.png" alt="">   
                </div>
                <div class="col-md-6 col-md-pull-6">
                  <h2>You Will Love It!</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa facere possimus, inventore ipsam at autem! Necessitatibus aliquam qui itaque quasi, laborum fugit? Eos minima quasi aperiam, incidunt dolores aliquid neque!</p>
                  <ul class="list-icons">
                    <li><i class="icon-check-1"></i> Extremly Simple to Use</li>
                    <li><i class="icon-check-1"></i> Customize it in no time</li>
                    <li><i class="icon-check-1"></i> Unlimited options and variations</li>
                    <li><i class="icon-check-1"></i> We are here to support you</li>
                  </ul>
                  <p>Libero cum iusto doloribus officiis delectus alias consectetur ullam, animi totam assumenda, ad earum quis non nostrum placeat provident dolores ratione similique!</p>
                  <a href="#" class="btn btn-lg btn-default btn-animated">Purchase <i class="fa fa-cart-arrow-down pl-20"></i></a>
                </div>
              </div>
            </div>
            <!-- main end -->

          </div>







            
          </div>
        </div>
      </section>





















      