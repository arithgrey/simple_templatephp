<!--*****************************EDITAR LOS PERFILES DEL USUARIO INICIA  **************************-->
<div aria-hidden="true" aria-labelledby="edit-usuario-perfil" role="dialog" tabindex="-1"  id="edit-usuario-perfil" class="modal fade">
    <div class="modal-dialog modal-lg  ">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                      <h4 class="modal-title"  id='modal-title-user'>
                          Editar datos del integrante 
                      </h4>           
                </div>                    
                <div class="modal-body">                        
          <!--******************* **************************************** **************-->
          <div class=''>
              <em class='response-update-insert' id="response-update-insert">
              </em>
              <form class="form-horizontal" id="form-integrante-edicion" action="<?=base_url('index.php/api/user/miembro/format/json/')?>">
                  <input type='hidden' name='idusuario' id='id_usuario' class='idusuario' value='0'> 
                  <input type='hidden' name="id_empresa" id="id_empresa" class='id_empresa' value="<?=$id_empresa;?>">
                  
                  
                      <!-- Prepended text-->
                      <div class="form-group">                      
                        <div class="col-md-6 col-lg-6 col-sm-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              Apellido paterno
                            </span>
                            <input id='apellido_paterno' name="apellido_paterno" class="form-control" placeholder="Primer apellido" type="text">
                          </div>                      
                        </div>                      
                        <div class="col-md-6 col-lg-6 col-sm-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              Apellido materno
                            </span>
                            <input name="apellido_materno"  id="apellido_materno" class="form-control" placeholder="Segundo apellido" type="text">
                          </div>                      
                        </div>
                      </div>
                      <!-- Nombres del usuario -->
                      <div class="form-group">                      
                        <div class="col-md-12 col-sm-12 col-sm-12">
                          <div class="input-group">
                            <span class="input-group-addon">
                              Nombre(s)
                            </span>
                            <input id="nombres" name="nombres" class="form-control" placeholder="Nombre(s) del miembro" type="text" required >
                          </div>                      
                        </div>
                      </div>
                      <!--Termina Nombre del usuario -->
                      <div class="form-group">                      
                        <!--Email. -->    
                        <div class="col-md-4 col-sm-4 col-sm-4" id='email-section'>
                          <div class="input-group">
                            <span class="input-group-addon">
                              Usuario (e-mail) 
                            </span>
                            <input name="email" class="form-control" placeholder="email" type="email" id="email" >
                          </div>                      
                        </div>
                        <div class="col-md-4 col-sm-4 col-sm-4">
                          <div class="input-group">
                            <span class="input-group-addon">
                            E-mail alterno 
                            </span>
                            <input name="email_alterno" id="email_alterno" class="form-control" placeholder="email alterno" type="email">
                          </div>                      
                        </div>
                        <div class="col-md-4 col-sm-4 col-sm-4">
                          <div class="input-group">
                            <span class="input-group-addon">
                              Edad 
                            </span>
                            <?=create_select_edad_form("edad_user")?>                          
                          </div>                      
                        </div>
                      </div>
                      <div class="form-group">                                                                  
                        <div class="col-md-4 col-sm-4 col-sm-4">
                          <div class="input-group">
                            <span class="input-group-addon">
                             Teléfono de contacto 
                            </span>
                            <input name="tel_contacto" class="form-control" placeholder="teléfono de contacto" type="tel">
                          </div>                      
                        </div>
                        <div class="col-md-4 col-sm-4 col-sm-4">
                          <div class="input-group">
                            <span class="input-group-addon">
                             Otro teléfono
                            </span>
                            <input name="tel_contacto_alterno"  id="tel_contacto_alterno" class="form-control" placeholder="teléfono de contacto" type="tel">
                          </div>                      
                        </div>
                        <!--********************** **************************** -->
                        <div class="col-md-4 col-sm-4 col-sm-4">
                          <div class="input-group">
                            <span class="input-group-addon">
                              Estado  del miembro 
                            </span>
                            <select name='estatus_miembro' id="estatus_miembro" class="form-control" >
                              <option value="Usuario Activo">
                                  Usuario Activo
                              </option>
                              <option value="Inactivo">
                                  Inactivo
                              </option>
                              <option value="Baja">
                                  Baja
                              </option>
                            </select>
                          </div>                      
                        </div>
                        <!--********************** **************************** -->
                      </div>
                      <div class="form-group">                                                                  
                        <div class="col-md-4 col-sm-4 col-sm-4">                        
                          <div class="input-group">                        
                             <div class="input-group bootstrap-timepicker">
                                  <span class="input-group-addon">
                                  Inicio de labores
                                  </span>
                                  <input class="form-control timepicker-default" id="inicio_labor" name="inicio_labor" type="text">
                                  <span class="input-group-btn">
                                      <button class="btn btn-default" type="button">
                                          <i class="fa fa-clock-o">
                                          </i>
                                      </button>
                                  </span>
                              </div>
                          </div>                      
                        </div>                                  
                        <div class="col-md-4 col-sm-4 col-sm-4">                       
                          <div class="input-group">                        
                             <div class="input-group bootstrap-timepicker">
                                  <span class="input-group-addon">
                                  Fin de labores
                                  </span>
                                  <input class="form-control timepicker-default" id="fin_labor" name="fin_labor" type="text">
                                  <span class="input-group-btn">
                                      <button class="btn btn-default" type="button">
                                          <i class="fa fa-clock-o">
                                          </i>
                                      </button>
                                  </span>
                              </div>
                          </div>                      
                        </div>                  
                        <div class="col-md-4 col-sm-4 col-sm-4">                
                          <div class="input-group">                        
                             
                                  <span class="input-group-addon">
                                    RFC 
                                  </span>
                                  <input name="rfc" id="rfc" class="form-control" placeholder="RFC" type="text">
                             
                          </div>                      
                        </div>
                      </div>    




                      <div class="form-group">   
                        <div class="col-md-3 col-sm-3 col-sm-3">                
                          <div class="input-group">                                                   
                                <span class="input-group-addon">
                                    Turno
                                </span>
                                <select name='turno' class='form-control' id='turno_user'>
                                  <option value='Matutino'>Matutino</option>
                                  <option value="Vespertino">Vespertino</option>
                                  <option value="Nocturno">Nocturno</option>
                                  <option value="Mixto">Mixto</option>
                                </select>                            
                          </div>                      
                        </div>

                        <div class="col-md-3 col-sm-3 col-sm-3">                
                          <div class="input-group">                                                   
                                <span class="input-group-addon">
                                  Grupo
                                </span>
                                <select name='grupo' class='form-control' id='turno_user'>
                                  <option value="Marketing">Marketing</option>                                
                                  <option value="Audio y video">Audio y video </option>  
                                  <option value="Iluminación">Iluminación</option>
                                  <option value='Calidad'>Calidad</option>
                                  <option value="Venta">Venta</option>
                                  <option value="Escenografía">Escenografía</option>
                                  <option value="Comunicación">Comunicación</option>                                
                                  <option value="Información">Información</option>        
                                  <option value="Seguridad">Seguridad</option>                        
                                </select>                            
                          </div>                      
                        </div>

                        <div class="col-md-3 col-sm-3 col-sm-3">                
                          <div class="input-group">                                                   
                                <span class="input-group-addon">
                                  Cargo
                                </span>
                                <select name='cargo' class='form-control' id='cargo_user'>
                                  <option value="Director">Director</option>
                                  <option value="Director comercial">Director comercial</option>                                
                                  <option value="Director de comunicación">Director de comunicación</option>                                
                                  <option value="Director de tecnología">Director de tecnología</option>
                                  <option value="Coordinador">Coordinador</option>
                                  <option value="Gerente">Gerente</option>                                
                                  <option value="Subdirector">Subdirector</option>                                
                                  <option value="Supervisor">Supervisor</option>                                
                                  <option value="Jefe de operaciones">Jefe de operaciones</option>
                                  <option value="Staff">Staff</option>       
                                  <option value="Staff">Staff de seguridad</option>       
                                  <option value="Otro">Otro</option>                                                                
                                </select>                            
                          </div>                      
                        </div>




                        <div class='col-md-3 col-sm-3 col-sm-3'>
                          <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Perfil</span>
                              <select id="perfil_user" class='form-control m-bot15' name="perfil_user">
                                  <option value='4'>Administrador de cuenta</option>
                                  <option value='5' >Estratega digital</option>
                                  <option value='6'>Director de la empresa</option>                            
                              </select>
                          </div>
                        </div>

                        <div class='col-md-12 col-sm-12 col-sm-12'>
                          <textarea class='form-control' rows="12" name='descripcion'>
                          </textarea>  
                        </div>


                        <div class="col-md-3 col-sm-3 col-sm-3">   
                          <button class='btn btn-default btn_save'>Registrar cambios </button>
                        </div>  
                      </div>  





                  </div>
                  
              </form>
          </div>
                    <!--******************* **************************************** **************-->
                </div>
        </div>
    </div>
</div>

<!--*****************************EDITAR LOS PERFILES DEL USUARIO TERMINA  **************************-->









































<!--********************************************************************************************+***** -->
 <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" 
        id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          &times;
                        </button>
                        <h4 class="modal-title">
                          Registrar nuevo integrante
                        </h4>
                    </div>
                    <div class="modal-body">                    
                    <span class='text-center'>
                      Ingresa su mail y la información de su  cuenta junto con la contraseña será enviada al correo de la persona 
                    </span>
                    <form method="post" id="form_new_user" >   
                      <div>    
                          <div class="input-group">     
                              <span class="input-group-addon" id="basic-addon1">
                                Nombre
                              </span>
                              <input class="form-control" placeholder="Jonathan" aria-describedby="basic-addon1" id="nombre" name="nombre" type="text">
                          </div>     
                          <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                  @
                                </span>
                                <input type="mail" name='mail_newuser' id="mailnewcontact"  class="form-control"  placeholder="Email de la persona a quien quieres invitar a tu cuenta"  aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">
                                Perfil
                              </span>
                              <select id="newperfil" class='form-control m-bot15' name="newperfil">
                                <option value='4'>
                                  Administrador de cuenta
                                </option>
                                <option value='5'>
                                  Estratega digital
                                </option>
                                <option value='6'>
                                  Director de la empresa
                                </option>                            
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="col-md-1 col-lg-1 col-sm-1 control-label" style='color:white;' for="selectbasic">
                              Inicio de labores 
                            </label>
                            <div class="">
                              <div class="input-group bootstrap-timepicker">
                                <input class="form-control timepicker-default" id="inicio_labor" name="inicio_labor" value="<?=$data_user['inicio_labor']?>" type="text">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                      <i class="fa fa-clock-o">
                                      </i>
                                    </button>
                                  </span>
                              </div>
                            </div>
                            <label class="col-md-1 col-lg-1 col-sm-1 control-label" style='color:white;'>
                              Hora de término
                            </label>
                            <div class="col-md-5 col-lg-5 col-sm-5">
                              <div class="input-group bootstrap-timepicker">
                                <input class="form-control timepicker-default" id="fin_labor" name="fin_labor" value="<?=$data_user['fin_labor']?>" type="text">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                      <i class="fa fa-clock-o">
                                      </i>
                                    </button>
                                  </span>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-default btn_save sednewsolicitud" type="button">
                            Enviar
                          </button>                                                
                          <div class='well' id="clientresponse"></div>
                      </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default pull-rithg" type="button">Cancelar</button>                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
        <!-- modal -->









































<!--*************************** INICIA MODAL PARA EDITAR LA NOTA ***************************-->
<div aria-hidden="true" aria-labelledby="edit-nota-user-modal" role="dialog" tabindex="-1"  id="edit-nota-user-modal" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
          </button>
          <h4 class="modal-title">
            Registrar nuevo integrante
          </h4>
        </div>
        <div class="modal-body">        
          <!--Inicia nota del usuario -->
           <div class="form-group">
            <form class='' id="descripcion-miembro" action="descripcion-miembro" METHOD=''>
              <label for="comment">
                Nota adicional 
              </label>
              <textarea class="form-control nota-user-text" name='descripcion-user' rows="5" id="descripcion-user-modal">
              </textarea>
              <button class='btn btn btn_nnuevo '>
                Registrar cambios
              </button>
              <!---->
              <div class='panel alert-ok' >
                <em>
                    Cambios registrados
                </em>
              </div>
              <div class='panel alert-fail' >
                <em>
                    Falla al guardar cambios
                </em>
              </div>
              <!---->
            </form>
          </div>
          <!--Termina nota del usuario-->
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default pull-rithg" type="button">
            Cancelar
          </button>                            
        </div>
      </div>
  </div>
</div>
<!-- TERMINA MODAL EDITAR NOTA DEL USUARIO  -->




























<!--*************************** INICIA MODAL PARA CARGAR LA IMAGEN ***************************-->
<div aria-hidden="true" aria-labelledby="img_user_modal" role="dialog" tabindex="-1"  id="img_user_modal" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
          </button>
          <h4 class="modal-title">
            Carga la imagen del usuario 
          </h4>
        </div>
        <?=$this->load->view('imgs/user_perfiles')?>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default pull-rithg" type="button">
            Cancelar
          </button>                            
        </div>
      </div>
  </div>
</div>
<!-- TERMINA MODAL EDITAR NOTA DEL USUARIO  -->