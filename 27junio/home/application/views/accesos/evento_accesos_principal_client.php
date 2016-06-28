
<ul class="nav nav-pills" role="tablist" >
    <li class="active">
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/visualizar/'). '/' . $data_evento["idevento"] ?>" >
        <i class='fa fa-star'>
        </i>     
        <?=$data_evento["nombre_evento"]?>
      </a>
    </li>
    

    
    <li >
      <a aria-expanded="true" href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals">
        <i class='fa fa-star'>
        </i>     
        Consigue tus accesos
      </a>
    </li>
    

    
        

    <li class='load_resumen_escenarios_event'>
      <a aria-expanded="true" href="#section_dinamic_escenarios" role="tab" data-toggle="tab" title="Latest Arrivals">
        <i class='fa fa-star'>
        </i>     
        Artistas y escenarios 
      </a>
    </li>


    <li>
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/diaevento/'). "/" . $data_evento["idevento"]?>  " >
        <i class='fa fa-star'>
        </i>     
        Servicios 
      </a>
    </li>
    <?=editar_btn($in_session , base_url('index.php/accesos/configuracionavanzada/1/' . $data_evento['idevento']) ); ?>
</ul>


<div class='container'>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
        <?=$this->load->view('accesos/principal_public');?>
        </section>
    </div>
    <div class="tab-pane" id="section_dinamic_escenarios">
        <?=$this->load->view("eventos/principal_resumen_escenarios")?>
    </div>        
  </div> 
</div>


































<input type='hidden' class='evento_escenario' value='<?=$data_evento["idevento"]?>'>
<!---CARGAMOS MODALS -->
<?=$this->load->view("accesos/modal/view_user.php")?>
<!---TERMINAMOS DE CARGAR  MODALS -->
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal_cliente.js')?>"></script>
<style>
    .title_main{
        display: none;
    }
    .web_link{
        color: #F6D314 !important;
    }
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

        .form_hover .blur {
            height: 240px;
            z-index: 5;
            position: absolute;
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
</style>
<script type="text/javascript">
    $(document).on("ready" , function(){

    	$(".action_animate").click(function(){
    		$('.action_animate').addClass('animated zoomIn');
    	});
    });
</script>

