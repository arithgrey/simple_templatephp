<div class='container'>
  <div class='col-lg-3 col-md-3 col-sm-3' id='section-right'>
    <button class="btn btn btn_nnuevo pull-right" id='editar-datos-personales' style='display:none;'>
      <i class='fa fa-pencil-square-o'>
      </i>
      <em>
          Editar
      </em>
    </button>      
    <div class="panel">
        <div class="panel-body">                                                
          <h1>            
              <?=$data_user["grupo"]?>                            
              <a href="#">
              <?=$data_user["cargo"]?>
              </a>
          </h1>          
          
        </div>
    </div>





    <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <h3>
                          Contacto
                        </h3>
                        <ul>

                          <li>
                          <?php                   
                            if( strlen($data_user['tel_contacto'])>1 ){
                              echo "<i class=' fa fa-angle-right'></i>". $data_user['tel_contacto'];
                            }else{
                              echo "Sin teléfono de contacto";
                            }
                          ?>
                          </li>                          
                          <li>
                            <?php 
                            if (strlen($data_user['tel_contacto_alterno']) > 1 ) {
                              echo "<i class=' fa fa-angle-right'></i>".$data_user['tel_contacto_alterno'];
                            }else{
                              echo "Sín teléfono alterno de contacto";
                            }
                            ?>
                          </li>                            
                          

                        </ul>
                    </div>
                </div>
            </div>

    <div class="row state-overview">          
        <div class="panel blue" style='background:#0E1C23 !important;'>                                                                                                  

          <span>
            Horario delabores
          </span>
          <hr>
          <span style='font-size;.7em;'>
            <?=$data_user['inicio_labor']?> 
                a 
            <?=$data_user['fin_labor']?>
          </span>
        </div>                                
      </div>
      
  </div>

  <!--Configuraciones-->
  <div class='col-lg-9 col-md-9 col-sm-9'>

    <section class="panel">
      <header class="panel-heading custom-tab blue-col-enid">
        <ul class="nav nav-tabs">            
            <li class="active">
                <a data-toggle="tab" href="#about4">
                    Datos personales
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#contact4">                                        
                Contraseña
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#contact5">                                        
                  <i class="fa fa-picture-o"></i>
                </a>  
            </li>        
        </ul>
      </header>
  <div class="panel-body panel-body-enid" >
    <div class="tab-content">          
      <div id="about4" class="tab-pane active">        
        <!--inicia la ficha personal-->
        <?=$this->load->view('micuenta/info_user')?>
        <!--Termina  la ficha personal-->
        <!--inicia la edición  de la ficha personal-->
        <?=$this->load->view('micuenta/editar_info_user')?>
        <!--Termina  la edición  de la ficha personal-->
      </div>
        <div id="contact4" class="tab-pane">                                          
          <form class="form-horizontal" id='form-pw' method='post' action=''>                                                            
              <div class='col-lg-12 col-md-12 col-sm-12'>
                <div class="input-group">                                                      
                  <span class="input-group-addon">                       
                    Contraseña actual                    
                  </span>
                  <input type="password" name='pw' class="form-control input-sm input-sm" id="actual_pw" placeholder="Anterior" required >                                                                
                </div>                                        
              </div>
              <div class='col-lg-6 col-md-6 col-sm-12'>
                <div class="input-group">                
                  <span class="input-group-addon">                      
                      Nueva contraseña                   
                  </span>
                  <input type="password" name='pwn' class="form-control input-sm input-sm" id="nueva_pw" placeholder="Nuevo" required >               
                </div>    
              </div>
              <div class='col-lg-6 col-md-6 col-sm-12'>
                <div class="input-group">                
                  <span class="input-group-addon">                                       
                      Verifica contraseña                    
                  </span>
                  <input type="password" name='pwc' class="form-control input-sm" id="vericacion_pw" placeholder="Verifica" required>                                                                    
                </div>                                                                                                                                                                                 
              </div>
              
              <div class='col-lg-12 col-md-12 col-sm-12'>
                <br>
                <button class="btn btn-default btn_save" type="submit" id="btn-pw">                                                        
                  Actualizar contraseña
                </button>                                        
                <div class='reponse-update-pw' >
                </div>                
              </div>          
          </form>  
          </div> 


          <div id="contact5" class="tab-pane">                                
            <!--IMAGEN DEL PERFIL INICIA -->
              <div class='response_img_perfil' id='response_img_perfil'></div>

              <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_contacto" enctype="multipart/form-data" id='formulario-principal-img' >
                <div class="form-group">
                  <span>Imagen de perfil:
                  </span>
                  <input type="file" name="images[]"  id="imgs-perfil" class='imgs-perfil'>                                       
                </div>                                      
              </form>
            <!--IMAGEN DE PERSIL USUARIO TERMINA --> 
          </div>  



        </div>
      </div>
    </div>
  </section>




  </div>  


















</div>





























<script type="text/javascript" src="<?= base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/principal.js')?>"></script>
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/password.js')?>"></script>
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/img.js')?>"></script>
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











