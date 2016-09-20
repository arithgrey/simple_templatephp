<!DOCTYPE html>
<html>
  <head>
    <?=link_tag('application/css/css/style.css');?> 
    <meta charset="utf-8">
    <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
    <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>   
    <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>               
    <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
   
  </head>
  <body>    
    <?php         
        $razon_social =  ""; $fecha_registro = ""; $descripcion =  ""; $zona =  "";
        $L  = ""; $M  = ""; $MM = ""; $J  = ""; $V  = ""; $S  = ""; $D  = ""; $sitio_web =  "";  
        $horario_atencion =  ""; 
        $idpunto_venta = 0;
        foreach ($info as $row) {
          $idpunto_venta =  $row["idpunto_venta"];
          $razon_social =  $row["razon_social"];
          $fecha_registro =  $row["fecha_registro"];
          $descripcion =  substr($row["descripcion"] ,  0 , 100);
          $L =  evalua_dia($row["L"]);
          $M  =evalua_dia($row["M"]);
          $MM =evalua_dia($row["MM"]);
          $J  =evalua_dia($row["J"]);
          $V = evalua_dia($row["V"]);
          $S = evalua_dia($row["S"]);
          $D = evalua_dia($row["D"]);
          $horario_atencion  =  $row["horario_atencion"]; 
          $formatted_address =  $row["formatted_address"];
          $zona =  $row["zona"];
          $sitio_web =  $row["sitio_web"];
        }
        $url_admin =  base_url('index.php/puntosventa/administrar')."/".$razon_social;
        
    ?>

    <div>
      <div class='col-lg-12 col-md-12 col-sm-12'> 
        <input class='punto_venta' id='punto_venta' value='<?=$idpunto_venta?>' type='hidden'>       
        <input class='now' value='<?=base_url()?>' id='now' type='hidden'>
        <span class='link-to'>
          <?=editar_btn($links , $url_admin );?>
        </span>
        <span class='razon_social'>            
          <?=$razon_social?>          
        </span>      
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>          
            <span class='desc-zona'>
              Zona de la ciudad <?=$zona?>
            </span>
          </div>
        </div>          
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>          
            <span class='desc'>
              <?=$descripcion?>
            </span>
            <span>
              <a href="<?=$sitio_web?>">
                www
              </a>
            </span>
          </div>
        </div>
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>
            <?=$formatted_address?>
          </div>
        </div>
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>            
            <span class='horarios_text'>
              Horarios de atención
            </span>            
          </div>
        </div>  
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>            
            <div class='pull-left'>
              <?=$horario_atencion?>
            </div>  
            <div class='pull-right'>            
              <?=$L?>
              <?=$M?>
              <?=$MM?>
              <?=$J?>
              <?=$V?>
              <?=$S?>
              <?=$D?>
            </div>          
          </div>
        </div>     

         <iframe height='500px;' width='100%'   id='iframe_maps_conf'   
         src="<?=base_url('index.php/maps/map')?>/<?=$idpunto_venta?>/2/1/0">
         </iframe> 
         <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>
            <div class='place_img'>
            </div>
            <div class='img'>
            </div>
          </div>
         </div>

      </div>
    </div>
  </body>
</html>

<style type="text/css">
  .desc{
    font-size: .9em;  
  }
  .razon_social{
    font-size: 2em;
    font-weight: bold;
  }  
  .horarios_text{
    font-weight: bold;
  }
  .desc-zona{
    font-weight: bold;
  }
  .link-to{
    text-align: right;
    text-decoration: none;
    list-style: none;
  }
</style>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?=base_url('application/js/puntosventa/info.js')?>"></script>