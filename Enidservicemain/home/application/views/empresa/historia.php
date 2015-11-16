<div class="row" style='padding:15px; margin-top:-15px;'>
  <div class="col-md-4 blue-col-enid">                  
                    <div class="row">
                        <div class="col-md-12"  data-toggle="modal" data-target="#modal-logo-empresa"  id='modal-img-logo-empresa'  >
                          <br>
                            <div class="panel" title='Actualizar logo  de la empresa'>                              
                                <div class="panel-body">
                                    <div class="profile-pic text-center">                                                                              
                                        <img src="<?=$logo_imagen;?>" id="logo_empresa_img" class='logo_empresa_img'>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-12"  data-toggle="modal" data-target="#"  id=''  >
                            <div class="panel" title='Actualizar logo  de la empresa'>
                                <div class="panel-body">
                                    <div class="profile-pic text-center">
                                          
                                          <i class='fa fa-pencil-square-o años-empresa-text' style='color:black;' id='años-empresa-text' ></i><span class='años-empresa-text_place' id="años-empresa-text_place"   style='color:black;'> <?=$data_empresa["años"];?> Años haciendo historia</span>
                                          <div class="input-group" id="años-section" class='años-section'>        
                                                <div class="input-group col-md-12">                                                
                                                  <select class='form-control col-md-12' id='años-input'  name='años-input'>
                                                    <?=$years;?>
                                                  </select>
                                                </div>                                        
                                            </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-12" >
                            <div class="panel" title='Actualizar logo  de la empresa'>
                                <div class="panel-body" style='background:rgb(20, 21, 15) none repeat scroll 0% 0%;'>
                                    <div class="profile-pic text-center">
                                          
                                          <div style='color:white;'>
                                            <span>País origen </span>
                                              <div class='pais_empresa_text' >  
                                                <h4 id='text-nombre-empresa'>
                                                  <i class='fa fa-pencil-square-o' style='color:;' ></i>
                                                  <?=$data_empresa["countryName"]?>
                                                </h4>
                                              </div>                                            
                                              <div class='pais_empresa_input'>

                                                <select class="form-control" id="pais-select" name="pais">
                                                  <?=$select_pais;?>
                                                </select>
                                              </div>
                                          </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <!--
                              <div class="col-md-12" >
                                  <div class="panel-body p-states"  style='background:red !important;' title='Actualizar información' >                                  
                                          <h4 class='años-empresa-text' id='años-empresa-text'  >Años  <span>haciendo historia</span> <i class="fa fa-pencil-square-o"></i></h4>
                                          <h3 class='años-empresa-text_place' id="años-empresa-text_place">
                                          <?=$data_empresa["años"];?>
                                          </h3>                                                                                                                  
                                            <div class="input-group" id="años-section" class='años-section'>        
                                                <div class="input-group col-md-12">                                                
                                                  <select class='form-control col-md-12' id='años-input'  name='años-input'>
                                                    <?=$years;?>
                                                  </select>
                                                </div>                                        
                                            </div>                                    
                                    </div>                        
                              </div>                        

                              <div class="col-md-12" >
                                  <div class="panel-body p-states  medios-contacto" style='background:#000 none repeat scroll 0% 0% !important' data-toggle="modal" data-target="#modal-contactos" title='Por cuales medios pueden localizar a la empresa'  >
                                      <div class="summary pull-left">
                                          <h4  >
                                            Medios de  <span>contacto <i class="fa fa-mobile"></i></span></h4>
                                            <h3 id='resumen-num-contactos'><?=$empresa_contactos_num;?></h3>
                                      </div>                                    
                                  </div>
                              </div>
                                
                        
                                <div style='col-md-12'>
                                  <div class="panel-body p-states" style='background:#000 none repeat scroll 0% 0% !important'  >                                                                              
                                            <h4>País origen </h4>
                                            <div class='pais_empresa_text' >  
                                              <h3 id='text-nombre-empresa'><?=$data_empresa["countryName"]?></h3>
                                            </div>                                            
                                            <div class='pais_empresa_input'>
                                              <select class="form-control" id="pais-select" name="pais">
                                                <?=$select_pais;?>
                                              </select>
                                            </div>
                                      
                                      
                                  </div>
                                </div>


  -->                                            
  </div>
</div>




                <div class="col-md-8" style='background:#1C84A7 none repeat scroll 0% 0% !important; padding:10px;' >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="panel" >
                                <div class="panel-body">
                                    <div class="profile-desk"> 
                                          <div class="col-md-12" >                                 
                                          <div  title='Actualizar nombre de la empresa'>
                                            <h1 class='nombre-empresa-text' id='nombre-empresa-text'>
                                               Empresa  <?=$data_empresa["nombreempresa"];?>
                                            </h1>     
                                          </div>
                                          <!--Editar nombre empresa -->
                                          <div class='nombre-empresa-section' id="nombre-empresa-section">
                                            <div class="input-group">        
                                              <span class="input-group-btn">
                                                  <button class="btn btn-default" type="button">Nombre </button>
                                              </span>
                                              <input type="text"  value="<?=$data_empresa["nombreempresa"];?>" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
                                            </div>
                                          </div>
                                          </div>




                                        
                                        <div class='col-md-12'>
                                            <div class='col-md-1 contactos-sec' style="" data-toggle="modal" data-target="#modal-contactos" title='Por cuales medios pueden localizar a la empresa' >
                                              <a href=""><i class='fa fa-pencil-square-o'></i> </a>
                                            </div>   
                                            <div class='col-md-11'>
                                                
                                                <i title="Teléfono : <?=$contacto["tel"]?>   , Teléfono Móvil : <?=$contacto["movil"]?>" id="telefono-info" class="fa fa-mobile"></i>
                                                
                                                <i title="email:  <?=$contacto["correo"]?> , email alterno : <?=$contacto["correo_alterno"] ?>" class="fa fa-envelope-o"></i>
                                                <i title="Dirección : <?=$contacto["direccion"] ?>" class="fa fa-map-marker"></i>
                                                <a class='web_link' href="<?=$contacto["pagina_fb"]?>"><i class="fa fa-facebook"></i></a>
                                                <a class='web_link' href="<?=$contacto["pagina_tw"]?>"><i class="fa fa-twitter"></i></a>  
                                                <a class='web_link' href="<?=$contacto["pagina_web"]?>">www</a>  
                                            </div>    
                                        </div>    

                                        
                                        
<!--*********************************************Quienes somos *********************************************-->
                                        <div class='col-md-12'>
                                          <div title='Actualizar información'>                                                                                        
                                              <span class="designation description-empresa-text" id="description-empresa-text"> Quiénes somos <i class="fa fa-pencil-square-o"></i></span>                                          
                                          </div>
                                        </div>

                                        <div class='col-md-12'>
                                          <p  class='description-empresa-text_place' id="description-empresa-text_place">
                                             <?=$data_empresa["quienes_somos"]?>
                                          </p>
                                        </div>




                                        <div class='col-md-12'>
                                        <div class='section-description-empresa' id="section-description-empresa">
                                              <div class="input-group">               
                                                <span class="input-group-addon" id="sizing-addon1" title='editar'>Quiénes somos</span>
                                                <div >        
                                                  <textarea class="form-control" id='descripcion-empresa-input' class='descripcion-empresa-input' rows="3">
                                                    <?=$data_empresa["quienes_somos"]?>
                                                  </textarea>
                                                </div>      
                                              </div>      

                                        </div>
                                        </div>






<!--*********************************************Misión empresa  *********************************************-->

                                        <div class='col-md-12'>      
                                          <div title='Actualizar información'>                                                                                      
                                              <span class='designation misions-empresa-text' id='mision-empresa-text'> Misión <i class="fa fa-pencil-square-o"></i></span>                                          
                                          </div>
                                        </div>

                                        <div class='col-md-12'>      
                                          <p class='mision-empresa-text_place' id="mision-empresa-text_place">
                                             <?=$data_empresa["mision"]?>
                                          </p>
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

<!--********************************************* Visión *********************************************-->




                                        <div class='col-md-12'>              
                                          <div title='Actualizar información' >                                                                                      
                                              <span class='designation vision-empresa-text' id='vision-empresa-text'> Visión <i class="fa fa-pencil-square-o"></i></span>                                          
                                          </div>
                                        </div>
                                        <div class='col-md-12'>              
                                          <p class='vision-empresa-text_place' id="vision-empresa-text_place">
                                             <?=$data_empresa["vision"]?>
                                          </p> 
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

<!--********************************************* *********************************************-->





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

  <!--************************************* ***********************************-->



































                                        
                                    </div>
                                </div>
                            </div>
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



.description-empresa-text:hover, .misions-empresa-text:hover, .vision-empresa-text:hover, .mas-info-empresa-text:hover, .años-empresa-text:hover{
  padding: 2px;
  cursor: pointer;

}
</style>






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
.wrapper{
  background:  #124048;
}.title_main{
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
  color: #00A5FF;
}
</style>

<script type="text/javascript" src="<?=base_url('application/js/directorio/emp.js')?>"></script>
  

