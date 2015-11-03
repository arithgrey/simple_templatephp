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





<div class='row' style='margin-top:-20px;'>
<?=$slider_evento_principal;?>
</div>
              




































































<div class='row'>

<section class="section default-bg clearfix blue-col-enid">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="call-to-action text-center">
                <div class="row">
                  <div class="col-sm-8">
                    <h1 class="title" style='color:white  !important;'><?=$evento["eslogan"]?></h1></div>
                  <div class="col-sm-4">
                    
                    <p style="background : #0EC8DE !important;">
                      <a style='color:white !important' href="<?=base_url('index.php/emp/lahistoria')?>" class="btn btn-lg btn-gray-transparent btn-animated">
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








  
<section class="section default-bg clearfix" style='background:  #124048'>
        <div class="container">
          <div class="row">                                                  
              <div class="col-md-12">
                  <h2>TODO A TU ALCANCE</h2>
                  <label><?=$evento["nombre_evento"]?>  edición <?=$evento["edicion"]?></label>
                  <p><?=$evento["descripcion_evento"];  ?></p>

                  <i class='fa fa-calendar'></i> <?=$evento["fecha_inicio"]?> - <?=$evento["fecha_termino"]?>
                  <?=$generos_musicales_tags;?>
              </div>
              <div class="col-md-12" style='color:black; background:white !important;' >                    
                
                <h2  style='color:#1C84A7;'>Escenarios</h2>

                  <div>
                    <?=$escenarios;?>
                  </div>
                </div>
            
                     
          </div>
        </div>
</section>


      <div  class="dark-bg  default-hovered footer-top animated-text content-enid-sec">
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


 





<div class="row">      
  <br>
<center>
    <div class='col-md-4'> 
          <div class='row'>
            <a href="<?=base_url('index.php/eventos/diaevento/' ).'/'.$evento["idevento"]?>">                        
              <span class="icon circle small default-bg"><i class="fa fa-check"></i></span>                        
              <br>
              Lo permitido          
            </a>
          </div>
          <div class='row'>
            <div class='col-md-1'> </div>
            <div class='col-md-10'> 
            <?=substr($evento["permitido"], 0 , 350); ?>
            </div>
            <div class='col-md-1'> </div>
          </div>
    </div>      
    <div class='col-md-4'>  
          <div class='row'>
            <a href="<?=base_url('index.php/eventos/diaevento/').'/'.$evento["idevento"]?>">                        
            <span class="icon circle small default-bg"><i class="fa fa-circle"></i></span>                          
            <br>
            Politicas
            </a> 
          </div>
          <div class='row'>
            <div class='col-md-1'> </div>
            <div class='col-md-10'> 
              <?=substr($evento["politicas"],  0 , 350); ?>
            </div>
            <div class='col-md-1'> </div>
          </div>
    </div>  
    <div class='col-md-4'> 
        <div class='row'>
          <a href="<?=base_url('index.php/eventos/diaevento/').'/'.$evento["idevento"]?>">                        
          <span class="icon circle small default-bg"><i class="fa fa-exclamation-triangle"></i></span> 
          <br>
            Lo prohibido                     
          </a>  
        </div>            
        <div class='row'>
          <div class='col-md-1'> </div>
          <div class='col-md-10'> 
            <?=substr($evento["politicas"],  0 , 350); ?>
          </div>                 
          <div class='col-md-1'> </div>
        </div>
    </div>    
</center>                  
</div>




</div><!--Termina el row principal-->
</div>
<!--***********************************INICIA SERVICIOS MODAL  *************************-->
<?php $this->load->view("eventos/modal_config_event_template");?>
<!--***********************************TERMINA SERVICIOS MODAL  *************************-->


<script type="text/javascript" src="<?=base_url('application/tema/plugins/modernizr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/owl-carousel/owl.carousel.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/js/template.js')?>"></script>

