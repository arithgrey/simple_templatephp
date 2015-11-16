<style type="text/css">
    #nomPersona:hover{
        font-size: 1.2em;
        cursor:pointer;
    }
    #designation:hover{
        font-size: 1.1em;
        cursor:pointer;
    }
    #texto:hover{
        font-size: 1.1em;
        cursor:pointer;
        /*color:yellow;*/
    }
    .oculto{
        display: none;
        width: 200px;
    }
    #ocultoTA1{
        display: none;
    }
    #ocultoTA2{
        display: none;
    }
    #alertaError{
        display: none;
        color: red;
    }
    #alertaExito{
        display: none;
        color: white;
    }
    .error{
        background-color: white;
    } 
    .panel-title, .collapsed {
        color: white;
    }
    .page-header{
        display: none;
    }
    .title-collapse-enid{
        color: black !important;
    }
    /*Fin Estilo para el html*/  
</style>
                
                    <div class="row">


                        <div class="col-xs-12  col-sm-4 col-md-2 col-lg-4 text-center">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-desk">
                                       
                                        
                                            <h1 id="nomPersona"></h1>
                                            <center>
                                            <input class="oculto" type="text" />
                                            </center>                                    
                                            <span class='designation' id="designation"></span>
                                            <br>
                                            <textarea rows="5" cols="50" id="ocultoTA1" type="text"></textarea>
                                            <p id="texto"></p>                                        
                                            <textarea rows="5" cols="50" id="ocultoTA2" type="text">
                                            </textarea>
                                        

                    <div class="row state-overview">
                        
                            <div class="panel green">
                                
                                    <i class="fa fa-check"></i>
                               
                               
                                        <?=$perfilactual;?>
                               
                            </div>
                       
                    </div>
                    







                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    
       

                    <!--collapse start-->























































<div class="col-md-8">
                    

                    <section class="panel">
                        <header class="panel-heading custom-tab blue-tab">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a data-toggle="tab" href="#home4">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li class="active">
                                    <a data-toggle="tab" href="#about4">
                                        <i class="fa fa-user"></i>
                                        Mis dato personales
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#contact4">
                                        
                                        *** Contraseña de acceso
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="home4" class="tab-pane ">
                                    Home
                                </div>
                                <div id="about4" class="tab-pane active">










<form class="form-horizontal" id='form-user-update' method='POST' action="<?=base_url('index.php/api/misdatoscontrolador/usuario/format/json')?>">
<fieldset>

<!-- Form Name -->
<div class='msj_update_status' id="msj_update_status"></div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">Nombre(s)</span>
      <input id="prependedtext" name="nombre" class="form-control" placeholder="Jonathan Medrano" value="<?=$data_user['nombre']?>" required="" type="text">
    </div>
    
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">Apellido Paterno</span>
      <input id="prependedtext" name="apellido_paterno" class="form-control" value="<?=$data_user['apellido_paterno'];?>" placeholder="placeholder" type="text">
    </div>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label" for=""></label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">Apellido Materno</span>
      <input id="" name="apellido_materno" class="form-control" value="<?=$data_user['apellido_materno']?>" placeholder="Apellido Materno" type="text">
    </div>
    
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for=""></label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">Tel. Contacto</span>
      <input id="tel_contacto"  name='tel_contacto' value="<?=$data_user['tel_contacto']?>" name="contacto" class="form-control" placeholder="5115..." type="text">
    </div>
    
  </div>
</div>

<!-- Prepended text-->

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for=""></label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">Tel. Alterno</span>
      <input id="" name="tel_alterno" value="<?=$data_user['tel_contacto_alterno']?>" class="form-control" placeholder="5115..." type="text">
    </div>
    
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">Correo</span>
      <input id="prependedtext" name="email" class="form-control" value="<?=$data_user['email']?>"  placeholder="arithgrey@gmail.com" type="text" required>
    </div>
    
  </div>
</div>



<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">Correo alterno</span>
      <input id="prependedtext" name="email_alternativo" class="form-control" value="<?=$data_user['email_alterno']?>"  placeholder="arithgrey@gmail.com" type="text">
    </div>
    
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="selectbasic">Edad</label>
  <div class="col-md-8">
    <select id="selectbasic" name="edad" class="form-control">    
      <?=get_count_select(18  , 100 , "" , $data_user['edad'] );?>
    </select>
  </div>
</div>




  
  <div class="form-group">
  <label class="col-md-2 control-label" for="selectbasic">Inicio de labores </label>
    <div class="col-md-8">
      <div class="input-group bootstrap-timepicker">
        <input class="form-control timepicker-default" id="inicio_labor" name="inicio_labor" value="<?=$data_user['inicio_labor']?>" type="text">
          <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
          </span>
      </div>
    </div>
  </div>
  


  
  <div class="form-group">
    
  <label class="col-md-2 control-label">Hora de término</label>
    <div class="col-md-8">
      <div class="input-group bootstrap-timepicker">
        <input class="form-control timepicker-default" id="fin_labor" name="fin_labor" value="<?=$data_user['fin_labor']?>" type="text">
          <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
          </span>
      </div>
    </div>
  </div>



   

<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label" for=""></label>
  <div class="col-md-2">
    <button class="btn btn-primary">Actualizar información</button>
  </div>
</div>

</fieldset>
</form>






























                                </div>
                                <div id="contact4" class="tab-pane ">
                                    <!--Cambio de contraseña inicia -->
                    <div id="div-cambio-pw">

                                           
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
                                                                                            
                                                    <button class="btn btn-primary pull-right" type="button" id="botoncito">
                                                        <i class="fa fa-exchange"></i>
                                                        Actualizar contraseña
                                                    </button>
                                                                                                
                                                    <div class="btn btn-xs btn-info fade in" id ="alertaError"></div>
                                                    <div class="btn btn-xs btn-info fade in" id ="alertaExito"></div>                                                        
                                            </form>
                            </div><!--Cambio de contraseña termina -->







                                </div>
                            </div>
                        </div>
                    </section>


                </div>















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