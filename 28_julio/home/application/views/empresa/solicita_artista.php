
<div class='container'>
  <a href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$data_empresa["idempresa"]?>" class='link-org'>
          <?=$data_empresa["nombreempresa"]?>
        </a>
  <div class='pull-right'>
    <a href="<?=base_url('index.php/emp/cuentanostuhistoria/')?>/<?=$data_empresa['idempresa']?>">
      <button class='btn btn-default btn_save' id='btn-historia'>
          Cuentanos tu historia!     
      </button>
    </a> 
  </div> 
        <div class="span12">
            <div class=" center text-center">                
                <h2 id='form-en-tu-ciudad' > 
                  Solicita tu artista preferido
                </h2>                
                <p>
                  Haznos saber qué artistas prefieres escuchar en tu ciudad!
                </p>                
                <form action="<?=base_url('index.php/api/emp/solicitud_ciudad/format/json/')?>" method="post" id='solicitud-ciudad-form' >
                    
                    
                      <div class="input-form">
                          <div  class='col-lg-6'>                            
                            <div class="input-group">
                              <span class="input-group-addon">
                                Tu ciudad
                              </span>                            
                              <?= create_select($ciudades_list , 'ciudad' , 'form-control' , 'ciudad_select' , 'countryName' , 'idCountry' );  ?>                                                        
                            </div>
                            
                            
                          </div>
                          <div  class='col-lg-6'>
                            <div class="input-group">
                              <span class="input-group-addon">
                                El artísta de tu preferencia
                              </span>                            

                              <input type="text" list="posibles-artistas" class='form-control' id="artista-solicitud" name="artista-solicitud" placeholder="nombre del artista">
                              <datalist id="posibles-artistas">                               
                              </datalist>
                            </div>
                          </div>                          
                          <input type="hidden" name='empresa' value="<?=$data_empresa["idempresa"]?>">
                          <br/>
                          <br/>
                          <center>
                            <div class="response_solicitud_ciudad" id="response_solicitud_ciudad"></div>
                            <input type="submit" value="Solicita ahora .!" class="btn btn-large btn btn-default btn_save  " />
                          </center>  
                      </div>
                    
                    
                </form>
            </div>    
        </div>
    </div>    
    
    



<script type="text/javascript" src="<?=base_url('application/js/directorio/emp.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/img.js')?>"></script>  
<style type="text/css">
.profile-desk{
  display: none;
}
</style>