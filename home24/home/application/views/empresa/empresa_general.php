


<div class="row animated rubberBand " style='height:90%; margin-left: 20%; margin-right:20%;' >  
  <!--El nombre de la empresa -->
    <div class='text-center'>
      <div class='nombre-emp'>        
        <h1 class='nombre-empresa-text' id='nombre-empresa-text' style='font-size:6em;'>
          <strong>  
          <?=$data_empresa["nombreempresa"];?>                  
          </strong>  
        </h1>   

        <div class='editar-nombre-empresa editar-lb-enid' id="editar-nombre-empresa">        
          <span >
            Editar el nombre de tu organización
            <i class='fa fa-pencil-square-o'>
            </i>
          </span>
        </div> 
        <div class='response-update-nombre'>
        </div>
      </div>
      <div class='nombre-empresa-section' id="nombre-empresa-section">
        <div class="input-group">        
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                Nombre 
              </button>
            </span>
            <input type="text"  value="<?=$data_empresa["nombreempresa"];?>" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
        </div>
      </div>
    </div>
<!--Termina el nombre de la empresa -->
  <div class='row text-center'>
    <!--El slogan de la empresa-->
      <div class='slogan-emp'>      
          <span class="slogan-text designation" id="slogan-text" style='font-weight: normal' >
            <?=$data_empresa["slogan"];?>                  
          </span>       
          <div class='editar-slogan-empresa editar-lb-enid'>
              <span >            
                Editar el slogan con el cual te identifica tu público
                <i class='fa fa-pencil-square-o'>
                </i>
              </span>
          </div>    
      </div>
      <div class='response-update-slogan' id='response-update-slogan'>
      </div>
      <div class='slogan-edit-section' id='slogan-edit-section'>
        <div class="input-group">        
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                slogan de la organización
              </button>
            </span>
            <input type="text"  value="<?=$data_empresa["slogan"];?>" name='nslogan' class="form-control"   id='nslogan' placeholder="Slogan de tu empresa">
          </div>
      </div>  
  </div>
</div>
