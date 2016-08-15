<div class="container">
    <div class="col-lg-3 col-md-3 col-sm-3"></div>
    <div class="col-lg-6 col-md-6 col-sm-6">

                  <div class="panel">
                      <div class="panel-body">
                          <div class="profile-desk">
                              <h1>
                                Actualiza tu password
                              </h1>
                              <span class="designation">
                                <?=$data_user["nombre"]?>
                              </span>                            
                          </div>
                      </div>
                  </div>              
                  <form id="form_update_password" method="post" action="">                    
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                         Password actual 
                        </span>
                        <input name="password" id="password" class="form-control" placeholder="" aria-describedby="basic-addon1" type="password" required>                                    
                      </div>
                      <div class='place_pw_1'></div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          Nueva
                        </span>
                        <input class="form-control" name="pw_nueva" id="pw_nueva" aria-describedby="basic-addon1" type="password" required>
                        
                      </div>                                
                      <div class='place_pw_2'></div>

                      <div class="input-group">
                        <span class="input-group-addon">
                          Confirmar nueva
                        </span>
                        <input class="form-control" name="pw_nueva_confirm" id="pw_nueva_confirm" aria-describedby="basic-addon1" type="password" required>
                        <input name="secret" id="secret" type="hidden">
                      </div>                                
                      <div class='place_pw_3'></div>


                      <div class="control-group">                                  
                        
                        <label id="reportesession" class="reportesession"></label>                                                          
                      </div>                
                      <button id="inbutton" class="btn btn-default btn_save ">
                        Actualizar password 
                      </button>                          

                  </form>
                  <span class='msj_password'> </span>
    </div> 
    <div class="col-lg-3 col-md-3 col-sm-3"></div>             
</div>