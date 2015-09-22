<script type="text/javascript" src="<?=base_url('application/js/usuarios/principal.js')?>"></script>

<div class='row'>
    <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12 centered">
        <section class="panel">
            <header class="panel-heading">                     
                <button id="nuevo-contacto-button" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-check"></i>nuevo integrante de la cuenta
                </button>        
            </header>    


            <div class='row'>
                <div class="input-group pull-right col-md-3">
                    <div class="input-group-addon">Contacto </div>
                    <input list="integrantes-list" id="integrantes-l" class='integrantes-l form-control' >    
                    <?=$integrantes_filtro;?>        
                </div>        
            </div>



            <div class='integrantes-table-info' id="integrantes-table-info">
                <?=$integrantes;?>                             
            </div>
    </div>
</div><!--Termina row-->































<!--********************************************************************************************+***** -->
 <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" 
        id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Registrar nuevo integrante</h4>
                    </div>
                    <div class="modal-body">
                        <p>Ingresa su mail y la información de su 
                          cuenta junto con la contraseña será enviada
                          al correo de la persona
                        </p>
                    <form method="post" id="form_new_user" >   

                          <div class="input-group">     
                            <span class="input-group-addon" id="basic-addon1">Nombre</span>
                            <input class="form-control" placeholder="Jonathan" aria-describedby="basic-addon1" id="nombre" name="nombre" type="text">
                          </div>     
                         <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">@</span>
                          <input type="mail" name='mail_newuser' id="mailnewcontact" 
                           class="form-control" 
                          placeholder="Email de la persona a quien quieres invitar a tu cuenta" 
                          aria-describedby="basic-addon1">
                        </div>
 
                  

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Perfil</span>
                            <select id="newperfil" class='form-control m-bot15' name="newperfil">
                                <option value='4'>Administrador de cuenta</option>
                                <option value='5' >Estratega digital</option>
                                <option value='6'>Director de la empresa</option>
                                
                            </select>
                        </div>
                        


                        <br>
                        <div class='well' id="clientresponse"></div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                        <button class="btn btn-primary sednewsolicitud" type="button">Enviar</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- modal -->


