
<div class='container'>
  <div class="panel">
      <div class="panel-body">
          <div class="profile-desk">          
              <span class="designation">
              Carga al evento los servicios que disfrutarán los asistentes. 
              </span>
              <a href="<?=base_url('index.php/eventos/diaevento')?>/<?=$evento;?>">
                <button class='btn btn-default pull-right'>
                Ver como el público
              </button>            
              </a>
              

              <div class='alert-ok' id='alert-ok-servicios'>              
                <em>
                    Servicios actualizador correctamente.!
                </em>
              </div>
              <div class='alert-fail' id='alert-fail-servicios'>
                <em>
                    Falla al cargar lo servicios al evento, reportar al administrador
                </em>
              </div>                             
              <!--Lista de servicios inicia-->
              <div class='list-servicios' id='list-servicios'></div>
              <!--Lista de servicios termina-->
          </div>
      </div>
  </div>
</div>






            





















<!--
<a href="<?=base_url('index.php/templates/eventos')?>">
	<button class='btn  btn-template'>
		Cargas más servicios a mi organización 
	</button>
</a>
-->






<!--Modal configuración eventos -->


<div class="modal fade" id="modal-nota" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>
            <h4 class="modal-title" >
               Cargar nota para el público
            </h4>
        </div>
        <div class="modal-body">                

              <textarea rows="6" name="nota"  id='nota' class="form-control">
              </textarea>
              <br>
              <div class='alert-ok' id='alert-ok-nota'>
              	<em>
              		Nota para el público actualizada
              	</em>
              </div>

              <div class='alert-fail' id='alert-fail-nota'>
              	<em>
              		Error al actualizar nota para el público, reportar al administrador del sistema 
              	</em>
              </div>
              <button class='btn btn-default btn_save' id='actualizar-nota-btn'>
              	Actualizar nota para el público
              </button>
        </div>            
        <div class="modal-footer">                
            <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
            </button>
        </div>
    </div>
  </div>
</div>



<!--Modal configuración eventos -->







<style type="text/css">
.servicio_nota:hover{
	cursor: pointer;
  padding: 10px;
}
</style>
<script type="text/javascript" src="<?=base_url('application/js/evento/servicios/principal.js')?>"></script>
<input type='hidden' id="evento" value="<?=$evento;?>">

<!--

<div>
  <a href="<?=base_url('index.php/eventos/nuevo/')?>/<?=$evento;?>">
    <button class='btn btn btn_nnuevo'>
      <i class='fa fa-home'></i>
      EVENTO
    </button>
  </a>
  
  <a href="<?=base_url('index.php/accesos/configuracionavanzada/0/')?>/<?=$evento;?>">
    <button class='btn btn btn_nnuevo'>
      <i class='fa fa-money'> </i>
      Cargar accesos y puntos de venta
    </button>
  </a>


  <a href="<?=base_url('index.php/eventos/diaevento/')?>/<?=$evento;?>">
    <button class='btn btn btn-ver'>
      <i class='fa  fa-arrow-circle-o-right'> </i>
      Ver como el público
    </button>
  </a>
</div>                        
-->