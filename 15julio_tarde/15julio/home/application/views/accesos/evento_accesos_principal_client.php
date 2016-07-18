<!--Menú-->
<div class='menu_seleccion_enid'>
    <ul class="nav nav-pills" role="tablist">
        <li class="principal_li">
          <a aria-expanded="true" href="<?=base_url('index.php/eventos/visualizar/'). '/' . $data_evento["idevento"] ?>" >
            <i class='fa fa-star'>
            </i>     
            <?=$data_evento["nombre_evento"]?>
          </a>
        </li>
        <li class='dinamic_menu_accesos active'>
          <a aria-expanded="true" href="#pill-1" role="tab" data-toggle="tab" >               
            Lo accesos 
          </a>
        </li>
         <li class='dinamic_menu_pv'>
          <a aria-expanded="true" href="#pill-11" role="tab" data-toggle="tab" >
              
            Puntos de venta
          </a>
        </li>
        <li class='load_resumen_escenarios_event'>
          <a aria-expanded="true" href="#section_dinamic_escenarios" role="tab" data-toggle="tab" title="Latest Arrivals">               
            Artistas y escenarios 
          </a>
        </li>
        <li>
          <a aria-expanded="true" href="<?=base_url('index.php/eventos/diaevento/'). "/" . $data_evento["idevento"]?>  " >               
            Servicios 
          </a>
        </li>
        <?=editar_btn($in_session , base_url('index.php/accesos/configuracionavanzada/1/' . $data_evento['idevento']) ); ?>
    </ul>
</div>
<!--Contenido -->
<div>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
        <?=$this->load->view('accesos/principal_public');?>
        </section>
    </div>    
    <div class="tab-pane" id="section_dinamic_escenarios">  
        <div class='col-lg-8 col-md-8 col-sm-12'>
            <div class='load_resumen_escenario_enid' id='load_resumen_escenario_enid'> 
            </div>
            <div class='resumen_escenarios' id='resumen_escenarios'>
            </div>        
        </div>
        <div class='col-lg-4 col-md-4 col-sm-12'>                        
        </div>    
    </div> 
    <div class="tab-pane" id="pill-11">
        <?=$this->load->view("accesos/info_user_puntos_venta")?>                                                                                                   
    </div>
  </div> 
</div>
<input type='hidden' class='empresa' value='<?=$data_evento["idempresa"]?>'>
<input type='hidden' class='evento' value='<?=$data_evento["idevento"]?>'>
<input type='hidden' class='evento_escenario' value='<?=$data_evento["idevento"]?>'>
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal_cliente.js')?>"></script>
<style>       
.form_hover {
            padding: 0px;
            position: relative;
            overflow: hidden;
            height: 240px;
}
.form_hover:hover .header {
            opacity: 1;
            transform: translateY(-172px);
            -webkit-transform: translateY(-172px);
            -moz-transform: translateY(-172px);
            -ms-transform: translateY(-172px);
            -o-transform: translateY(-172px);
}
.form_hover img {
            z-index: 4;
}
.form_hover .header {
            position: absolute;
            top: 170px;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
            width: 100%;
}
.form_hover .caption-text {
            z-index: 10;
            color: #fff;
            position: absolute;
            height: 240px;
            text-align: center;
            top: -20px;
            width: 100%;
}
.section-header-title, .section-descripcion-evento-complete{
            display: none;
}
.editar_client{
    margin-right: 100px;
    font-size:.8em;
}        
#donde_adquirir , .conoce_historia , .fechas{
    font-size:.8em;    

}
.msj_fechas_evento{
    font-size: 1.5em;    
    text-decoration: none;
}
.msj_fechas_evento:hover{
    text-decoration: none;
}

</style>

