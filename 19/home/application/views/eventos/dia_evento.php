<ul class="nav nav-pills" role="tablist">
    <li class="active">
      <a aria-expanded="true" href="<?=base_url('/index.php/eventos/visualizar'). "/" . $evento["idevento"]?>  " >
        <i class='fa fa-star'>
        </i>     
        <?=$evento["nombre_evento"]?>
      </a>
    </li>

    <li >
      <a aria-expanded="true" href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals">
        <i class='fa fa-star'>
        </i>     
        Servicios
      </a>
    </li>


    <li class='load_resumen_escenarios_event'>
      <a aria-expanded="true" href="#section_dinamic_escenarios" role="tab" data-toggle="tab" title="Latest Arrivals">
        <i class='fa fa-star'>
        </i>     
        Artistas y escenarios 
      </a>
    </li>
    <li>
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/accesosalevento'). "/" . $evento["idevento"]?>  " >
        <i class='fa fa-star'>
        </i>     
        Precios y promociones
      </a>
    </li>
    <?=editar_btn($in_session , base_url('index.php/eventos/nuevo/')."/" . $evento["idevento"] ."#config_data_evento" ); ?>
</ul>





<div class='container'>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
          <?=$this->load->view("eventos/principal_dia_evento")?>
        </section>
    </div>
    <div class="tab-pane" id="section_dinamic_escenarios">
        <?=$this->load->view("eventos/principal_resumen_escenarios")?>
    </div>    
  </div> 
</div>

































<input type='hidden' class='evento_escenario' value="<?=$evento['idevento']?>">
<style type="text/css">
.descripcion-objeto-permitido{
-moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
-webkit-transition:all ease .8s ;
background: black;
color: white;
filter: alpha(opacity=0); /*Opacidad Para IE */
left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
opacity: 0; /*Inicialmente transparente */
padding: 5px;
position: absolute; /*Info sobre la imagen*/
top: 5%;
transition:all ease .8s;
zoom: 1;
}
.objeto-permitido-evento:hover .descripcion-objeto-permiti|{
filter: alpha(opacity=80);
opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
}
.section-header-title{
	display: none;
}
</style>

<input type='hidden' id='idevento' value="<?=$evento["idevento"];?>">
<link href="<?=base_url('application/tema/plugins/rs-plugin/css/settings.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/owl-carousel/owl.transitions.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link rel="stylesheet" type="text/css" href="<?=base_url('application/tema/style-switcher/style-switcher.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/template/css/skins/light_blue.css')?>">
<script type="text/javascript" src="<?=base_url('application/js/evento/client/dia_evento.js')?>"></script>

