<div class="row animated rubberBand"  >  
  <!--El nombre de la empresa -->
  <center>
      <div class='nombre-emp'>        
        <h1 class='nombre-empresa-text' id='nombre-empresa-text' >
          <strong>  
          <?=$data_empresa["nombreempresa"];?>                  
          </strong>  
        </h1>   
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
            <input type="text"  value="<?=$data_empresa["nombreempresa"];?>" name='nnombre_empresa' class="form-control nombre_empresa"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
        </div>
        <div class='place_nombre_empresa'>
        </div>
      </div>
  </center>  
  <!--Termina el nombre de la empresa -->
  <div>    
      <section>
        <div class='slogan-emp'>      
            <span class="slogan-text designation" id="slogan-text" >
              <?=$data_empresa["slogan"];?>                  
            </span>                 
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
        <div class='response-update-slogan' id='response-update-slogan'>
        </div>  
      </section>

  </div>
</div>