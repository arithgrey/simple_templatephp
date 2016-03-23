<div class='pag-2-section' id="pag-2-section"></div>
<div class='pag-2 animated' id='pag-2' style="display:none">	
	<section id="last" class='calificaciones'>
	    <div class="container">
	        <div class="row">
	        <button class='btn btn-default btn_save' id='btn-artista'>
		        Solicita tu artista.!
		    </button>
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
	                        <button type="submit"  class="btn btn-default btn_save">
	                        	Registrar
	                        </button>
	                        <br>

	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</section>  
</div>

<?=$this->load->view('empresa/solicita_artista')?>