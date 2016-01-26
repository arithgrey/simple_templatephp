<?=ini_set('display_errors', '1');?>
<link href="<?=base_url('application/css/fg.css')?>" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/animate.css')?>">


<div class='text-center' title='Actualizar nombre de la empresa' style='padding:10px; '>
                  <strong>
                      <h1 class='nombre-empresa-text' id='nombre-empresa-text'>
                        Empresa  <?=$data_empresa["nombreempresa"];?>
                      </h1>
                  </strong>
                </div>
                <div class='nombre-empresa-section' id="nombre-empresa-section">
                  <div class="input-group">        
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Nombre </button>
                      </span>
                      <input type="text"  value="<?=$data_empresa["nombreempresa"];?>" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
                  </div>
                </div> 



<section class="steps-circle-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <ul class="steps-circle row">
                    <a href="#principal-contenido-historia">
                    <li class="step-circle col-xs-12 col-sm-4 col-md-4" >
                        <div class="fa circle-badge cuentanos-tu-histori-sec" id='3' >
                            <i class='fa fa-chevron-right'>
                            </i>
                        </div>
                        <p>                                                                                                                                 
                                          Nuestra historia
                        </p>
                    </li>
                    </a>

                    <a href="#section-cal">
                    <li class="step-circle col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="circle-badge cuentanos-tu-histori-sec" id='1'>
                            <span class="fa fa-star">
                            </span>
                        </div>
                        <p class='action_animate'>                                          
                                          Cuentanos tu historia .!                                              
                        </p>
                        <div class="dotted-divider">
                        </div>
                    </li>
                    </a>
                    <a href="#form-en-tu-ciudad">
                    <li class="step-circle col-xs-12 col-sm-4 col-md-4" >
                        <div class="circle-badge cuentanos-tu-histori-sec" id='2'>
                            <i class='fa fa-play'>
                            </i>
                        </div>
                        <p>                                            
                                          En tu ciudad
                        </p>
                        <div class="dotted-divider">
                        </div>
                    </li>
                    </a>                                    
                </ul>
            </div>
          </div>
    </div>
</section>

                    

<!---->
<div class="container">
    <div class="row panel">    
        <div class="col-md-12  col-xs-12 col-lg-12 col-md-12">
           <div class="header">                
        
<div class='principal-contenido-historia row' id="principal-contenido-historia"  style='background: #1C84A7  !important;'>  
  <center>
    <div >
      <div  title='Actualizar logo  de la empresa'>                              





          <div class="panel-body"style=''>
              <div data-toggle="modal" data-target="#modal-logo-empresa"  id='modal-img-logo-empresa' class="profile-pic text-center">                                                                              
                <img width="140" height="140" class="img-circle"   src="<?=$logo_imagen;?>" id="logo_empresa_img" class='img-circle logo_empresa_img'>
              </div>
              <div class='pais_empresa_text' >  
                  <span id='text-nombre-empresa' style='color:white; font-size:1.1em;'><?=$data_empresa["countryName"]?></span>
              </div>                                            
              <div class='pais_empresa_input'>               
                <?=create_select( $list_paices , 'pais' , 'form-control sm' , 'pais-select' , 'countryName' , 'idCountry' ); ?>                   
              </div>
          </div>                                                    
          <!--******************************************************************-->
          <div class="panel-body">
            <ul id="filters" class="media-filter">
                <li>
                  <a href="#" data-filter="*"> 
                  Todo
                  </a>
                </li>
                <li>
                  <a href="#" data-filter=".images">
                    Imagenes
                  </a>
                </li>
                <li>
                  <a href="#" data-filter=".audio">
                    Audio
                  </a>
                </li>
                <li>
                  <a href="#" data-filter=".video">
                    Video
                  </a>
                </li>
                <li>
                  <a href="#" data-filter=".documents">
                    Más
                  </a>
                </li>
            </ul>

            <div class="btn-group pull-right">
               
                <a href="<?=base_url('index.php/emp/nuestroseventos/')?>">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-check-square-o">
                    </i> 
                    Consulta nuestros eventos
                  </button>
                </a> 
                
                <button type="button" class="btn btn-primary btn-sm contactos-sec"  style="" data-toggle="modal" data-target="#modal-contactos" title='Por cuales medios pueden localizar a la empresa'   >
                  <i class="fa ">
                  </i> 
                  
                  Contactanos .!
                </button>
            </div>
          </div>
          <!--******************************************************************-->
      </div>
    </div>        
  </center>
</div>

<div class="container principal-contenido-historia row" style="background: #1C84A7  !important;">
  <div >

    <!--***************************************************************-->
<div class='col-lg-12 descripcion-section-q' style='color:black !important;'>


      
      <div class='col-lg-12' >
        <div title='Actualizar información'>                                                                                        
          <h4 class="designation description-empresa-text" id="description-empresa-text"> 
            Quiénes somos 
            <i class="fa fa-pencil-square-o">
            </i>
          </h4>                                          
        </div>  
      </div>  

      <div class='col-lg-12' >
          <em  class='description-empresa-text_place' id="description-empresa-text_place" >
            <?=$data_empresa["quienes_somos"]?>
          </em>
      </div>                                                                                                        

      <div class='col-lg-12'>
        <div class='section-description-empresa' id="section-description-empresa">                                                        
              <div class="input-group">               
                <span class="input-group-addon" id="sizing-addon1" title='editar'>
                    Quiénes somos
                </span>
                <div>        
                  <textarea class="form-control" id='descripcion-empresa-input' class='descripcion-empresa-input' rows="3">
                  <?=$data_empresa["quienes_somos"]?>
                  </textarea>
                </div>      
              </div>      
        </div>
      </div>     


      <div class="col-lg-12 principal-contenido-historia">              
            <div data-toggle="modal" data-target="#generos_empresa"   >              
                <i class='fa fa-pencil-square-o ' >
                </i> 
                <em>
                  Representante de los mejores géneros musicales
                </em>
                <?=$tags_generos;?>                                                        
            </div>          
      </div>



<div class="col-lg-12  principal-contenido-historia">  
  <center>
    <i class='fa fa-pencil-square-o años-empresa-text' style='color:black;' id='años-empresa-text' >
    </i>      
    
      <h1 class='años-empresa-text_place' id="años-empresa-text_place"  >
        <?=$data_empresa["años"];?>
        Años haciendo historia 
      </h1>
        
    <div class="input-group" id="años-section" class='años-section' style=''>        
      <div class="input-group col-sm-12">                                                
        <select class='form-control col-md-12' id='años-input'  name='años-input'>
          <?=$years;?>
        </select>
      </div>                                        
    </div>                                                                            
  </center>       
</div>








</div>








    <div class="col-md-12  col-xs-12">
    <h3>Nuestra Misión</h3>

    <div class='col-md-12'>      
      <div title='Actualizar información'>                                                                                      
          <span class='designation misions-empresa-text' id='mision-empresa-text'> 
                                                Misión 
            <i class="fa fa-pencil-square-o">
            </i>
          </span>                                          
      </div>
    </div>
    <div class='col-md-12'>      

      <div class='well'>
        <em class='mision-empresa-text_place' id="mision-empresa-text_place" style='color:black !important;'>
            <?=$data_empresa["mision"]?>
        </em>
      </div>
    </div>
    <div class='col-md-12'>        
      <div id="section-mision-empresa" class='row section-mision-empresa'>
        <div class="input-group">               
          <span class="input-group-addon" id="sizing-addon1">
                                                Misión
          </span>
          <textarea class="form-control" id='mision-empresa-input' class='mision-empresa-input' rows="3">
            <?=$data_empresa["mision"]?>
          </textarea>
        </div>
      </div>     
    </div>         
    </div>
    <div class="col-md-12 col-xs-12">
      <div class="header">                                
        <h3>Nuestra Visón</h3>
        <div class='col-md-12'>              
        <div title='Actualizar información' >                                                                                      
              <span class='designation vision-empresa-text' id='vision-empresa-text'> 
                                                Visión 
                <i class="fa fa-pencil-square-o">
                </i>
              </span>                                          
          </div>
        </div>
        <div class='col-md-12 '>              
          <div class='well'>
            <em class='vision-empresa-text_place' id="vision-empresa-text_place" style='color:black !important; '>
                <?=$data_empresa["vision"]?>
            </em>
          </div> 
        </div> 
        <div class='col-md-12'>                                                    
          <div id="section-vision-empresa" class='section-vision-empresa'>
            <div class="input-group">               
              <span class="input-group-addon" id="sizing-addon1">
              Visión
              </span>
              <textarea class="form-control" class="form-control descripcion-vision-input" id='descripcion-vision-input' rows="3">
                <?=$data_empresa["vision"]?>
              </textarea>
            </div>
          </div>     
        </div>  



        </div>               
      </div>







<!--***************************************************************-->


    
<!--********************************************************************-->
</div>






    </div>       
</div>
</div>

</div>
</div>








<div class="col-lg-12 container principal-contenido-historia" style="background:white;" >    
  <div >
    <div class="header">          
      <div class='col-md-12'>      
        <div title='Actualizar información'>                                                                                      
          <span class='mas-info-empresa-text designation ' id='mas-info-empresa-text'>
                           + Información 
            <i class="fa fa-pencil-square-o">
            </i>
          </span>                                          
        </div>
      </div>
      <div class='col-md-12'>      
        <p class='mas-info-empresa-text_place' id="mas-info-empresa-text_place">
          <?=$data_empresa["mas_info"]?>
        </p>                        
      </div>                
      <div class='col-md-12'>      
        <div id="section-mas-info" class='section-mas-info'>
          <div class="input-group">               
            <span class="input-group-addon" id="sizing-addon1">
                            + Info 
            </span>
            <textarea name='mas_info_empresa' class="form-control"   id='mas-info-empresa-input'   rows="3">
              <?=$data_empresa["mas_info"]?>
            </textarea>       
          </div>
        </div>    
      </div>
    </div>
  </div>
</div>







<div class='row'>


<!--**********************************************************************************************-->
<div class='section-experiencia-cliente'> 
<section id="last" class='calificaciones'>
    <div class="container">
        <div class="row">
          <form class='form-historia' id='form-historia'  action="<?=base_url('index.php/api/emp/historia_cliente/format/json/');?>" >                
          <center id="section-cal">
            <input type='hidden' name='emp' id="emp" value="<?=$data_empresa["idempresa"]?>"> 
            <div class='col-md-12'>
              <h4 id='section-start-calificaciones'>Calificamos .!
              </h4>     
              <div id="contenidor-ranking"> 
                <input id="radio1"  class='input-start' type="radio" name="calificacion" value="5"  >
                <label for="radio1"> &#9733;  
                </label>
                <input id="radio2" class='input-start' type="radio" name="calificacion" value="4">
                <label for="radio2"> &#9733;
                </label>
                <input id="radio3" class='input-start'  type="radio" name="calificacion" value="3">
                <label for="radio3"> &#9733;
                </label>
                <input id="radio4" class='input-start' type="radio" name="calificacion" value="2">
                <label for="radio4"> &#9733;
                </label>
                <input id="radio5" type="radio" class='input-start'  name="calificacion" value="1" >
                <label for="radio5"> &#9733;
                </label>                               

                <input id="radio6" type="radio" class='input-start'  name="calificacion" value="0" >
                <label for="radio6"> &#9733;
                </label>                                                                                      

              </div>                                   
            </div>
          </center>                                                                             

            <div class="col-lg-8 col-lg-offset-2 text-center">
                
                <hr class="primary">
                <p>Estamos agradecidos de compartas tus experiencias para mejorar nuestros servicios</p>
            </div>
            <div class="col-lg-10 col-lg-offset-1 text-center">
                
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" name='nombre_cliente' placeholder="Nombre (opcional)">
                    </div>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" name='email_cliente' placeholder="Tu email">
                    </div>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" name='tel_cliente' placeholder="Tel">
                    </div>
                    <div class="col-md-12">
                        <label></label>
                        <textarea id="descripcion" name="descripcion"   class="form-control" rows="9" placeholder="Cuentanos tu experiencia"></textarea>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class='row'>
                          <em class='reponse-exp' id="reponse-exp"></em>
                        </div>
                        <button type="submit"  class="btn btn btn_nnuevo">Registrar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>  
</div>
<!--**********************************************************************************************-->






<div class='solicitud-artista-section' id="solicitud-artista-section" >
        <div class="span12">
            <div class="thumbnail center text-center">                
                <h2 id='form-en-tu-ciudad' > Solicita tu artista preferido</h2>                
                <p>Haznos saber qué artistas prefieres escuchar en tu ciudad!</p>                
                <form action="<?=base_url('index.php/api/emp/solicitud_ciudad/format/json/')?>" method="post" id='solicitud-ciudad-form' >
                    <div class='col-lg-2'></div>
                    <div class='col-lg-8'>
                      <div class="input-form">
                          <div  class='col-lg-6'>                            
                            <?= create_select($ciudades_list , 'ciudad' , 'form-control' , 'ciudad_select' , 'countryName' , 'idCountry' );  ?>                          
                          </div>
                          <div  class='col-lg-6'>
                            <input type="text" list="posibles-artistas" class='form-control' id="artista-solicitud" name="artista-solicitud" placeholder="nombre del artista">
                            <datalist id="posibles-artistas">                               

                            </datalist>
                          </div>
                          
                          <input type="hidden" name='empresa' value="<?=$data_empresa["idempresa"]?>">
                          <br/>
                          <br/>
                          <center>
                            <div class="response_solicitud_ciudad" id="response_solicitud_ciudad"></div>
                            <input type="submit" value="Solicita ahora .!" class="btn btn-large" />
                          </center>  
                      </div>
                    </div>
                    <div class='col-lg-2'></div>                                                  
                </form>
            </div>    
        </div>
  </div>






</div><!--**************************** TERMINA EL ROW****************************************-->

















<style type="text/css">

.section-experiencia-cliente{
  display: none;
}
.descripcion-section-q{
  background: #E4E6AC;
}
#form p {
  text-align: center;
}
input[type="radio"] {
  display: none;
}
label {
  color: #337AB7;
  font-size: 2.5em;
}
.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}
label:hover,
label:hover ~ label {
  color: #E8DBC2;
}
input[type="radio"]:checked ~ label {
  color: #E8DBC2;
}
.pais_empresa_input{
  display: none;
}
.title_main{
  display: none;
}
.contactos-sec:hover{
  padding: 10px;
  cursor: pointer;
}
.status-registro{
  display: none;
}
#telefono-info:hover{
  cursor: pointer;
}
.web_link{
  color: white;
}
.main_section_emp{
  background: #0F272C !important;
}
.well{
  background: white !important;
  //color: white;
}
.solicitud-artista-section{
  display: none;
}

.principal-contenido-historia{
  display: none;
}

</style>





                  





























































<style type="text/css">
.section-description-empresa, #nombre-empresa-section, 
.section-mision-empresa,.section-vision-empresa, #años-section,
 #section-mas-info , #reponse-exp , .reponse-exp {
  display: none;
}
.description-empresa-text, .misions-empresa-text, .vision-empresa-text, .mas-info-empresa-text, .años-empresa-text{
font-size: 1.2em;

border-radius: 10px;
}
.description-empresa-text:hover, .misions-empresa-text:hover, .vision-empresa-text:hover, .mas-info-empresa-text:hover, .años-empresa-text:hover{
  padding: 2px;
  cursor: pointer;
  font-size:  1.1em;

}
</style>







<!--*****************************************************************************-->
<input type='hidden' value="<?=$base_path;?>" name='base_path' id='base_path' class='base_path'> 
<input type='hidden' value='<?=$base_path_img;?>' name='base_path_img' id="base_path_img" class='base_path_img'> 


  



<div id="modal-logo-empresa" class="modal fade">  
<div class="modal-dialog modal-lg">
  <div class="modal-content">      
      <!--*************************** Header modal *********************************-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Logo de la empresa </h4>
      </div>            
      <!--***************************End Header modal *********************************-->
      <div class="modal-body">                  


        <div class='response_img' id='response_img'></div>
        <div class='row'>
              <div class='lista-imagene' id='lista-imagene'></div>
        </div>
                
        <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post"  enctype="multipart/form-data" id='formulario-logo' >
            <div class="form-group">
            Logo de la empresa :<input type="file" name="imageempresa[]"  id="imgs-empresa">
            <input type='hidden' name="e" value='1'>
            </div>                      
        </form>        
      </div><!--*********************Termina body modal ******************* -->             
      <!--Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>
</div>


<script type="text/javascript" src="<?=base_url('application/js/Organizacion/img.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/directorio/emp.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>
  















<div id="generos_empresa" class="modal fade">  
<div class="modal-dialog modal-lg">
  <div class="modal-content">      
      <!--*************************** Header modal *********************************-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Géneros que representa la empresa </h4> 
      </div>            
      <!--***************************End Header modal *********************************-->
      <div class="modal-body">                  


        <div class='col-lg-12'>
          

          <div class='col-lg-12'>
            <div class='col-lg-2'></div>
              <div class='col-lg-8'>                
                <div class='col-lg-10'>
                  <form id='form-genero-empresa' method='POST' action='<?=base_url("index.php/api/emp/genero_musical/format/json/")?>'>
                  <div class="input-group">
                    <div class="input-group-addon">Genero </div>
                    <input list="generos-list" name="genero_musical" class="generos-filtro form-control" placeholder='jazz'>                                                       
                    <?=$data_list_generos?>                    
                  </div>
                </div>
                <div class='col-lg-2'>
                  <button class='btn btn btn_nnuevo' >Agregar</button>
                  </form>  
                </div>                




                <br>
                <br>
                <div class='col-lg-12'>
                  <div class='status-genero'></div>
                  <div class='generos_musicales_empresa'>
                    <?=$list_generos?>  
                  </div>
                </div>


                </div>

              </div>
              <div class='col-lg-2'></div>
          </div>       




      </div><!--*********************Termina body modal ******************* -->             
      <!--Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>
</div>



