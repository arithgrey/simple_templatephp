<div class="container">       
	<div class="">
    	<!-- Nav tabs category -->
    	<ul class="nav nav-tabs faq-cat-tabs">
        	<li class="active">
         	<a href="#faq-cat-1" data-toggle="tab">
                <i class="fa fa-home" aria-hidden="true">
                </i>
         	</a>
        	</li>
        	<li class='carga_resumen_eventos'>
	         	<a href="#faq-cat-2"  data-toggle="tab">
	                <i class="fa fa-line-chart" aria-hidden="true"></i>
                    eventos 
	         	</a>
        	</li>
            <li class='carga_resumen_cominidad'>
                <a href="#faq-cat-3"  data-toggle="tab">
                    La comunidad
                </a>
            </li>

            <li class='carga_resumen_solicitudes'>
                <a href="#solicitudes-artistas"  data-toggle="tab">
                    Lo que la gente quiere
                </a>
            </li>


            <li class='carga_resumen_movimientos'>
                <a href="#faq-cat-4"  data-toggle="tab">
                    Últimos movimientos
                </a>
            </li>
    	</ul>    
    	<!-- Tab panes -->
    	<div class="tab-content faq-cat-content">
        	<div class="tab-pane active in fade" id="faq-cat-1">  
        		<?=$this->load->view("reporte/bienvenida");?>
        	</div>
        	<div class="tab-pane fade" id="faq-cat-2">
                <?=$this->load->view("reporte/admin_eventos")?>
        	</div>

            <div class="tab-pane fade" id="faq-cat-3">
                <div class='place_comentarios'>
                </div>
                <div class='place_comentarios_comunidad'>
                </div>           
            </div>

            <div class="tab-pane fade" id="solicitudes-artistas">
                <div class='place_solicitudes_artistas'>
                </div>
            </div>

            <div class="tab-pane fade" id="faq-cat-4">
                <div class='place_ultimos_movimientos'>
                </div>                
            </div>
    	</div>
  	</div>       
</div>

<input type='hidden' value='nombre_empresa' id='<?=$data_empresa["nombreempresa"]?>' class='nombre_empresa'>
<script type="text/javascript" src="<?= base_url('application/js/reportes/principal_home.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/reportes/resumen_cominidad.js')?>"  ></script>
<input type='hidden' class='id_empresa' value="<?=$id_empresa;?>">
<style type="text/css">
    .title {
        font-size: 3em;
        font-weight: 700;       
        text-align: center;
    }   
    .mostrar-abreviaturas:hover ,  .ocultar-abreviaturas:hover{
        padding: 1px;
        cursor:pointer;
    }
    .botonExcel{
        cursor: pointer;
    }
    .section-header-title{
        display: none;
    }
    .f_busqueda:hover{
        cursor: pointer;
    }
</style>