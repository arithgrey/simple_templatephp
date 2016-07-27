<?=$this->load->view('escenarios/otros_escenarios')?>
<div class='menu_seleccion_enid'>          
  <ul class="nav nav-pills" role="tablist">
    <li class='tab_nombre'>
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/nuevo')?>/<?=$data_escenario["idevento"]?>">
        <i class='fa fa-star'>
        </i>     
        <?=$evento["nombre_evento"]?>        
      </a>
    </li>    
    <li class='artistas-btn active tab_escenario'>
      <a   aria-expanded="false" href="#pill-1" role="tab" data-toggle="tab" title="Top Sellers">
        <i class=" icon-up-1">
        </i> 
        Escenario - <?=$data_escenario["nombre"]?>
      </a>
    </li>
    <li class='artistas-btn tab_artistas'>
      <a   aria-expanded="false" href="#pill-3" role="tab" data-toggle="tab" title="Top Sellers">
        <i class=" icon-up-1">
        </i> 
        Artistas 
      </a>
    </li>    
    <li >    
      <a href="<?=base_url('index.php/escenario/inevento')?>/<?=$data_escenario['idescenario'];?>/<?=$data_escenario["idevento"]?>" >
        <i class="fa  fa-arrow-circle-o-right"> 
        </i>     
        Ver como el público    
      </a>
    </li>
  </ul>
</div>






<div class='contenidos_escenario'>
    <div class="tab-content">
        <div class="tab-pane tab_escenario active" id="pill-1">
            <?=$this->load->view("escenarios/config_escenario");?>
        </div>
        <div class="tab-pane tab_artistas" id="pill-3">
            <?=$this->load->view("escenarios/config_artistas");?>
        </div>    
    </div>            
</div>




<!--Cargamos los modal de configuración ***********-->
<?=$this->load->view("escenarios/modal/escenario_avanzado")?>
<!--Terminamos de cargar los modal de configuración ***********-->
<input value="<?=$data_escenario["nombre"];?>" class='nombre_escenario' type='hidden'>
<input type='hidden' name='evento' id='evento' class='evento' value="<?=$evento['idevento'];?>"> 
<input type='hidden' name='nombre_evento' id='nombre_evento' value="<?=$evento['nombre_evento']?>"> 
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$data_escenario['idescenario'];?>">
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>
<input type='hidden' name='q' class='qparam' value="<?=$q?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/img.js')?>"></script>

<style type="text/css">
.nombre-escenario-text:hover, .descripcion-escenario-text:hover {
    cursor: pointer;    
}.section-descripcion-escenario-in, .section-nombre-evento-in {
    display: none;
}.section-fecha-type{
    background: #062735;
}.section-input{
    display: none;
}.title_main{
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
<!--Todo lo que es nuevo -->
<style type="text/css">
    .contenedor_slider_imgs{
    background:  rgb(54, 70, 84);   
    }.f_escenario:hover{
        cursor: pointer;
        text-decoration: none;
    }.img-button-more-imgs{
        margin-left: 1%;
    }.seccion-descripcion-escenario{
        
        font-size: .9em;
        padding: 10px;
    }.experiencia_title{
        font-size: 2em;
        font-weight: bold;
    }#img-button-more-imgs:hover{
        cursor: pointer;
    }
    .config_general{
        background: #e5f3f7;
    }
    .activa_focus{
        background: red;
    }
</style>