<div  class='row'>
    <div class='alert-ok' id='alert-plantilla-ok'>
        <em>
            Plantilla registrada correctamente 
        </em>
    </div>
    <div class='alert-fail' id='alert-pllantilla-fail'>
        <em>
            Error al registrar plantilla, reportar al administrador 
        </em>
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12">
    <section class="panel">
        <header class="panel-heading blue-col-enid">
            <i class="fa fa-list">
            </i>
            La experiencia
            <br><button   class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-experiencia">
                + Cargar experiencia 
            </button> 
        </header>
        <div class="blue-col-enid-complement panel-body">                            
            <div style='padding:10px;'>
                
            </div>
            <div class='row'>
                <div class='col-lg-12 col-md-12 col-sm-12'>
                    <div class='list_plantilla_escenario' id='list_plantilla_escenario'></div>
                </div>
            </div>
        </div>
    </section>    
</div>

<?=$this->load->view("plantillas/modal/config_escenario")?>
<script type="text/javascript" src="<?=base_url('application/js/plantillas/plantila_escenario_principal.js')?>"></script>