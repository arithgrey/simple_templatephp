
	    <div class="container">
	    	<a href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$data_empresa["idempresa"]?>" class='link-org'>
	    		<?=$data_empresa["nombreempresa"]?>
	    	</a>
	    	<div class='pull-right'>
				<a href="<?=base_url('index.php/emp/solicitatuartista/')?>/<?=$data_empresa["idempresa"]?>">
					<button class='btn btn-default btn_save' id='btn-artista'>
							Solicita tu artista.!
					</button>
				</a>
			</div>

	        <div class="row">
	        	
	          <form class='form-historia' id='form-historia'  action="<?=base_url('index.php/api/emp/historia_cliente/format/json/');?>" >                

	          <center id="section-cal">
	            <input type='hidden' name='emp' id="emp" value="<?=$data_empresa["idempresa"]?>"> 
	            <div class='col-md-12'>
	              <h4 id='section-start-calificaciones'>Calificanos .!
	              </h4>     
	              <div id="contenidor-ranking"> 
	              	<input type='hidden' name='calificacion' value='0' > 
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
	                        <input type="text" class="form-control" name='nombre_cliente' id='nombre_cliente' placeholder="Nombre (opcional)">
	                    </div>
	                    <div class="col-md-4">
	                        <label></label>
	                        <input type="email" class="form-control" name='email_cliente' id='email_cliente' placeholder="Tu email" required>
	                    </div>
	                    <div class="col-md-4">
	                        <label></label>
	                        <input type="tel" class="form-control" name='tel_cliente'  id='tel_cliente' placeholder="Tel" >
	                    </div>
	                    <div class="col-md-12">
	                        <label></label>
	                        <textarea id="descripcion" name="descripcion" id='descripcion'   class="form-control" rows="9" placeholder="Cuentanos tu experiencia" required></textarea>
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
	







<style type="text/css">

.section-experiencia-cliente{
  display: none;
}
.descripcion-section-q{
  background: #E4E6AC;
}
#form p {
  text-align: center;
}
input[type="radio"] {
  display: none;
}
label {
  color: #337AB7;
  font-size: 2.5em;
}
.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}
label:hover,
label:hover ~ label {
  color: #E8DBC2;
}
input[type="radio"]:checked ~ label {
  color: #E8DBC2;
}
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
  background: white !important;
  //color: white;
}
.solicitud-artista-section{
  display: none;
}

.principal-contenido-historia{
  display: none;
}

.profile-desk{
	display: none;
}
</style>






<script type="text/javascript" src="<?=base_url('application/js/directorio/emp.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/img.js')?>"></script>  
