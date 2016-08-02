<div>
  <a href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$data_empresa["idempresa"]?>" class='link-org'>
    <?=$data_empresa["nombreempresa"]?>
  </a>
  <div class='separate-enid'>
  </div>
  <h2 class='title-solicitud' > 
    Solicita tu artista preferido
  </h2>                
  <span class='sub-titulo'>
    Haznos saber qué artistas prefieres escuchar!
  </span>                
  <!---->
  <form action="<?=base_url('index.php/api/emp/solicitud_ciudad/format/json/')?>" method="post" id='solicitud-ciudad-form' >                                        
    <div class="input-form">
        <div  class='col-lg-3 col-md-3 col-sm-12 '>                            
          <div class="input-group">
            <span class="input-group-addon">
              Tu ciudad
            </span>                                   
            <?=create_select($ciudades_list , 'ciudad' , 'form-control' , 'ciudad_select' , 'countryName' , 'idCountry' );  ?>                                                        
          </div>                                                        
        </div>
        <div  class='col-lg-6 col-md-6 col-sm-12'>
          <input type="hidden" name='empresa' value="<?=$data_empresa["idempresa"]?>">                                    
          <div class="input-group">
            <span class="input-group-addon">
              El artísta de tu preferencia
            </span>                            
            <input type="text" list="posibles-artistas" class='form-control' id="artista-solicitud" name="artista-solicitud" placeholder="nombre del artista">
            <datalist id="posibles-artistas">                               
            </datalist>
          </div>
        </div>                                  
        
        <div  class='col-lg-3 col-md-3 col-sm-12'>
          <input type="submit" value="Solicita ahora .!" class="btn btn-large btn btn-default btn_save  " />            
        </div>
      </div>                          
  </form>


  <div  class='col-lg-12 col-md-12 col-sm-12'>
    <div class='separate-enid'>
  </div>
    <div class="place_registro" id="place_registro">
    </div>
  </div>

  <!---->
  <hr>






  <div class='seccion-solicitudes-registradas'>
    <div class='col-lg-12 col-md-12 col-sm-12'>
        <div class='place_artistas'>
        </div>
    </div>
  </div>




<script type="text/javascript" src="<?=base_url('application/js/Organizacion/solicitud_artistas.js')?>"></script>
<style type="text/css">
.title-solicitud{
  font-weight: bold;
  font-size: 2.5em;
}
.sub-titulo{
  margin-left: 2%;
}
.seccion-solicitudes-registradas{
  margin-top: 200px;
}
</style>