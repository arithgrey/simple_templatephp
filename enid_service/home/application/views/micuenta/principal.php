<section class="panel">
  <header class="panel-heading custom-tab blue-col-enid">
      <ul class="nav nav-tabs">
          <li>
              <a data-toggle="tab" href="#home4">
                  <i class="fa fa-home">
                  </i>
              </a>
          </li>
          <li class="active">
              <a data-toggle="tab" href="#about4">
                  <i class="fa fa-user">
                  </i>
                  Mis datos
              </a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#contact4">                                        
              Seguridad
              </a>
          </li>
      </ul>
  </header>




  <div class="panel-body  panel-body-enid" >
      <div class="tab-content">
          <div id="home4" class="tab-pane ">
            Home
          </div>
          <div id="about4" class="tab-pane active" style='background:#166781 none repeat scroll 0% 0%'>

          
          <div class='' id='datos-section' style='padding:10px; color:white;'>








<h3 style='color:white;'>
  <?=$data_user['email']?>
</h3>
<button class="btn btn btn_nnuevo pull-right" id='editar-datos-personales'>
  <i class='fa fa-pencil-square-o'></i>
  <em>
    Editar
  </em>
</button>

<div class="row">

                <div class="col-md-4">
                    <!--statistics start-->
                    <div class="row state-overview">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel purple">
                                
                                <div class="state-value">
                                    <div class="value">Turno</div>
                                    <div class="title">
                                      <?=$data_user["turno"]?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel red">
                                
                                <div class="state-value">
                                    <div class="value">
                                      Estado
                                    </div>
                                    <div class="title">
                                      <?=$data_user["status"]?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row state-overview">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel blue">
                                
                                <div class="state-value">
                                    <div class="value">No. Empleado</div>
                                    <div class="title"><?=$data_user["numero_empleado"]?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel green">                                
                                <div class="state-value">
                                    <div class="value">Edad</div>
                                    <div class="title"> <?=$data_user['edad'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--statistics end-->
                </div>
                <div class="col-md-8">
                    <!--more statistics box start-->
                    <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-desk">
                                        <h1>
                                          <?=$data_user['nombre']?>
                                          <?=$data_user['apellido_paterno'];?>
                                          <?=$data_user['apellido_materno']?>
                                        </h1>
                                        <span class="designation">
                                        <?=$data_user["grupo"]?> / 
                                        <?=$data_user['cargo']?>
                                        </span>
                                        <p style='color:black;'>
                                        <?=$data_user["descripcion_usuario"]?>     
                                        </p>
                                        <a class="btn p-follow-btn pull-left" href="#">  
                                        RFC : <?=$data_user["rfc"];?>
                                        </a>
                                        <a class='btn p-follow-btn' href="#">
                                          Tel. Contacto : <?=$data_user['tel_contacto']?>
                                        </a>
                                        <a class='btn p-follow-btn' href="#">
                                          Tel. Contacto alterno: <?=$data_user['tel_contacto_alterno']?>
                                        </a>
                                        <div class='pull-right'>
                                          <em style='color:black;'>
                                            Fecha registro:
                                            <?=$data_user["fecha_registro"]?>
                                          </em>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>




            
                  <div>
                    Email alterno: <?=$data_user['email_alterno']?>
                    Labores :<?=$data_user['inicio_labor']?> a <?=$data_user['fin_labor']?>
                    Última modificación :  <?=$data_user["ultima_modificacion"]?>
                  </div>  
                    <!--more statistics box end-->
                </div>
            </div>





















            
            
            
          </div>





          <form class="form-horizontal" id='form-user-update' method='POST' action="<?=base_url('index.php/api/misdatoscontrolador/usuario/format/json')?>">
          <div style='padding:10px;' id='section-form-datos'>

          <!-- Form Name -->
          <div class='msj_update_status' id="msj_update_status"></div>

          <hr>
          <!-- Prepended text-->
          <div class="form-group">            
            <div class="col-md-6 col-lg-6 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon">
            Nombre(s)
                </span>
                <input id="prependedtext" name="nombre" class="form-control" placeholder="Jonathan Medrano" value="<?=$data_user['nombre']?>" required="" type="text">
              </div>    
            </div>

            <div class="col-md-3 col-lg-3 col-sm-3">
              <div class="input-group">
                <span class="input-group-addon">Apellido Paterno</span>
                <input id="prependedtext" name="apellido_paterno" class="form-control" value="<?=$data_user['apellido_paterno'];?>" placeholder="placeholder" type="text">
              </div>              
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3">
              <div class="input-group">
                <span class="input-group-addon">
                  Apellido Materno
                </span>
                <input id="" name="apellido_materno" class="form-control" value="<?=$data_user['apellido_materno']?>" placeholder="Apellido Materno" type="text">
              </div>    
            </div>

          </div>

          <!-- Prepended text-->
          
          <!-- Prepended text-->
          <div class="form-group">



            <div class="col-md-2 col-lg-2 col-sm-2">
              <div class="input-group">
                <span class="input-group-addon">Edad</span>
                <select id="selectbasic" name="edad" class="form-control">    
                  <?=get_count_select(18  , 100 , "" , $data_user['edad'] );?>
                </select>
              </div>
            </div>
            
            <div class="col-md-5 col-lg-5 col-sm-5">
              <div class="input-group">
                <span class="input-group-addon">Tel. Contacto</span>
                <input id="tel_contacto"  name='tel_contacto' value="<?=$data_user['tel_contacto']?>" name="contacto" class="form-control" placeholder="5115..." type="text">
              </div>              
            </div>

            <div class="col-md-5 col-lg-5 col-sm-5">
              <div class="input-group">
                <span class="input-group-addon">Tel. Alterno</span>
                <input id="" name="tel_alterno" value="<?=$data_user['tel_contacto_alterno']?>" class="form-control" placeholder="5115..." type="text">
              </div>            
            </div>


          </div>
        
        <!-- Prepended text-->
        <div class="form-group">          
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon">Correo</span>
              <input id="prependedtext" name="email" class="form-control" value="<?=$data_user['email']?>"  placeholder="arithgrey@gmail.com" type="text" required>
            </div>          
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon">Correo alterno</span>
              <input id="prependedtext" name="email_alternativo" class="form-control" value="<?=$data_user['email_alterno']?>"  placeholder="arithgrey@gmail.com" type="text">
            </div>          
          </div>
        </div>






          <div class="form-group">

            <label class="col-md-1 col-lg-1 col-sm-1 control-label" style='color:white;' for="selectbasic">Inicio de labores </label>
            <div class="col-md-5 col-lg-5 col-sm-5">
              <div class="input-group bootstrap-timepicker">
                <input class="form-control timepicker-default" id="inicio_labor" name="inicio_labor" value="<?=$data_user['inicio_labor']?>" type="text">
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                  </span>
              </div>
            </div>

            <label class="col-md-1 col-lg-1 col-sm-1 control-label" style='color:white;'>Hora de término</label>
            <div class="col-md-5 col-lg-5 col-sm-5">
              <div class="input-group bootstrap-timepicker">
                <input class="form-control timepicker-default" id="fin_labor" name="fin_labor" value="<?=$data_user['fin_labor']?>" type="text">
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                  </span>
              </div>
            </div>
          </div>



          <div class="form-group">          
            <div class='col-md-6 col-lg-6 col-sm-6'>
              <div class="input-group">
                <span class="input-group-addon">RFC</span>
                <input id="prependedtext" name="rfc" class="form-control" value="<?=$data_user['rfc']?>" type="text">
              </div>          
            </div>
            <div class='col-md-6 col-lg-6 col-sm-6'>
              <div class="input-group">
                <span class="input-group-addon">
                  Turno
                </span>
                <select name='turno' class='form-control'>                                  
                  <option value='Matutino'>Matutino</option>
                  <option value='Vespertino'>Vespertino</option>
                  <option value='Nocturno'>Nocturno</option>
                  <option value='Mixto'>Mixto</option>
                </select>
              </div>          
            </div>
          </div>  

          <div class="form-group">          
            <div class='col-md-12 col-lg-12 col-sm-12'>
              <textarea rows="6" name="descripcion_usuario" class="form-control" placeholder="Tu descripción">            
                <?=$data_user["descripcion_usuario"]?>
              </textarea>
            </div>
          </div>  


        <!-- Button -->
        
          <button class="btn btn-default btn_save">
          Actualizar información
          </button>          
          <br>

</div>
</form>

</div><!--Termina la sección de datos personaless-->
                                <div id="contact4" class="tab-pane">
                                    <!--Cambio de contraseña inicia -->                  
                                <div style='background:#166781 none repeat scroll 0% 0%; padding:10px;' >
                                  <form class="form-horizontal" role="form">    
                                          <div class="input-group">                                                      
                                              <span class="input-group-addon">   
                                                <label for="inputPassword1" class="control-label">
                                                            Antigua contraseña de acceso
                                                </label>
                                              </span>
                                              <input type="password" class="form-control" id="anteriorP" placeholder="Anterior" required >                                                                
                                          </div>
                                          <div class="input-group">
                                              <span class="input-group-addon">   
                                                <label for="inputPassword1" class="control-label">
                                                          Nueva contraseña
                                                </label>
                                              </span>
                                              <input type="password" class="form-control" id="nuevoP" placeholder="Nuevo" required > 
                                          </div>                                                                                                       
                                          <div class="input-group">
                                              <span class="input-group-addon">                   
                                                <label for="inputPassword1" class="control-label">
                                                            Verifica contraseña
                                                </label>
                                              </span>
                                              <input type="password" class="form-control" id="verificaP" placeholder="Verifica" required>                                                    
                                          </div>                                                    
                                                                                          
                                          <button class="btn btn-default btn_save" type="button" id="botoncito">                                                        
                                            Actualizar contraseña
                                          </button>
                                          
                                          <div class='row'>
                                            <div  id ="alertaError"></div>
                                            <div  id ="alertaExito"></div>                                                        
                                          </div>          
                                  </form>  
                                  </div>                              
                                </div>
                            </div>
                        </div>
                    </section>
















<script type="text/javascript" src="<?= base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/principal.js')?>"></script>
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/password.js')?>"></script>



<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<!--pickers css-->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->



<?=ini_set('display_errors', '1');?>
<style type="text/css">
#section-form-datos{
  display: none;
}
</style>