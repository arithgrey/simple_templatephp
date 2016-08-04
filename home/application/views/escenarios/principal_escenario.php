<div class='menu_seleccion_enid'>          
  <ul class="nav nav-pills" role="tablist">
    <li>
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/visualizar')?>/<?=$evento["idevento"];?>" >
        <i class='fa fa-star'>
        </i>     
       	<?=$evento["nombre_evento"];?>
      </a>
    </li>         
    
    <li class='active'>
      <a aria-expanded="true"  >        
        Escenario - <?=$escenario["nombre"]?>
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


    <?=btn_comunidad($evento["idempresa"])?>
   	<?=editar_btn($in_session , base_url('index.php/escenario/configuracionavanzada/')."/" . $escenario["idescenario"] ); ?>
  </ul>            
</div>








<div>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
         <?=$this->load->view("escenarios/principal_escenario_public")?>
        </section>
    </div>
    <div class="tab-pane" id="section_dinamic_escenarios">
        <?=$this->load->view("eventos/public/principal_resumen_escenarios")?>
    </div>    
  </div> 
</div>

























	

<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link href="<?=base_url('application/tema/fonts/fontello/css/fontello.css')?>" rel="stylesheet">
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal_cliente.js')?>"></script>

<style>
  #section_escenario_principal{
    background: white !important;
  }
  .section-more-events{
    background: #DEE8EC none repeat scroll 0% 0%;
  }
  .title_main{
        display: none;
  }
  .web_link{
        color: #F6D314 !important;
  }
    .form_hover{
        padding: 0px;
        position: relative;
        overflow: hidden;
        height: 340px;
    }
    .form_hover:hover .header{    	

		background: #020912;
		padding: 10px;
		height: 340px;
		transform: translateY(-170px);
		-webkit-transform: translateY(-170px);
		-moz-transform: translateY(-170px);
		-ms-transform: translateY(-170px);
		-o-transform: translateY(-170px);
    }
    .form_hover img{
        z-index: 4;
    }
    .form_hover .header{
		position: absolute;
		top: 340px;
		-webkit-transition: all 0.3s ease;
		-moz-transition: all 0.3s ease;
		-o-transition: all 0.3s ease;
		-ms-transition: all 0.3s ease;
		transition: all 0.3s ease;
		width: 100%;
    }
	.section-header-title{		
		display: none;
	}  
</style>



  
<style type="text/css">
  .text-descripcion-escenario{
    background: #51d0e0;
      font-size: .9em;
      padding: 10px;
  }
  .text-slogan{
    margin-left: 10px;
  }
  .footer_info_esceneario{
    font-size: .8em;
    color: #0E7DBA;
  }
  .seccion_extra{
    background: #353f48;
    padding: 10px;
  }
  .link_cliente{
    background: #032935;
      padding: 1px;
      border-radius: 1px;
      color: white;
      text-align: center;
  }
  .link_cliente:hover{
    background: #03A9F4;
      color: white;
      text-decoration: none;      
  }    
  .resumen_escenario_desc{
    font-size: .9em;
    color: #364654;
  }
</style>


<style type="text/css">
  .seccion_slider_escenario_enid{
    background:  rgb(54, 70, 84);   
  }
  .dias_restantes{
    margin-bottom: 1%;
    margin-right: 1%;
    color: white;
    background: #E31F56;
    padding: 10px 10px;
    border-radius: 1px;
  }
  .resumen-escenario{
    margin-left: 1%;
    color: white;
  }
</style>
<input type='hidden' id='id_escenario' class='id_escenario' value='<?=$escenario["idescenario"]?>'>
<input type='hidden' id='nombre_escenario' class='nombre_escenario' value='<?=$escenario["nombre"]?>'>
<input type='hidden' class='evento' value="<?=$evento["idevento"];?>">


