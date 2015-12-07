                        

<div class='col-md-12'>
                                            <div class='col-md-1 contactos-sec' style="" data-toggle="modal" data-target="#modal-contactos" title='Por cuales medios pueden localizar a la empresa' >
                                              <i class='fa fa-pencil-square-o'></i>
                                            </div>   
                                            <div class='col-md-11'>                                                
                                                <i title="Teléfono : <?=$contacto["tel"]?>   , Teléfono Móvil : <?=$contacto["movil"]?>" id="telefono-info" class="fa fa-mobile web_link"></i>                                              
                                                <i title="email:  <?=$contacto["correo"]?> , email alterno : <?=$contacto["correo_alterno"] ?>" class="fa fa-envelope-o web_link"></i>
                                                <i title="Dirección : <?=$contacto["direccion"] ?>" class="fa fa-map-marker web_link"></i>
                                                <a class='web_link' href="<?=$contacto["pagina_fb"]?>"><i class="fa fa-facebook"></i></a>
                                                <a class='web_link' href="<?=$contacto["pagina_tw"]?>"><i class="fa fa-twitter"></i></a>  
                                                <a class='web_link' href="<?=$contacto["pagina_web"]?>">www</a>  
                                            </div>    
                                        </div>    

<center>
  <div data-toggle="modal" data-target="#modal-logo-empresa"  id='modal-img-logo-empresa'  >
  <div class="panel" title='Actualizar logo  de la empresa' style='background: #1C84A7  !important'>                              
      <div class="panel-body"style=''>
          <div class="profile-pic text-center">                                                                              
            <img width="140" height="140" class="img-circle"   src="<?=$logo_imagen;?>" id="logo_empresa_img" class='img-circle logo_empresa_img'>
          </div>
      </div>                                            
  </div>
  </div>        
</center>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <div class="row panel">
    <div class="col-md-4 bg_blur ">
        
    </div>
        <div class="col-md-8  col-xs-12">
           <div class="header">
                
                <div class='text-center' title='Actualizar nombre de la empresa' style='padding:10px; '>
                  <h3 class='nombre-empresa-text' id='nombre-empresa-text'>
                    Empresa  <?=$data_empresa["nombreempresa"];?>
                  </h3>
                </div>

                <div class='nombre-empresa-section' id="nombre-empresa-section">
                  <div class="input-group">        
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Nombre </button>
                      </span>
                      <input type="text"  value="<?=$data_empresa["nombreempresa"];?>" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
                  </div>
                </div>






                                              
                                                  <div title='Actualizar información'>                                                                                        
                                                            <h4 class="designation description-empresa-text" id="description-empresa-text"> Quiénes somos <i class="fa fa-pencil-square-o"></i></h4>                                          
                                                  </div>                                                    
                                                  

                                                  <div class='col-lg-12 '>
                                                    <em  class='description-empresa-text_place' id="description-empresa-text_place">
                                                           <?=$data_empresa["quienes_somos"]?>
                                                    </em>
                                                  </div>                                                                                        
                                                  <div class='col-lg-12'>
                                                    <div class='section-description-empresa' id="section-description-empresa">                                                        
                                                          <div class="input-group">               
                                                            <span class="input-group-addon" id="sizing-addon1" title='editar'>Quiénes somos</span>
                                                            <div>        
                                                              <textarea class="form-control" id='descripcion-empresa-input' class='descripcion-empresa-input' rows="3">
                                                                <?=$data_empresa["quienes_somos"]?>
                                                              </textarea>
                                                            </div>      
                                                          </div>      
                                                    </div>
                                                  </div>











                
                
           </div>
        </div>
    </div>   
    
  <div class="row nav">    
        <div class="col-md-4 col-xs-12">

          <div data-toggle="modal" data-target="#generos_empresa"  id=''  >
                            <div class="panel" title=''>                                                                  
                                          <i style='color: black' class='fa fa-pencil-square-o ' ></i> <span   style='color:black;'>Representante de los mejores géneros musicales</span>
                                          <?=$tags_generos;?>                                          
                            </div>
          </div>


        </div>

        <div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
            <div class="col-md-4 col-xs-4 well">



                                    
                                          
                                          <i class='fa fa-pencil-square-o años-empresa-text' style='color:black;' id='años-empresa-text' ></i><span class='años-empresa-text_place' id="años-empresa-text_place"   style='color:black;'> <?=$data_empresa["años"];?> Años haciendo historia </span>
                                          <div class="input-group" id="años-section" class='años-section'>        
                                                <div class="input-group col-sm-12">                                                
                                                  <select class='form-control col-md-12' id='años-input'  name='años-input'>
                                                    <?=$years;?>
                                                  </select>
                                                </div>                                        
                                            </div>                                    
                                    



            </div>
            

            <div class="col-md-4 col-xs-4 well">

                                  <div class="panel-body p-states" >                                                                              
                                            <h4>País origen </h4>
                                            <div class='pais_empresa_text' >  
                                              <h3 id='text-nombre-empresa'><?=$data_empresa["countryName"]?></h3>
                                            </div>                                            
                                            <div class='pais_empresa_input'>
                                              <select class="form-control sm" id="pais-select" name="pais">
                                                <?=$select_pais;?>
                                              </select>
                                            </div>
                                      
                                      
                                  </div>
                                


            </div>
            <div class="col-md-4 col-xs-4 well"><i class="fa fa-thumbs-o-up fa-lg"></i> 26</div>
        </div>
    </div>
</div>





















<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <div class="row panel">

                <div class='text-center' title='Actualizar nombre de la empresa' style='padding:10px; '>
                  <h3 class='nombre-empresa-text' id='nombre-empresa-text'>
                    Nuestra historia
                  </h3>
                </div>


        <div class="col-md-12  col-xs-12">

           <div class="header">
          
                                        <div class='col-md-12'>      
                                          <div title='Actualizar información'>                                                                                      
                                              <span class='mas-info-empresa-text designation ' id='mas-info-empresa-text'> + Información <i class="fa fa-pencil-square-o"></i></span>                                          
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
                                              <span class="input-group-addon" id="sizing-addon1">+ Info </span>
                                              <textarea name='mas_info_empresa' class="form-control"   id='mas-info-empresa-input'   rows="3">
                                                <?=$data_empresa["mas_info"]?>
                                              </textarea>       
                                            </div>
                                          </div>    
                                        </div>

           </div>
        </div>
        
    </div>   
    
  
</div>



















<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
  <div class="row panel">
    <div class="col-md-6  col-xs-12 bg_blur ">

                  <h3>
                    Nuestra Misión
                  </h3>
                                        <div class='col-md-12'>      
                                          <div title='Actualizar información'>                                                                                      
                                              <span class='designation misions-empresa-text' id='mision-empresa-text'> Misión <i class="fa fa-pencil-square-o"></i></span>                                          
                                          </div>
                                        </div>

                                        <div class='col-md-12'>      
                                          <em class='mision-empresa-text_place' id="mision-empresa-text_place">
                                             <?=$data_empresa["mision"]?>
                                          </em>
                                        </div>
                                        <div class='col-md-12'>        
                                          <div id="section-mision-empresa" class='row section-mision-empresa'>
                                            <div class="input-group">               
                                              <span class="input-group-addon" id="sizing-addon1">Misión</span>
                                              <textarea class="form-control" id='mision-empresa-input' class='mision-empresa-input' rows="3">
                                                <?=$data_empresa["mision"]?>
                                              </textarea>
                                            </div>
                                         </div>     
                                       </div>     




        
    </div>
        <div class="col-md-6  col-xs-12">
           <div class="header">
                
                
                  <h3>
                    Nuestra Visón
                  </h3>
                


                        
 <div class='col-md-12'>              
                                          <div title='Actualizar información' >                                                                                      
                                              <span class='designation vision-empresa-text' id='vision-empresa-text'> Visión <i class="fa fa-pencil-square-o"></i></span>                                          
                                          </div>
                                        </div>
                                        <div class='col-md-12 '>              
                                          <em class='vision-empresa-text_place' id="vision-empresa-text_place">
                                             <?=$data_empresa["vision"]?>
                                          </em> 
                                        </div> 
                                        <div class='col-md-12'>                                                    
                                          <div id="section-vision-empresa" class='section-vision-empresa'>
                                            <div class="input-group">               
                                              <span class="input-group-addon" id="sizing-addon1">Visión</span>
                                              <textarea class="form-control" class="form-control descripcion-vision-input" id='descripcion-vision-input' rows="3">
                                                <?=$data_empresa["vision"]?>
                                              </textarea>
                                            </div>
                                         </div>     
                                       </div>     


   
                
           </div>
        </div>
    </div>       
</div>












    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">More About Joe</h4>
                    </div>
                <div class="modal-body">
                    <center>
                    <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading">Joe Sixpack <small>USA</small></h3>
                    <span><strong>Skills: </strong></span>
                        <span class="label label-warning">HTML5/CSS</span>
                        <span class="label label-info">Adobe CS 5.5</span>
                        <span class="label label-info">Microsoft Office</span>
                        <span class="label label-success">Windows XP, Vista, 7</span>
                    </center>
                    <hr>
                    <center>
                    <p class="text-left"><strong>Bio: </strong><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                    <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about Joe</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>





















































<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>








<style type="text/css">
.section-description-empresa, #nombre-empresa-section, 
.section-mision-empresa,.section-vision-empresa, #años-section,
 #section-mas-info {
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
<style type="text/css">
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
  //background: #32AE94 !important;
  //color: white;
}

</style>

<script type="text/javascript" src="<?=base_url('application/js/directorio/emp.js')?>"></script>
  















<!--*****************************************************************************-->
<div id="modal-contactos" class="modal fade" >  
<div class="modal-dialog modal-lg">
  <div class="modal-content">      
      <!--*************************** Header modal *********************************-->

      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" title='Por cuales medios pueden localizar a la empresa' >Medios de contacto</h4>
      </div>            
      <!--***************************End Header modal *********************************-->
      <div class="modal-body">                  
        <form class='form-contactos' id="form-contactos" method="post" action="<?=base_url('index.php/api/contactos/contacto_emp/format/json/')?>">
    
<div class='status-registro'>

    <div class="alert alert-success" role="alert">
        <i class="fa fa-check"></i>
        Contacto actualizado.!
    </div>
</div>


     
    <div class='col-lg-12'>
        <div class='col-lg-6'>
          <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Nombre 
                </span>
                
                <input type="text" class="form-control" name="nombre" placeholder="Nombre"  value="<?=$contacto['nombre']?>" required>
             </div>
          </div>
        </div>
        <div class='col-lg-6'>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Organización
                </span>            
                <input type="text" class="form-control" value="<?=$contacto['organizacion']?>"  name="organizacion" placeholder="Añadir nombre de la organización">
             </div>
         </div>
         </div>
    </div> 





    <div class='col-lg-12'>
        <div class='col-lg-6'>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Tel.
                    </span>
                    <input class="form-control" name="telefono" value="<?=$contacto['tel']?>"    placeholder="Teléfono" type="text" required>
                 </div>
             </div>
        </div>     
        <div class='col-lg-6'>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Móvil 
                </span>
                <input class="form-control" name="movil"   placeholder="Teléfono celular"  value="<?=$contacto['movil']?>"  type="text">
             </div>

         </div>
        </div>
    </div>

    <div class='col-lg-12'>
        <div class='col-lg-12'>
          <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Página web  www
                </span>
                <input class="form-control" name="pagina_web"  value="<?=$contacto['pagina_web']?>"   placeholder="http://enidservice.com/home/" type="url">
             </div>
         </div>
        </div> 
    </div>


    <div class='col-lg-12'>
        <div class='col-lg-12'>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Facebook
                </span>
                <input class="form-control" name="pagina_fb" value="<?=$contacto['pagina_fb']?>"  type="url">
             </div>
         </div>
        </div> 
    </div> 

    <div class='col-lg-12'>
        <div class='col-lg-12'> 
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Twitter
                </span>
                <input class="form-control" name="pagina_tw"  value="<?=$contacto['pagina_fb']?>"  type="url">
             </div>
        </div>
     </div>
    </div> 

    <div class='col-lg-12'> 
        <div class='col-lg-12'> 
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Dirección
                </span>
                <input class="form-control" name="direccion"   placeholder="Av. sur 89 col...  " value="<?=$contacto['direccion']?>" type="text">
             </div>

         </div>
         </div>
     </div>


    <div class='col-lg-12'>
        <div class='col-lg-6'>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Correo Electrónico @
                    </span>
                    <input class="form-control" value="<?=$contacto['correo']?>"  name="correo"   placeholder="arithgrey@gmail.com" type="text">
                 </div>

             </div>
        </div>

        <div class='col-lg-6'>
         <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Correo alterno @
                    </span>
                    <input class="form-control" name="correo_alterno"  value="<?=$contacto['correo_alterno']?>"   placeholder="arithgrey@gmail.com" type="text">
                 </div>

             </div>    


        </div>

    </div> 


    

    
    <div class="form-group">
        <label class="col-sm-12 control-label">Nota</label>
        
        <textarea rows="12" name="nota" class="col-sm-12 form-control">
        <?=$contacto['nota']?></textarea>
        
    </div>
     

    
    <button type="submit" id="button-registrar" class="btn btn-default btn_save ">Registrar</button>



</form>

        
      </div><!--*********************Termina body modal ******************* -->             


      <!--Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>

</div>













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





















<section id="last">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="margin-top-0 wow fadeIn" style="visibility: hidden; animation-name: none;">Get in Touch</h2>
                <hr class="primary">
                <p>We love feedback. Fill out the form below and we'll get back to you as soon as possible.</p>
            </div>
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <form class="contact-form row">
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" placeholder="Phone">
                    </div>
                    <div class="col-md-12">
                        <label></label>
                        <textarea class="form-control" rows="9" placeholder="Your message here.."></textarea>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <button type="button" data-toggle="modal" data-target="#alertModal" class="btn btn-primary btn-block btn-lg">Send <i class="ion-android-arrow-forward"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
