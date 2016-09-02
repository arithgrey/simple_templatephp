
<div class="panel panel-seccion-right">
  <header class="panel-heading">
    <button  type="button" class=" nuevo_user btn btn btn_nnuevo " title='Registra un nuevo integrante a la cuenta' >
      + Nuevo
    </button>                
    <span class="pull-right">
      Miembros de la cuenta
    </span>
  </header>
  <div class="panel-body">
    <form class='form-busqueda-user' action='<?=base_url("index.php/api/cuentageneralrest/integrantescuenta/format/json")?>'>   
      <div class="row">  
        
        <div class='form-first-part'>      

          <div class='col-lg-6 col-md-6 col-sm-12'>
            <span class="text-filtro-enid">
              + Filtros
            </span>
            
            <div class="input-group">                      
              <div class="input-group-addon">
                  Usuario
              </div>
              <input id="integrantes-l" class='integrantes-l form-control input-sm' name='nombre_b'>                    
            </div>              
          </div>                       
          <!---->
          <div class='col-lg-6 col-md-6 hidden-field-mov'>
            <div class="input-group">                                                   
              <span class="input-group-addon">
                  Turno
              </span>
              <?=create_select_turnos('turno_b' ,  'form-control input-sm' , 'turno_b' )?>       
            </div>                      
          </div>       
        </div>   
          <!----> 
        <div class='form-second-part'>      
          <div class='col-lg-6 col-md-6 hidden-field-mov'>              
            <div class="input-group">
              <span class="input-group-addon">
                    Estado
              </span>
              <?=create_select_estatus('estatus_b' ,  'form-control input-sm' , 'estatus_b')?>          
            </div>                                    
          </div>
          <!---->
          <div class='col-lg-6 col-md-6 hidden-field-mov'>          
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
        </div>  
      </div>                   
      <div class="separate-enid">        
      </div>
      <button class='btn btn_busqueda pull-right' id='btn-busqueda'>
        Buscar
      </button>
    </form>  
  </div>
</div>






















