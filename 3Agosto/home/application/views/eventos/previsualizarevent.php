<div class='menu_seleccion_enid'>
  <ul class="nav nav-pills" role="tablist">
    <li class="active">
      <a aria-expanded="true" href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals">
        <i class='fa fa-star'>
        </i>     
        <?=$evento["nombre_evento"]?>
      </a>
    <li>
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/accesosalevento'). "/" . $evento["idevento"]?>  ">           
        Precios y promociones
      </a>
    </li>
    <li>
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/diaevento/'). "/" . $evento["idevento"]?>  " >          
        Servicios 
      </a>
    </li>  

    <?=btn_comunidad(1);?>
    


    <?=editar_btn($in_session , base_url('index.php/eventos/nuevo')."/" . $evento["idevento"] ); ?>                                        
    <?=construye_tipo_evento($evento["tipo"] ,  $in_session , $evento["idevento"])?>
    <?=estado_evento($evento["status"] ,  $in_session , $evento["idevento"] , $evento["programado"])?>  
  </ul>
</div>
<div class='config_tipo animated  ' id='config_tipo'>
  <div class='configuracion_tipo'>
  </div>
  <div class='place_config_tipo'>
  </div>
</div>

<div class='config_estado animated ' id='config_estado'>

    <div class='configuracion_estado'>
    </div>
    <div class='place_config_estado'>
    </div>

</div>

<div>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
          <?=$this->load->view("eventos/public/principal_slider");?>        
        </section>
    </div>
    <div class="tab-pane" id="section_dinamic_escenarios">
        <div class='resumen_escenarios' id='resumen_escenarios'>
        </div>
    </div>        
  </div> 
</div>



<input type='hidden' class='h_programado' value="<?=trim($evento["programado"])?>">   
<input type='hidden' class='h_status' value="<?=trim($evento["status"])?>">   
<input type='hidden'  class='h_ubicacion' value="<?=trim($evento["ubicacion"]);?>">  
<input type='hidden'  class='h_restricciones' value="<?=trim($evento["restricciones"]);?>">
<input type='hidden'  class='h_politicas' value="<?=trim($evento["politicas"]);?>">
<input type='hidden' class='nombre_evento_val' id='nombre_evento_val' value="<?=$evento["nombre_evento"]?>">
<input type='hidden' class='evento_escenario' value="<?=$evento["idevento"]?>">
<input type='hidden' class='evento'  id='evento'  value="<?=$evento["idevento"]?>">
<script type="text/javascript" src="<?=base_url('application/js/evento/public/principal.js')?>">
</script>
<style type="text/css">
  .config_tipo{
    display: none;
    background: #283a42;
    height: 400px;
    margin-top: 41px;
    clear: right;
  }
  .config_estado{ 
    display: none;
    background: #283a42;
    height: 400px;
    margin-top: 41px;
    clear: right; 
  }
  
  
</style>

