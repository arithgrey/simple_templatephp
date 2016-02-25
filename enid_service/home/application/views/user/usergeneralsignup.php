<?=ini_set('display_errors', '1');?>
<script src="<?=base_url('application/js/sha1.js'); ?>"></script>
<script src="<?=base_url('application/js/home/registro/general.js'); ?>"></script>

<br>
<div class='row'>
	
		<div class='col-lg-4'></div>
		<div class="col-lg-4">
		        




					        <div class="enid-header-table">
					            <ul id="myTab" class="nav nav-tabs">

					              <li class="active">
					              	<a href="#signin" data-toggle="tab">
					              		<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>               		
					              		Registra ahora.!
					              	</a>
					              </li>              
					              	
					              	<li class="">
						              	<a href="#why" data-toggle="tab"> 
						              		<span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 
						              		+info
						              	</a>
					          		</li>


					            </ul>
					        </div>

		      
					        <div id="myTabContent" class="tab-content">
									        	<div class="tab-pane fade" id="why">
									        			<p>Enid service, es la plataforma prototipo 
									        			para la administración de eventos musicales 
									        			de forma inteligente.         			
									         			<a mailto:href="arithgrey@gmail.com"></a>
									         			para mayor información contactarse a:
									         			arithgrey@gmail.com </p>
									        	</div>

								        		<div class="tab-pane fade active in" id="signin">
								           			<!--Inicia registro-->
														<form class="" id="form_cuenta_general"  method="POST">
															
																	<!-- Username -->

																	<div class="input-group">
																	  <span class="input-group-addon" id="basic-addon1">Nombre</span>
																	  <input type="text" class="form-control" placeholder="Jonathan" 
																	  aria-describedby="basic-addon1" id="username" name="username">
																		<input type="hidden" name="otro" id="otro">
																	</div>
																
																
																	<!-- Correo electroónico -->
																

																	<div class="input-group">
																	  <span class="input-group-addon" id="basic-addon1">@ email</span>
																	  <input type="text" class="form-control" placeholder="Username"
																	   aria-describedby="basic-addon1" name="useremail" id="useremail">
																	</div>


																	<!-- Password-->
																	<div class="input-group">
																	  <span class="input-group-addon" >Contraseña</span>
																	  <input type="password" class="form-control" 
																	  name="userpassword" id="userpassword">
																	</div>
																	

																	<!-- Segundo pw -->
																	<div id="section_pw_hiden">


																		<div class="input-group">
																		  <span class="input-group-addon" >Confirmar **</span>
																		  <input type="password" class="form-control" 
																		  name="userpassword_confirm" id="userpassword_confirm">
																		</div>
										
																		<div class="input-group">
																		  <span class="input-group-addon" >Empresa</span>
																		  <input type="text" class="form-control" 
																		  name="empresaname" id="empresaname">
																		</div>



																	</div>

																	<div class="checkbox">
															          <label>
															            <input id="termiinoscondition" value="0" type="checkbox"> 
															            He leído y acepto los términos y condiciones 
															          </label>
															        </div>


																	
																	<div class="control-group">
																		<!-- Button -->
																		
																			<label id="" class="button_segistro btn btn-info ">Registrar</label>

																			<div class='repo_section' id='repo_section'></div>
																		
																		
																	</div>								
														</form>
								           			<!--Termina Registro -->
								        		</div>
					    	</div>
					      
		      
		</div>
		<div class='col-lg-4'></div>
	
  
</div>
<br>






