<div class='col-lg-6 col-lg-offset-3  col-md-6 col-md-offset-3 col-sm-10  col-sm-offset-1'>
  <div class="animated rubberBand">  
    <!--El nombre de la empresa -->
        <div>        
          <h1 class='nombre-empresa-text' id='nombre-empresa-text' >          
            <?=$data_empresa["nombreempresa"];?>                            
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
              <input type="text"    value="<?=$data_empresa["nombreempresa"];?>" name='nnombre_empresa' class="form-control nombre_empresa"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
          </div>
          <div class='place_nombre_empresa'>
          </div>
        </div>
        <!--Termina el nombre de la empresa -->  
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
                <input type="text"  value="<?=$data_empresa["slogan"];?>" name='nslogan' class="form-control"   
                id='nslogan' placeholder="Slogan de tu empresa">
            </div>
          </div> 
          <div class='response-update-slogan' id='response-update-slogan'>
          </div>  
        </section>
  </div>
</div>