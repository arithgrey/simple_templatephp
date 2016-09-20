<?=template_evento($data_evento["nombre_evento"] ,  $data_evento["idevento"]   ,  $data_evento["idempresa"])?>

<ul class="nav nav-pills"> 
    <li class='pull-left  active tab_enid '>
      <span  href="#tab_accesos" role="tab" data-toggle="tab" >                     
        <strong>
            Accesos
        </strong>         
      </span>
    </li>        
    <li class='tab_puntos_venta tab_enid pull-right dinamic_menu_pv'>
      <span  href="#tab_puntos_venta" role="tab" data-toggle="tab" >                              
        Puntos de venta     
      </span>
    </li>    
    <a href="<?=base_url('index.php/eventos/diaevento')?>/<?=$data_evento["idevento"]?>">
        <li class='tab_enid pull-right '>
          <span >                              
            Servicios
          </span>
        </li>    
    </a>

</ul>

<!--Contenido -->
<div>
  <div class="tab-content clear-style">
    <div class=" tab-pane active " id="tab_accesos">
        <section id='section-slider' class='section-slider'>
        <?=$this->load->view('accesos/principal_public');?>
        </section>
    </div>        
    <div class="tab-pane " id="tab_puntos_venta">
        <?=$this->load->view("accesos/info_user_puntos_venta")?>                                                                                                   
    </div>
  </div> 
</div>
<input type='hidden' class='empresa' value='<?=$data_evento["idempresa"]?>'>
<input type='hidden' class='id_empresa' value='<?=$data_evento["idempresa"]?>'>



<input type='hidden' class='evento' value='<?=$data_evento["idevento"]?>'>
<input type='hidden' class='id_evento' value='<?=$data_evento["idevento"]?>'>

<input type='hidden' class='evento_escenario' value='<?=$data_evento["idevento"]?>'>
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal_cliente.js')?>"></script>


<?=$this->load->view("reglas/modal/asistencia");?>
<style type="text/css">
.contenedor_puntos_venta{
    background: rgb(22, 103, 129);    
}#puntos-venta{
    color: white !important;
}.dias_restantes,.la_experiencia{
    font-size: 2em;
    font-weight: bold;
}.accesos_seccion{
    background:#fafbf6;
}.accesos_seccion_contenedor{
    width: 90%;
    margin: 0 auto;
}.acceso_listado{
    background: white;
}.btn_more_accesos{
    margin-top: 2px;
    margin-left: 2%;
}.contenedor-config{
  text-align: right;
}.seccion-p-accesos , .seccion-p-puntos-venta{
    margin-top: 10px;
}.link-to-info , .link-to-admin{
    display: inline-block;
    text-align: right;
}.nuevo-pv-text , .nuevo-pv-btn{
    display: inline-table;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
