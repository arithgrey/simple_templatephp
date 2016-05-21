
























<?=ini_set('display_errors', '1');?>
  <div class='container'>
    <div class='col-lg-3 col-md-3 col-sm-3'></div>
    <div class='col-lg-6 col-md-6 col-sm-6'>
                  <div class="panel">
                      <div class="panel-body">
                          <div class="profile-desk">
                              <h1>
                                Inicia sessión ahora .!
                              </h1>
                              <span class="designation">
                                Enid service 
                              </span>                            
                          </div>
                      </div>
                  </div>              
                  <form id="in" method="post" action="">                    
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                         usuario (@email)
                        </span>
                        <input type="mail" name='mail' id="mail"  class="form-control" placeholder="" aria-describedby="basic-addon1">                                    
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon" >
                          Contraseña
                        </span>
                        <input type="password" class="form-control"  name='pw' id="pw" aria-describedby="basic-addon1" >
                        <input type='hidden' name='secret' id="secret">
                      </div>                                
                      <div class="control-group">                                  
                        
                        <label  id="reportesession" class='reportesession'></label>                                                          
                      </div>                
                      <button id="inbutton" class='btn btn-default btn_save '>
                        Iniciar
                      </button>                          
                      <div class="row">                                              
                        <a data-toggle="modal" class='pull-right' href="#recuperacion-pw">                                                 
                          Recuperar contraseña                         
                        </a>                                                                                        
                      </div>  
                  </form>
    </div> 
    <div class='col-lg-3 col-md-3 col-sm-3'></div>             
  </div>                 
  
  <!--Cargamos modals de configuración-->
  <?=$this->load->view("user/modal/config_inicio_session");?>
  <!--Terminamos de cargar  modals de configuración-->
  <script type="text/javascript" src="<?=base_url('application/js/home/recu.js')?>"></script>
  <script src="<?=base_url('application/js/sha1.js');?>"></script>
  <script type="text/javascript" src="<?=base_url('application/js/home/ini.js')?>"></script>


      
      <div class="animationload" style='display:none;' id='status_registro_user'>
          <div class="osahanloading">
          </div>
      </div>

