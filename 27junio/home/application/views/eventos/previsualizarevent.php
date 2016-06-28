
<ul class="nav nav-pills" role="tablist">
    <li class="active">
      <a aria-expanded="true" href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals">
        <i class='fa fa-star'>
        </i>     
        <?=$evento["nombre_evento"]?>
      </a>
    </li>
    <li class='load_resumen_escenarios_event'>
      <a aria-expanded="true" href="#section_dinamic_escenarios" role="tab" data-toggle="tab" title="Latest Arrivals">
        
        Artistas y escenarios 
      </a>
    </li>


    <li>
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/accesosalevento'). "/" . $evento["idevento"]?>  " >
             
        Precios y promociones
      </a>
    </li>



    <li>
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/diaevento/'). "/" . $evento["idevento"]?>  " >
           
        Servicios 
      </a>
    </li>


    <?=editar_btn($in_session , base_url('index.php/eventos/nuevo')."/" . $evento["idevento"] ); ?>
</ul>

<!--Las secciones  -->
<div class='container'>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
          <?=$this->load->view("eventos/principal_slider");?>        
        </section>
    </div>
    <div class="tab-pane" id="section_dinamic_escenarios">
        <?=$this->load->view("eventos/principal_resumen_escenarios")?>
    </div>    

    
  </div> 
</div>






  


















































<input type='hidden' class='evento_escenario' value="<?=$evento["idevento"]?>">

<!--***********************************TERMINA SERVICIOS MODAL  *************************-->
<script type="text/javascript" src="<?=base_url('application/tema/plugins/modernizr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/owl-carousel/owl.carousel.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/js/template.js')?>"></script>
<script type="text/javascript">

  $('#myCarousel').carousel({
        interval:   4000
    });  
  var clickEvent = false;
  $('#myCarousel').on('click', '.nav a', function() {
      clickEvent = true;
      $('.nav li').removeClass('active');
      $(this).parent().addClass('active');    
  }).on('slid.bs.carousel', function(e) {
    if(!clickEvent) {
      var count = $('.nav').children().length -1;
      var current = $('.nav li.active');
      current.removeClass('active').next().addClass('active');
      var id = parseInt(current.data('slide-to'));
      if(count == id) {
        $('.nav li').first().addClass('active');  
      }
    }
    clickEvent = false;
  });

</script>


<style type="text/css">
.section-header-title{
    display: none;
  }

</style>
<?=ini_set('display_errors', '1');?>