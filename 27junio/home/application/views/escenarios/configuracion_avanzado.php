<?=$this->load->view('escenarios/otros_escenarios')?>
<div>          
  <ul class="nav nav-pills" role="tablist">
    <li class="active">
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/nuevo')?>/<?=$data_escenario["idevento"]?>">
        <i class='fa fa-star'>
        </i>     
        <?=$nombre_evento?>        
      </a>
    </li>    
    <li class='artistas-btn'>
      <a   aria-expanded="false" href="#pill-1" role="tab" data-toggle="tab" title="Top Sellers">
        <i class=" icon-up-1">
        </i> 
        Escenario
      </a>
    </li>
    <li class='artistas-btn'>
      <a   aria-expanded="false" href="#pill-3" role="tab" data-toggle="tab" title="Top Sellers">
        <i class=" icon-up-1">
        </i> 
        Artistas 
      </a>
    </li>
    <!---->
    <li>    
      <a href="<?=base_url('index.php/escenario/inevento')?>/<?=$id_escenario;?>/<?=$data_escenario["idevento"]?>" >
        <i class="fa  fa-arrow-circle-o-right"> 
        </i>     
        Ver como el público    
      </a>
    </li>
  </ul>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
      <?=$this->load->view("escenarios/config_escenario");?>
    </div>
    <div class="tab-pane" id="pill-3">
        <?=$this->load->view("escenarios/config_artistas");?>
    </div>    
  </div>            
</div>





<!--Cargamos los modal de configuración ***********-->
<?=$this->load->view("escenarios/modal/escenario_avanzado")?>
<!--Terminamos de cargar los modal de configuración ***********-->

<input type='hidden' name='evento' id='evento' class='evento' value="<?=$data_escenario['idevento'];?>"> 
<input type='hidden' name='nombre_evento' id='nombre_evento' value="<?=$nombre_evento?>"> 
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$data_escenario['idescenario'];?>">
<!---->
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>


<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<!--pickers css-->
<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/img.js')?>"></script>





<style type="text/css">
.nombre-escenario-text:hover, .descripcion-escenario-text:hover {
    cursor: pointer;    
}.section-descripcion-escenario-in, .section-nombre-evento-in {
    display: none;
}#img-button-more-imgs:hover{
    cursor: pointer;
    font-size: 1.1em;    
}.section-fecha-type{
    background: #062735;
}.section-input{
    display: none;
}.nombre-escenario-text{
    color:  black;
}.title_main{
    display: none;
}.alert-ok-sm , .alert-fail-sm , .alert-ok , .alert-fail {
    display: none;
}.artistas-inputs:hover{
    cursor: pointer;
}.img-artista-evento{
    width: 150px; 
    height:150px;
}.img-artista-evento:hover{
    cursor: pointer;
}


</style>











<style type="text/css">
.descripcion-nota-section{
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
.nota-articulo:hover .descripcion-nota-section{
    filter: alpha(opacity=80);
    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
}
.section-header-title{
    display: none;
}
.nombre-escenario-text{
    font-size: 4em;
}
.nombre-escenario-text:hover{
    cursor: pointer;
}
.status-confirmacion:hover{
    cursor: pointer;
}
</style>



