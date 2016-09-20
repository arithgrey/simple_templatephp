<?=template_evento($evento["nombre_evento"] ,  $evento["idevento"] ,  $evento["idempresa"])?>
<div class='config_tipo animated  ' id='config_tipo'>
  <div class='configuracion_tipo'>
  </div>
  <div class='place_config_tipo'>
  </div>
</div>
<div class='config_estado animated ' id='config_estado'>
    <div class='configuracion_estado'>
    </div>
    <div class='place_config_estado'>
    </div>
</div>
<div>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
          <?=$this->load->view("eventos/public/principal_slider");?>        
        </section>
    </div>
    <div class="tab-pane" id="section_dinamic_escenarios">
        <div class='resumen_escenarios' id='resumen_escenarios'>
        </div>
    </div>        
  </div> 
</div>







<input type='hidden' class='h_slogan' value='<?=$evento["eslogan"]?>'> 
<input type='hidden' class='h_programado' value="<?=trim($evento["programado"])?>">   
<input type='hidden' class='h_status' value="<?=trim($evento["status"])?>">   
<input type='hidden'  class='h_ubicacion' value="<?=trim($evento["ubicacion"]);?>">  
<input type='hidden'  class='h_restricciones' value="<?=trim($evento["restricciones"]);?>">
<input type='hidden'  class='h_politicas' value="<?=trim($evento["politicas"]);?>">
<input type='hidden' class='nombre_evento_val' id='nombre_evento_val' value="<?=$evento["nombre_evento"]?>">
<input type='hidden' class='evento_escenario' value="<?=$evento["idevento"]?>">
<input type='hidden' class='evento'  id='evento'  value="<?=$evento["idevento"]?>">
<input type='hidden' class='id_evento'   value="<?=$evento["idevento"]?>">

<input type="hidden" class='empresa' id='empresa' value="<?=$evento['idempresa']?>">
<input type="hidden" class='id_empresa' value="<?=$evento['idempresa']?>">
<script type="text/javascript" src="<?=base_url('application/js/evento/public/principal.js')?>">
</script>






<?=construye_header_modal('asistencia_moal', "Tu asistencia en el evento" );?>                           
<div class='place_asistencia_user'>  
</div>


<center>
  <div>            
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>

          <div class="fb-share-button" data-href="<?=base_url('index.php/eventos/visualizar')?>/<?=$evento["idevento"]?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fenidservice.com%2Fhome%2F&amp;src=sdkpreparse">Compartir</a></div>
  </div>
</center>


<?=construye_footer_modal()?>  




<style type="text/css">
  .config_tipo{
    display: none;
    background: #283a42;
    height: 400px;
    margin-top: 41px;
    clear: right;
  }
  .config_estado{ 
    display: none;
    background: #283a42;
    height: 400px;
    margin-top: 41px;
    clear: right; 
  }

</style>







<style type="text/css">
    .seccion_slider_evento{
        margin-bottom: 20px;
    }
    .panel_info_evento{
        background: rgb(60, 94, 121);
        color: white;
    }
    
    .tags_generos_a{
        background: #364654 !important;       
    }
    .tags_generos_a:hover{    
        background:#00bcd4 !important;    
        padding: 8px;       
    }
    .tags_generos_a:hover{
        cursor: pointer;
    }
    .slogan{    
        color: white;        
    }
    .seccion_escenairos_evento{
        background:  #046188; 
        height: 100%;    
    }#mapgooglemap{
      background: #046188;
    }
    .titulo_maps{
        color: white;
    }.aviso_social{
        font-size: .8em;
    }
    .config_tipo_evento{        
        cursor: pointer;
    }
    .info_tipo_evento{
        color: white;
    }
    span.titulo_evento_slider{

        color: #FFFFFF;
        margin-left: 1%;
        font-weight: bold;
    }
    .text_edicion{
        color: rgb(62, 178, 192);        
        font-size: 1.2em;
        margin-left: 2%;    
    }
    /**/
    .text_title_escenario{
        font-size: 2em;
        font-weight: bold;    
    }
    .dias_restantes{
        color: white !important;
        font-weight: bold;        
    }    
    .seccion_escenarios_enid{
        background: whitesmoke;
        padding: 2%;
    }
    .maps_enid{
        background: #046188;
        padding: 10px;
    }.text_map{
        color: white;
    }
    .text-map-prox{
        color: white;
    }
  

    .msj-edicion-sm{
        display: none;
    }.msj-edicion-lg{
        display: block;
    }
    .icon-maps{
      color: white;
    }
    .more-info-f:hover{
      cursor: pointer;
      
    }
    
    /*.seccion-presentacion{
      display: none;
    }
    */
    .edicion-event-text {
      font-size: .9em;
      color: #000000;
      font-weight: bold;
    }

</style>




<style type="text/css">


/*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px) {    
    /*Termina  media query*/
    .ver-public-lg{
      display: none;
    }
    .ver-public-sm{
      display: block;
      background: rgb(22, 103, 129);
      padding: 10px;
      margin-bottom: 10px;
    }.configs-evento-lg{
      display: none;
    }
    .seccion-config-evento-mv{
      display: block;
      background: rgb(4, 97, 136);
      padding: 10px;
      color: white;
    }
    .link-map{
      color: white;
    }
    .nombre-evento-mov{      
      font-size:3.7em;
      color: white !important;
      font-weight: bold;      
      
    }

    
    .btn-config-enid-desc,  .seccion-config-enid-desc{
      display: inline-block;
    }
    .btn-config-edicion-desc-l , .msj_notificacion_config{
      display: inline-block;
    }
    .btn-generos-config , .msj_notificacion_config{
       display: inline-block;    
    }
    .sepador_superio{
      display: none;
    }
    .msj-edicion-sm{
      display: block;
    }.msj-edicion-lg{
      display: none;
    }
    .seccion-generos{
      float: left;
    }
    .seccion-center-evento-mov{
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .edicion-event-text{      
      font-size: .7em;
      color: #000000;
      font-weight: bold;
    }




  }
</style>



<style type="text/css">
.seccion-dias{
  background:  rgb(0, 4, 4);  
}
.seccion_principal-portada{       
  background: rgb(4, 97, 136);    
}
.text-historia{        
  font-size: 2em;
  font-weight: bold;  
}
.hiddden_descripcion{
  display: none;
}.more-info-f-up {
  display: none;
}
.btn-config-enid-desc,  .seccion-config-enid-desc{
      display: inline-block;
}
.btn-config-edicion-desc-l , .msj_notificacion_config{
  display: inline-block;
}
.btn-generos-config , .msj_notificacion_config{
  display: inline-block;    
}
.descripcion-experiencia{
    margin-top: -30px;
}
.seccion-historia{
  margin-top: 2%;
}
.link-to-enid:hover{
  cursor: pointer;
  text-decoration: none;
  color: white;
}
.btn_call_to{    
    background: #d9534f;
    
    color: white;
    border-radius: 0;
    border-style: solid;
    border-width: 0;
    cursor: pointer;
    padding: 1rem 1.77778rem 0.94444rem 1.77778rem;    
    border-color: #007095;
    color: #FFFFFF;
    margin-right: 1px;
}
.btn_call_to:hover{    
    background: rgb(3, 41, 53);
    color: white;
    border-radius: 0;
    border-style: solid;
    border-width: 0;
    cursor: pointer;
    padding: 1rem 1.77778rem 0.94444rem 1.77778rem;    
    border-color: #007095;
    color: #FFFFFF;
    margin-right: 1px;
}

.seccion-reservaciones{
  font-size: .9em;      
}

</style>


