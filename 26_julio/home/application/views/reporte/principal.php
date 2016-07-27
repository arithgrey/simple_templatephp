
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
                <?=$this->load->view("reporte/resumen_comunidad")?>
            </div>
            <div class="tab-pane fade" id="faq-cat-4">
                ok movimietos
            </div>
    	</div>
  	</div>       
</div>
