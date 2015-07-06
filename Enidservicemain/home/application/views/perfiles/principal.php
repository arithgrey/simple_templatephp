<?=link_tag('application/css/perfiles/principalperfiles.css')?>     
<script type="text/javascript" src="<?=base_url('application/js/perfiles/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/perfiles/editrecurso.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/perfiles/editarperfil.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/perfiles/registro.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/perfiles/editarpermisos.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/perfiles/editperfilrecurso.js')?>"></script>
                 
<div class="modal fade" id="modaldeleteperfilrecurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class='danger_icon' src="<?=base_url('application/img/general/warning9.png')?>">Advertencia</h4>
      </div>
      <div class="modal-body">
        <h3>Alerta</h3>
        <span>Si elimina el permiso los perfiles dejarán de tener acceso a los diversos módulos</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id='deleteconformbtnpermiso' class="btn btn-primary">Continuar</button>
      </div>
    </div>
  </div>
</div>












<div class="modal fade" id="modaldeleteperfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class='danger_icon' src="<?=base_url('application/img/general/warning9.png')?>">Advertencia</h4>
      </div>
      <div class="modal-body">
        <h3>Alerta</h3>
        <span>Si elimina el perfil también borrará los permisos que se hayan asignado al perfil previamente</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id='deleteconformbtnperfil' class="btn btn-primary">Continuar</button>
      </div>
    </div>
  </div>
</div>











<!-- Modal Recurso --><!-- Modal Recurso --><!-- Modal Recurso --><!-- Modal Recurso --><!-- Modal Recurso -->
<div class="modal fade" id="modaldeleterecurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class='danger_icon' src="<?=base_url('application/img/general/warning9.png')?>">Advertencia</h4>
      </div>
      <div class="modal-body">
        <h3>Alerta</h3>
        <span>Si elimina el recurso también borrará los permisos que se hayan asignado al perfil previamente</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id='deleteconformbtn' class="btn btn-primary">Continuar</button>
      </div>
    </div>
  </div>
</div>


















                        

<div class='row'>

  <div class='col-sm-1'></div>
                    <section class="panel col-sm-10">
                        <header class="panel-heading custom-tab enid-header-table">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#about5">
                                        <i class="fa fa-unlock"></i>
                        
                                        Permisos
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#contact5" id="perfiles_section">
                                        <i class="fa fa-list-alt"></i>

                                        Roles
                                    </a>
                                </li>
                            </ul>
                        </header>



                        <div class="panel-body panel">
                            <div class="tab-content">
                            <!--inicia -->
                                <div id="about5" class="tab-pane active">
                                    <div id="display_permisos"></div>
                                </div>
                                <!--inicia-->
                                <div id="contact5" class="tab-pane">
                                  <div id="display_perfiles"></div>
                                </div>
                            </div>
                        </div>
                    </section>


    <div class='col-sm-1'></div>                    

</div>
                                    <form id='form_recursos' class='form_permiso' method="GET">
                                      <input type='hidden' name="recurso" value="Recursos">
                                    </form>
                                   



                                  <form id='form_perfil' class='form_permiso' method="GET">
                                    <input type='hidden' name="recurso" value="Perfiles">
                                  </form>