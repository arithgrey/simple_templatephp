<!-- Modal Recuperación de contraseñas  -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="recuperacion-pw" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 id="olvide-pw-text" class="modal-title">
                    Olvidaste tu contraseña?
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    Ingresa tu correo electrónico y tu contraseña será enviada a el
                </p>
                <input type="text" id="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                <br>
                <div id="divPass">
                </div>
                <div id="divContr">
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">
                    Cancelar
                </button>
                <button class="btn btn-primary" type="button" id="enviar">
                    Enviar
                </button>
            </div>
        </div>
    </div>
</div>
