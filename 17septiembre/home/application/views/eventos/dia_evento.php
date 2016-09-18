<?=template_evento($evento["nombre_evento"] ,  $evento["idevento"])?>
<div>          
  <ul class="nav nav-pills"> 
    <li class='tab_escenario pull-left' href="#seccion-principal-info"  role="tab" data-toggle="tab">
      <strong>     
        <a class='tab_enid'>
            Los servicios
        </a>
      </strong>     
    </li>
    <?=btn_comunidad($evento["idempresa"])?>    
    <li class='tab_accesos tab_enid pull-right'>
      <span>             
        <a class='text_link_accesos_enid' href="<?=base_url('index.php/eventos/accesosalevento'). "/" . $evento["idevento"]?> " >
          Accesos 
        </a>                
      </span>
    </li>     
    <li class='load_resumen_escenarios_event  pull-right'>
      <span>             
        <a href="#section_dinamic_escenarios" role="tab" data-toggle="tab" class='tab_enid'>
          Artistas y escenarios 
        </a>
      </span>               
    </li>
  </ul>
</div>

<div  class="tab-content" >
  <div class="tab-pane active" id="seccion-principal-info">
    <section  class='seccion-principal-info'>
      <?=$this->load->view("eventos/principal_dia_evento")?>
    </section>
  </div>
  <div class="tab-pane" id="section_dinamic_escenarios">      
    <section> 
      <div class='resumen_escenarios' id='resumen_escenarios'>
      </div>
    </section>  
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





<style type="text/css">
  .eslogan_evento{
    background: #232c2d;
    font-size: .9em;
    padding: 10px;
    color: #fffdfd;
  }.eslogan_evento .fa-cog{
    color: white !important; 
  }.especificaciones{
    //background: #3C5E79;
  }.dias_restantes{
    font-size: 2em; 
    font-weight: bold;
  }
  .table_objs_permitidos{
    width: 100%;
  }
  .table_objs_permitidos td {
    font-size:  .8em;
  }
  .seccion_table_objs{
    height: 100px;
  }
  .seccion_table_objs_scroll{
    overflow-y:scroll;
  }
  .listado-contente-enid{
    background: whitesmoke;   
  } 
  .blocke-par{
    margin-top: 10px;
    //background: #f9f9f9;   
  }
  .btn-text-msj-user , .text-msj-user{  
    display: inline-block;
  }
  .principal-objs{
    margin-top: 10px;
  }
   /*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px){    
    /*Termina  media query*/
    .servicios-mov{
      display: none;
    }
  }

  </style>
