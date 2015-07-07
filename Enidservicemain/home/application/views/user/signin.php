<script src="<?=base_url('application/js/sha1.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/home/iniciosession/iniciosession.js')?>"></script>

<!--**************************************************************************************-->

<style type="text/css">
#recovery-pw{
  color: #1D7791;
}

</style>



<br>
<br>
<br>

<div class='row'>
  
    <div class='col-lg-4'></div>
    <div class="col-lg-4">
            



                  
                      <ul id="myTab" class="nav nav-tabs">

                          <li class="active">
                            <a href="#signin" data-toggle="tab">
                              <span class="fa fa-sign-in" aria-hidden="true"></span>                   
                              Iniciar ahora
                            </a>
                          </li>              
                            
                          
                      </ul>
                  

          
                  <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade" id="why">
                                <p>Enid service, es la plataforma prototipo 
                                para la administración de eventos musicales 
                                de forma inteligente.               
                                <a mailto:href="arithgrey@gmail.com"></a>
                                para mayor información contactarse a:
                                arithgrey@gmail.com </p>
                            </div>

                            <div class="tab-pane fade active in" id="signin">
                              
                            <form id="in" method="post" action="">
                              
                                  
                                

                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">@ email</span>
                                    <input type="mail" name='mail' id="mail"  class="form-control" placeholder="" aria-describedby="basic-addon1">
                                    
                                  </div>


                                  <div class="input-group">

                                    <span class="input-group-addon" >Contraseña</span>
                                    <input type="password" class="form-control"  name='pw' id="pw" aria-describedby="basic-addon1" >
                                    <input type='hidden' name='secret' id="secret">
                                  </div>
                                  

                                 


                                  
                                  <div class="control-group">
                                  
                                    <label class='' id="reportesession"></label>
                                    
                                    
                                  </div>                
                                  <button role="button" id="inbutton" class='btn btn-info col-sm-4 col-md-4'>Iniciar</button>
                            



                              <div class="row">                                              

                                       <a data-toggle="modal" class='col-sm-6 col-md-12' href="#myModal">
                                        <strong>
                                          <span id="recovery-pw">
                                            Recuperar contraseña
                                          </span>
                                        </strong>  
                                      </a>                                                
                                      

                              </div>  



                            </form>
                               
                            </div>
                </div>
                
          
    </div>
    <div class='col-lg-4'></div>


</div>

    <br>
    <br>
    <br>        
    <br>




































                   
                
          







                  
























<script type="text/javascript" src="<?=base_url('application/js/recuperapassword/recuperaPassword.js')?>"></script>

 <!--********************************************************************************************+***** -->
 <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="olvide-pw-text" class="modal-title">Olvidaste tu contraseña?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Ingresa tu correo electrónico y tu contraseña será enviada a el</p>
                        <input type="text" id="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                        <br>
                        <div id="divPass"></div>
                        <div id="divContr"></div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                        <button class="btn btn-primary" type="button" id="enviar">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->