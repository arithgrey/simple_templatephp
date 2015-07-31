<link href="<?=base_url('application/tema/plugins/rs-plugin/css/settings.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/owl-carousel/owl.transitions.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<script type="text/javascript" src="<?=base_url('application/tema/plugins/modernizr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/owl-carousel/owl.carousel.js')?>"></script>

<script type="text/javascript" src="<?=base_url('application/tema/js/template.js')?>"></script>


<?=$img_first?>
<?=$img_second?>
    
        
    <div class="banner clearfix">
      <div class="slideshow">          
          <div class="slider-banner-container">
            <div class="slider-banner-fullscreen">
              <ul class="slides">
                <!-- slide 1 start -->
                <!-- ================ -->





<li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="La experiencia">                
<img src="<?=$img_first;?>" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">
                
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
                  data-endspeed="400"><?=$evento["fecha_inicio"]?>  al <?=$evento["fecha_termino"]?>
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
                  <span class="icon large circle"><i class="circle fa fa-play-circle-o"></i></span>
                </div>

                <!-- LAYER NR. 6 -->
                <div class="tp-caption sfl fadeout"
                  data-x="center"
                  data-y="210"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="2500"
                  data-end="5500"><span class="icon large circle"><i class="circle fa fa-line-chart"></i></span>
                </div>

                <!-- LAYER NR. 7 -->
                <div class="tp-caption sfr fadeout"
                  data-x="center"
                  data-y="210"
                  data-hoffset="232"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="4000"
                  data-end="5500"><span class="icon large circle"><i class="circle fa fa-globe"></i></span>
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
                  <?=$evento["descripcion_evento"]?>
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




<li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="<?=$evento['nombre_evento'];?>  <?=$evento['fecha_inicio']?> - <?=$evento['fecha_termino']?>">                
<img src="<?=$img_second?>" alt="slidebg2" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">

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
                  data-end="10000"><span class="logo-font">La mejor experiencia</span> <br> 
                  a tu alcance                   
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
                  data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="fa fa-tablet"></i>
</span>La experiencia
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption sfb fadeout text-left medium_white"
                  data-x="left"
                  data-y="320" 
                  data-speed="500"
                  data-start="1900"
                  data-easing="easeOutQuad"
                  data-endspeed="600">
                  <span class="icon default-bg circle small hidden-xs"><i class="fa fa-pie-chart"></i>
                </span>Adquiere ahora.!
                </div>
              
            
          </li>




















             </ul>

            </div>
          </div>
        </div>
      </div>




<!--*************************************************** *************************************+-->




















































<section class="pv-30 light-gray-bg clearfix">
        <div class="container">
          <h3 class="title logo-font text-center text-default"><?=$evento["nombre_evento"]?></h3>
          <div class="separator"></div>
          <p class="text-center"><?=$evento["descripcion_evento"]?></p>
          <br>
          <div class="row grid-space-10">
            <div class="col-sm-6 col-md-3">
              <div class="pv-30 ph-20 white-bg feature-box bordered text-center">
                <span class="icon default-bg circle"><i class="fa fa-plus-square"></i></span>
                <h3>Since 1930</h3>
                <div class="separator clearfix"></div>
                <p>Voluptatem ad provident non repudiandae beatae cupiditate amet reiciendis lorem ipsum dolor sit amet, consectetur.</p>
                <a href="#" class="btn btn-default btn-animated">Read More <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="pv-30 ph-20 white-bg feature-box bordered text-center">
                <span class="icon default-bg circle"><i class="fa fa-hospital-o"></i></span>
                <h3>Apointments</h3>
                <div class="separator clearfix"></div>
                <p>Iure sequi unde hic. Sapiente quaerat sequi inventore veritatis cumque lorem ipsum dolor sit amet, consectetur.</p>
                <a href="#" class="btn btn-default btn-animated">Make An Apointment <i class="pl-5 fa fa-stethoscope"></i></a>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="pv-30 ph-20 default-bg feature-box bordered text-center">
                <span class="icon dark-bg circle"><i class="fa fa-ambulance"></i></span>
                <h3>Emergency Calls</h3>
                <div class="separator clearfix"></div>
                <p>Inventore dolores aut laboriosam cum consequuntur delectus sequi lorem ipsum dolor sit amet, consectetur.</p>
                <a href="#" class="btn btn-default btn-animated">Call Us <i class="pl-5 fa fa-phone"></i></a>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="pv-30 ph-20 white-bg feature-box bordered text-center">
                <span class="icon default-bg circle"><i class="glyphicon glyphicon-time"></i></span>
                <h3>Opening Hours</h3>
                <div class="separator-2 mt-20 clearfix"></div>
                <ul class="list-unstyled small list-icons text-left">
                  <li><strong class="text-default">Monday - Friday</strong> <span class="pull-right">8.00 - 18.00</span></li>
                  <li><strong class="text-default">Saturday</strong> <span class="pull-right">9.00 - 16.30</span></li>
                  <li><strong class="text-default">Sunday</strong> <span class="pull-right">9.30 - 16.00</span></li>
                </ul>
                <div class="separator-3 mt-20 clearfix"></div>
                <p class="small text-default">Lorem ipsum dolor sit amet, consectetur.</p>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="full-width-section">
        <div class="full-image-container light-gray-bg">
          
          <h3>Servicios incluidos</h3>
          <!--aquí  el mapa  de google -->
          <img class="to-right-block" src="<?=$img_second;?>" alt="">
          <div class="full-image-overlay text-right">
           
            <ul class="list-icons">

              <?=$servicios_evento;?>
            </ul>
          </div>
        </div>
        <div class="full-text-container light-gray-bg">
          <h3 class="logo-font"><span class="text-muted"></span> <span class="text-default"> acceder al evento</span></h3>
          <div class="separator-2 visible-lg"></div>
          <p><?=$evento["restricciones"]?></p>

          <p>
          </p>
          <div class="separator-3 visible-lg"></div>
        </div>
      </section>























<div class="dark-bg  default-hovered footer-top animated-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="call-to-action text-center">
                <div class="row">
                  <div class="col-sm-8">
                    <h2>Accesos al evento</h2>
                    <h2>Increibles precios</h2>
                  </div>
                  <div class="col-sm-4">
                    <p class="mt-10"><a href="<?=base_url('index.php/eventos/puntosventa?evento='.$idevento)?>" class="btn btn-animated btn-lg btn-gray-transparent ">Puntos de venta<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>