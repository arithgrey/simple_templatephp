<div class='menu_seleccion_enid'>
  <ul class="nav nav-pills" role="tablist">
      <li>
        <a aria-expanded="true" href="<?=base_url('/index.php/eventos/visualizar'). "/" . $evento["idevento"]?>  " >
          <i class='fa fa-star'>
          </i>     
          <?=$evento["nombre_evento"]?>
        </a>
      </li>
      <li class='active'>
        <a aria-expanded="true" href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals">
          Servicios
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
      <?=editar_btn($in_session , base_url('index.php/eventos/nuevo/')."/" . $evento["idevento"] ."#config_data_evento" ); ?>
  </ul>
</div>
<div class='container'>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
          <?=$this->load->view("eventos/principal_dia_evento")?>
        </section>
    </div>
    <div class="tab-pane" id="section_dinamic_escenarios">      
        <?=$this->load->view("eventos/public/principal_resumen_escenarios")?>
    </div>    
  </div> 
</div>


<input type='hidden' class='empresa' id='empresa' value="<?=$evento['idempresa']?>">
<input type='hidden' class='evento_escenario' value="<?=$evento['idevento']?>">
<input type='hidden' id='idevento' class='id_evento' value="<?=$evento["idevento"];?>">
<input type='hidden' id='descripcion_permitido' class ='descripcion_permitido' value='<?=$evento["permitido"]?>' >
<input type='hidden' id='descripcion_politica' class ='descripcion_politica' value='<?=$evento["politicas"]?>' >
<input type='hidden' id='descripcion_restriccion' class ='descripcion_restriccion' value='<?=$evento["restricciones"];?>' >
<script type="text/javascript" src="<?=base_url('application/js/evento/client/dia_evento.js')?>">
</script>
