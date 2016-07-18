<?=construye_header_modal('contact-delete', " Eliminar contacto " );?>
Realmente decea eliminar el contacto ??
<button type="button" class="btn btn-default" id="aceptar-delete" data-dismiss="modal">
Aceptar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cancelar
</button>   
<?=construye_footer_modal()?>                         
    <!--Termina nuevo contacto -->

            
<!--MODAL  Eliminar contacto  termina -->



<!--************************************************** NOTA DEL CONTACTO-->
<?=construye_header_modal('contact-nota', " Nota del contacto " );?>                           
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
<?=construye_footer_modal()?>  
<!--************************************************** TERMINA NOTA DEL CONTACTO-->
























<!--Cargar nuevo contacto modal  -->
<?=construye_header_modal('contact-modal', " Registrar contacto " , 0);?>                                     
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
                            
                            <input type="text" class="form-control input-sm uppercase_enid " name="nombre" placeholder="Nombre" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                         </div>
                      </div>
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6 '>
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Organización
                            </span>            
                            <input type="text" class="form-control input-sm uppercase_enid" name="organizacion" placeholder="Añadir nombre de la organización" onkeyup="javascript:this.value=this.value.toUpperCase();">
                         </div>
                     </div>
                     </div>
                </div> 
                <div class='col-lg-12 col-md-12 col-sm-12 '>
                    <div class='col-lg-6 col-md-6 col-sm-6'>
                        <div class="form-group">            
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                Tel.
                                </span>
                                <input class="form-control input-sm" name="telefono" id="input_tel_contacto" placeholder="Teléfono" type="tel" maxlength="10" required>                                                                
                            </div>
                        </div>
                        <span class='place_tel_vali validado' id='place_tel_vali'>
                        </span>
                    </div>     

                    <div class='col-lg-6 col-md-6 col-sm-6'>
                        <div class="form-group">            
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                ext.-
                                </span>
                                <input class="form-control input-sm" name="extension"   placeholder="extension" type="text" maxlength="10" >
                            </div>
                        </div>
                    </div>     

                    <div class='col-lg-5 col-md-5 col-sm-5'>
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Móvil 
                            </span>
                            <input class="form-control input-sm" name="movil"   placeholder="Teléfono celular" type="tel" maxlength="10" >
                         </div>

                     </div>
                    </div>
                    <div class='col-lg-7 col-md-7 col-sm-7 '>
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
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                https://www.facebook.com/
                            </span>
                            <input class="form-control input-sm" name="pagina_fb"  type="text" placeholder='enidservice'>
                         </div>
                     </div>
                    </div>
                    <div class='col-lg-12 col-md-12 col-sm-12 '> 
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
                            <input class="form-control input-sm " name="direccion uppercase_enid"   placeholder="Av. sur 89 col...  " type="text" onkeyup="javascript:this.value=this.value.toUpperCase();">
                         </div>

                     </div>
                     </div>
                 </div>


                <div class='col-lg-12'>
                    <div class='col-lg-6 col-md-6 col-sm-12'>
                         <div class="form-group">            
                             <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    Correo @
                                </span>
                                <input class="form-control input-sm" name="correo"   placeholder="arithgrey@gmail.com" type="text">
                             </div>

                         </div>
                    </div>

                    <div class='col-lg-6 col-md-6 col-sm-12'>
                         <div class="form-group">            
                             <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    Correo alterno @
                                </span>
                                <input class="form-control input-sm" name="correo_alterno"   placeholder="arithgrey@gmail.com" type="text">
                             </div>

                         </div>
                    </div>

                    <div class='col-lg-6 col-md-6 col-sm-12'>
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


                <div class="animationload" id='loading_nuevo_contacto' style='display:none'>
                  <div class="osahanloading">
                  </div>
                </div>                  
                <button type="submit" id="button-registrar" class="btn btn-default btn_save ">Registrar</button>



            </form>


                <!--Termina nuevo contacto -->  
<?=construye_footer_modal()?>  
<!--Terminamos   de  Cargar nuevo contacto modal  -->























































































<?=construye_header_modal('contact-modal-edit', " Editar la información del contacto " , 0);?>                     
<!--Nuevo contacto form -->
<span class='estado_edicion_contacto'></span>
<form class='form-contactos-edit    ' id="form-contactos-edit" action="<?=base_url('index.php/api/contactos/contacto/format/json/')?>">        
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
                    <input type="text" class="form-control input-sm uppercase_enid" name="nnombre" id='nnombre' placeholder="Nombre" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                 </div>
             </div>
         </div>




         <div class='col-lg-6 col-md-6 col-sm-6 '>
            <div class="form-group">            
                 <div class="input-group">
                    <span class="input-group-addon">
                        Nueva organización
                    </span>
                    
                    <input type="text" class="form-control input-sm  uppercase_enid" id="norganizacion" name="norganizacion" placeholder="Añadir nombre de la organización" onkeyup="javascript:this.value=this.value.toUpperCase();">
                 </div>
             </div>
         </div>


    </div>

    





    <div class='col-lg-12 col-sm-12  col-md-12 '>
        <div class='col-lg-6 col-md-6 col-sm-12 '>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Nuevo Tel.
                    </span>
                    <input class="form-control input-sm"  id="input_tel_contacton" name="ntelefono"  id="ntelefono"   placeholder="Teléfono" type="tel" required maxlength="10"  >
                 </div>
                 <span class='place_tel_valin validado' id='place_tel_vali n'>
                 </span>
             </div>
         </div>
         <div class='col-lg-6 col-md-6 col-sm-12 '>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Nueva ext.-
                    </span>
                    <input class="form-control input-sm" name="nextension"  id="nextension"   type="text" maxlength="10" >             
                </div>
             </div>
         </div>

         <div class='col-lg-6 col-md-6 col-sm-6 '>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Nuevo Móvil 
                    </span>
                    <input class="form-control input-sm" name="nmovil" id="nmovil"   placeholder="Teléfono celular" type="tel" maxlength="14"  >
                 </div>

             </div>
         </div>
         <div class='col-lg-6 col-md-6  col-sm-6'>
            <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Página web  www
                    </span>
                    <input class="form-control input-sm " name="npagina_web" id="npagina_web"   placeholder="www" type="url">
                 </div>
             </div>
         </div>
        


    </div> 



    <div class='col-lg-12 col-sm-12  col-md-12 '>
         
         <div class='row'>
         <div class='col-lg-12'>
            <div class='col-lg-12 col-md-12 col-sm-12 '>
                 <div class="form-group">            
                     <div class="input-group m-bot15">
                        <span class="input-group-addon">
                            https://twitter.com/
                        </span>
                        <input class="form-control input-sm  " name="npagina_tw" id='npagina_tw'  type="text" placeholder='enidservice'>
                     </div>
                 </div>
            </div>     
            <div class='col-lg-12 col-md-12 col-sm-12 '>
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
        <div class='col-lg-6 col-md-6  col-sm-6'>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Correo @
                    </span>
                    <input class="form-control input-sm"  name="ncorreo"  id="ncorreo"  placeholder="arithgrey@gmail.com" type="text">
                 </div>

             </div>

        </div>     
         <div class='col-lg-6 col-sm-6 col-md-6'>
             <div class="form-group">            
                 <div class="input-group">
                    <span class="input-group-addon">
                        Correo  alterno @
                    </span>
                    <input class="form-control input-sm" name="ncorreoalterno"  id="ncorreoalterno"  placeholder="arithgrey@gmail.com" type="text">
                 </div>

             </div>

        </div>   
        <div class='col-lg-6 col-md-6 col-sm-12'>
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
<?=construye_footer_modal()?> 
<!--termina la edición del contacto -->










<!--******************************* Cargar imagen a contacto *********************************************-->
<?=construye_header_modal('contact-imagen-modal', "Imagen al contacto  " );?>    
  <?=$this->load->view("imgs/contactos")?>
<?=construye_footer_modal()?> 