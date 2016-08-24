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