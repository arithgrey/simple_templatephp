<button  type="button" class=" nuevo_user btn btn btn_nnuevo " title='Registra un nuevo integrante a la cuenta' >
  + Nuevo miembro
</button>                
<div class='row'>
  <div class="form-group">  
    <form class='form-busqueda-user' action='<?=base_url("index.php/api/cuentageneralrest/integrantescuenta/format/json")?>'>           
      <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="input-group ">                      
          <div class="input-group-addon">
              Miembro de la cuenta 
          </div>
          <input list="integrantes-list" id="integrantes-l" class='integrantes-l form-control input-sm' name='nombre_b'>    
            <?=$integrantes_filtro;?>                                                  
        </div>      
      </div>                                    
      <div class="col-md-3 col-sm-3 col-lg-3">                
          <div class="input-group">                                                   
            <span class="input-group-addon">
                          Turno
            </span>
            <select name="turno_b" class="form-control input-sm" id="turno_b">
              <option value="TODOS">
                TODOS
              </option>
              <option value="Matutino">
                            Matutino
              </option>
              <option value="Vespertino">
                          Vespertino
              </option>
              <option value="Nocturno">
                          Nocturno
              </option>
              <option value="Mixto">
                          Mixto
              </option>
            </select>                            
          </div>                      
      </div>
      <div class="col-md-2 col-sm-2 col-lg-2">
        <div class="input-group">
          <span class="input-group-addon">
            Estado
          </span>
          <select name="estatus_b" id="estatus_b" class="form-control input-sm">            
            <option value="TODOS">
              TODOS
            </option>      
            <option value="Usuario Activo">
              Usuario Activo
            </option>
            <option value="Inactivo">
              Inactivo
            </option>
            <option value="Baja">
              Baja
            </option>
          </select>
        </div>                      
      </div> 

      <div class="col-md-2 col-sm-2 col-lg-2">
        <div class="input-group">
          <span class="input-group-addon">
              Perfil
          </span>
          <select name="perfil_b" class="perfil_b form-control input-sm" id="perfil_b">         
              <option value="TODOS">
                TODOS
              </option> 
             <option value="4">
              Administrador de cuenta 
             </option>
             <option value="5">
              Estratega digital 
             </option>
             <option value="6">
              Director de la empresa 
             </option>
          </select>
        </div>         
      </div>         
      <div class="col-md-1 col-sm-1 col-sm-1">
        <button class='btn btn_busqueda' id='btn-busqueda'>
          Buscar
        </button>
      </div>
    </form>               
  </div>
</div>
