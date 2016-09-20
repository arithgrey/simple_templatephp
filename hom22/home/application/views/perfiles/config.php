
<script type="text/javascript" src="<?=base_url('application/js/perfiles/principal_g.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/perfiles/editrecurso_g.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/perfiles/editarpermisos_g.js')?>"></script>
                        
<div class='row'>
  <div class='col-sm-1'></div>
    <section class="panel col-sm-10">
        <header class="panel-heading custom-tab enid-header-table">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#about5">
                        <i class="fa fa-unlock">
                        </i>                        
                        Permisos
                    </a>
                </li>                                
            </ul>
        </header>

        <div class="panel-body panel">
            <div class="tab-content">
                <a  class='pull-right' href="<?=base_url('index.php/recursocontroller/usuarios')?>">
                    <button class='btn  btn-default next-to'>
                        <i class='fa fa-users'>
                        </i> 
                                        Miembros de la cuenta
                    </button>
                </a>
            <!--inicia -->
                <div id="about5" class="tab-pane active">
                    <div id="display_permisos">
                    </div>
                </div>
            <!--Termina   -->
            </div>
        </div>
    </section>
    <div class='col-sm-1'></div>                    
</div>


<!---->
<form id='form_recursos' class='form_permiso' method="GET">
    <input type='hidden' name="recurso" value="Recursos">
</form>                                
<form id='form_perfil' class='form_permiso' method="GET">
<input type='hidden' name="recurso" value="Perfiles">
</form>
<!---->