<!--MODAL  Eliminar contacto  INICIA-->
<div class="modal fade in" id="contact-delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>            
                <h4  class='title-modal-contacto modal-title'>
                    Eliminar contacto 
                </h4>
            </div>
            <div class="modal-body">            
                Realmente decea eliminar el contacto ??
                <button type="button" class="btn btn-default" id="aceptar-delete" data-dismiss="modal">
                    Aceptar
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancelar
                </button>                            
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>            
            </div>
        </div>
    </div>
</div>
<!--MODAL  Eliminar contacto  termina -->

























<!--************************************************** NOTA DEL CONTACTO-->
<div class="modal fade in" id="contact-nota" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>            
                <h4  class='title-modal-contacto modal-title'>
                    Nota del contacto
                </h4>
            </div>
            <div class="modal-body">                            
                <form id='form-nota-contacto' class='form-nota-contacto' method='post' action="<?=base_url('index.php/api/contactos/nota/format/json/')?>">
                    <div class="form-group">
                        <label for="comment">
                        Nota del contacto
                        </label>

                        <textarea class="form-control nota-text-modal " rows="5" id="nota-text-modal"  name='nota-contacto-text'>
                        </textarea>
                    </div>
                    <div class='response-nota' id='response-nota'>
                    </div>
                    <button class='btn btn btn_nnuevo'>
                        Registrar cambios     
                    </button>                
                </form>                    
                <div class='edit-contact-mod'>
                </div>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
            </div>
        </div>
    </div>
</div>

<!--************************************************** TERMINA NOTA DEL CONTACTO-->
























<!--Cargar nuevo contacto modal  -->
<div class="modal fade in" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>            
                <h4  class='title-modal-contacto modal-title'>
                    Registrar contacto 
                </h4>
            </div>
            <div class="modal-body">
                
                <!--Nuevo contacto form -->
            <form class='form-contactos' id="form-contactos" method="post" action="<?=base_url('index.php/api/contactos/contacto/format/json/')?>">                
                

                
                <div class='panel  alert-ok' id='status-registro'>
                    <em>
                        Contacto registrado .! 
                    </em>
                </div>                       
                


                <div class='col-lg-12 col-sm-12  col-md-12  '>
                    <div class='col-lg-6 col-md-6 col-sm-6  col-sm-6 col-md-6 '>
                      <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Nombre 
                            </span>
                            
                            <input type="text" class="form-control input-sm" name="nombre" placeholder="Nombre" required>
                         </div>
                      </div>
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6 '>
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Organización
                            </span>            
                            <input type="text" class="form-control input-sm" name="organizacion" placeholder="Añadir nombre de la organización">
                         </div>
                     </div>
                     </div>
                </div> 
                <div class='col-lg-12 col-md-12 col-sm-12 '>
                    <div class='col-lg-5 col-md-5 col-sm-5'>
                        <div class="form-group">            
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                Tel.
                                </span>
                                <input class="form-control input-sm" name="telefono"   placeholder="Teléfono" type="tel" required>
                            </div>
                        </div>
                    </div>     

                    <div class='col-lg-2 col-md-2 col-sm-2'>
                        <div class="form-group">            
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                ext.-
                                </span>
                                <input class="form-control input-sm" name="extension"   placeholder="extension" type="text">
                            </div>
                        </div>
                    </div>     

                    <div class='col-lg-5 col-md-5 col-sm-5'>
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Móvil 
                            </span>
                            <input class="form-control input-sm" name="movil"   placeholder="Teléfono celular" type="tel">
                         </div>

                     </div>
                    </div>
                </div>
                <div class='col-lg-12 col-md-12 col-sm-12'>
                    <div class='col-lg-12 col-md-12 col-sm-12 '>
                      <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Página web  www
                            </span>
                            <input class="form-control input-sm" name="pagina_web"   placeholder="http://enidservice.com/home/" type="url">
                         </div>
                     </div>
                    </div> 
                </div>
                <div class='col-lg-12 col-md-12 col-sm-12 '>
                    <div class='col-lg-6 col-md-6 col-sm-6'>
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                https://www.facebook.com/
                            </span>
                            <input class="form-control input-sm" name="pagina_fb"  type="text" placeholder='enidservice'>
                         </div>
                     </div>
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-6 '> 
                         <div class="form-group">            
                             <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    https://twitter.com/
                                </span>
                                <input class="form-control input-sm" name="pagina_tw"  type="text" placeholder='enidservice'>
                             </div>
                        </div>
                     </div>
                </div> 
                
                <div class='col-lg-12 col-md-12 col-sm-12 '> 
                    <div class='col-lg-12'> 
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Dirección
                            </span>
                            <input class="form-control input-sm " name="direccion"   placeholder="Av. sur 89 col...  " type="text">
                         </div>

                     </div>
                     </div>
                 </div>


                <div class='col-lg-12'>
                    <div class='col-lg-4'>
                         <div class="form-group">            
                             <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    Correo @
                                </span>
                                <input class="form-control input-sm" name="correo"   placeholder="arithgrey@gmail.com" type="text">
                             </div>

                         </div>
                    </div>

                    <div class='col-lg-4'>
                         <div class="form-group">            
                             <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    Correo alterno @
                                </span>
                                <input class="form-control input-sm" name="correo_alterno"   placeholder="arithgrey@gmail.com" type="text">
                             </div>

                         </div>
                    </div>

                    <div class='col-lg-4'>
                        <div class="form-group" >
                            
                            <select class="form-control input-sm" name="tipo">            
                                <option value="Proveedor">Proveedor</option>
                                <option value="Artista">Artista </option>
                                <option value="Colaborador">Colaborador</option>
                                <option value="Contacto Comercial">Contacto comercial</option>
                                <option value="Cliente">Cliente</option>
                                <option value="Contacto personal">Contacto personal </option>
                                <option value="Institución">Institución</option>
                                <option value="Productora">Productora</option>
                                <option value="Patrocinador">Patrocinador</option>
                                <option value="Productora">Otro</option>
                            </select> 
                        </div>    


                    </div>

                </div> 


                

                
                <div class="form-group">
                    <label class="col-sm-12 control-label">Nota</label>
                    
                    <textarea rows="12" name="nota" class="col-sm-12 form-control"></textarea>
                    
                </div>                 
                
                <button type="submit" id="button-registrar" class="btn btn-default btn_save ">Registrar</button>



            </form>


                <!--Termina nuevo contacto -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>

<!--Terminamos   de  Cargar nuevo contacto modal  -->






















































































<!--Editar contacto  inicia-->
    <div class="modal fade in" id="contact-modal-edit" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4 class='title-modal-contacto modal-title'>Editar la información del contacto</h4>
            </div>
            <div class="modal-body">
                
                <!--Nuevo contacto form -->

<form class='form-contactos-edit' id="form-contactos-edit" action="<?=base_url('index.php/api/contactos/contacto/format/json/')?>">    
    
        <div class='panel  alert-ok' id='status-registro'>
            <em>
                Contacto registrado .!
            </em>
        </div>
    
    
     
    <div class='col-lg-12'>
        <div class='col-lg-6 col-md-6 col-sm-6 '>
          <div class="form-group">            
                <div class="input-group">
                    <span class="input-group-addon">
                        Nuevo nombre 
                    </span>                    
                    <input type="text" class="form-control input-sm" name="nnombre" id='nnombre' placeholder="Nombre" required>
                 </div>
             </div>
         </div>




         <div class='col-lg-6 col-md-6 col-sm-6 '>
        <div class="form-group">            
             <div class="input-group">
                <span class="input-group-addon">
                    Nueva organización
                </span>
                
                <input type="text" class="form-control input-sm " id="norganizacion" name="norganizacion" placeholder="Añadir nombre de la organización">
             </div>
         </div>
     </div>


    </div>

    





    <div class='col-lg-12 col-sm-12  col-md-12 '>
        <div class='col-lg-4 col-md-4 col-sm-4 '>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Nuevo Tel.
                </span>
                <input class="form-control input-sm " name="ntelefono"  id="ntelefono"   placeholder="Teléfono" type="tel" required>
             </div>
         </div>
         </div>


         <div class='col-lg-3 col-md-3 col-sm-3 '>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Nueva ext.-
                </span>
                <input class="form-control input-sm" name="nextension"  id="nextension"   type="text" >             
            </div>
         </div>
         </div>

         <div class='col-lg-5 col-md-5 col-sm-5 '>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Nuevo Móvil 
                </span>
                <input class="form-control input-sm" name="nmovil" id="nmovil"   placeholder="Teléfono celular" type="tel">
             </div>

         </div>
         </div>

    </div> 



    <div class='col-lg-12 col-sm-12  col-md-12 '>
        <div class='col-lg-12 col-md-12  col-sm-12'>

        <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Página web  www
                </span>
                <input class="form-control input-sm " name="npagina_web" id="npagina_web"   placeholder="www" type="url">
             </div>
         </div>
         </div>
         
         <div class='row'>
         <div class='col-lg-12'>
            <div class='col-lg-6 col-md-6 col-sm-6 '>
                 <div class="form-group">            
                     <div class="input-group m-bot15">
                        <span class="input-group-addon">
                            https://twitter.com/
                        </span>
                        <input class="form-control input-sm  " name="npagina_tw " id='npagina_tw'  type="text" placeholder='enidservice'>
                     </div>
                 </div>
            </div>     
            <div class='col-lg-6 col-md-6 col-sm-6 '>
                <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        https://www.facebook.com/
                    </span>
                    <input class="form-control" name="npagina_fb" id='npagina_fb'   type="text"  placeholder='enidservice' >
                 </div>
             </div>
            </div>    
         </div>
         </div>



         <div class='col-lg-12 col-sm-12  col-md-12   '>
         <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nueva dirección
            </span>
            <input class="form-control input-sm" name="ndireccion" id="ndireccion"   placeholder="Av. sur 89 col...  " type="text">
         </div>
        </div> 
     </div>
    </div>     





    <div class='col-lg-12 col-sm-12 col-md-12 '>
        <div class='col-lg-4 col-md-4  col-sm-4'>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Correo @
                    </span>
                    <input class="form-control input-sm"  name="ncorreo"  id="ncorreo"  placeholder="arithgrey@gmail.com" type="text">
                 </div>

             </div>

        </div>     
         <div class='col-lg-4 col-sm-4 col-md-4'>
             <div class="form-group">            
                 <div class="input-group">
                    <span class="input-group-addon">
                        Correo  alterno @
                    </span>
                    <input class="form-control input-sm" name="ncorreoalterno"  id="ncorreoalterno"  placeholder="arithgrey@gmail.com" type="text">
                 </div>

             </div>

        </div>   
        <div class='col-lg-4 col-md-4 col-sm-4'>
         <div class="form-group" >        
            <select class="form-control input-sm" id="ntipo" name="ntipo">
                <option >Seleccione</option>
                <option value="Proveedor">Proveedor</option>
                <option value="Colaborador">Colaborador</option>
                <option value="Contacto Comercial">Contacto comercial</option>
                <option value="Cliente">Cliente</option>
                <option value="Contacto personal">Contacto personal </option>
                <option value="Patrocinador">Patrocinador </option>
                <option value="Contacto personal">Otro </option>
            </select> 
        </div>    
        </div> 
    </div>







     
    
    <div class="form-group">
        <label class="col-sm-12 col-lg-12 col-md-12 control-label">Nueva nota</label>        
        <textarea rows="12" name="nnota" id="nnota" class="col-sm-12 form-control"></textarea>        
    </div>    
    <button id="button-update" class="btn btn-default btn_save">Actualizar información del  contacto</button>   
</form>

                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>
<!--termina la edición del contacto -->














































<!--******************************* Cargar imagen a contacto *********************************************-->
<div class="modal fade in" id="contact-imagen-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4   class='title-modal-contacto modal-title'>Cargar imagen al contacto </h4>
            </div>
            <div class="modal-body">
                
                <div class='row'>
                    <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_contacto" enctype="multipart/form-data" id='formulario-principal-img' >
                             <div class="form-group">
                                <span>Imagen:</span>
                                <input type="file" name="images[]"  id="imgs-contacto" class='imgs-contacto'>                                       
                             </div>                      

                             <div class='askmks'></div>
                             <div class='row'>
                                <div class='col-sm-1 col-md-1 col-lg-1'></div>    
                                <div class='col-sm-10 col-md-10 col-lg-10'>
                                    <div class='response_img_contacto' id='response_img_contacto'></div>
                                    <div class='lista-imagenes' id='lista-imagenes'></div>
                                </div>
                                <div class='col-sm-1 col-md-1 col-lg-1 '></div>    
                             </div>

                    </form>
                </div>

                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>
