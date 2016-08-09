<div>
  <div class="jumbotron" style="margin-top: -70px;">
          <h1>
            Bienvenido 
          </h1>
          <h2 style='margin-left: 50px;'>
            <small>
              Gestión de usuarios
            </small>
          </h2>
  </div>
</div>
<!---->
<div class='print-section' id="print-section">    
  <div class='container' style='margin-top:-25px;'>

      <button  style="display:none;" type="button" class=" nueva_busqueda btn btn btn_nnuevo " title='Registra un nuevo integrante a la cuenta' >
        <i class="fa fa-search" aria-hidden="true">
        </i>Buscar usuario
      </button> 
      <div class='seccion-busqueda'>
        <?=$this->load->view("usuarioscuenta/form_busqueda_user.php");?>              
      </div>                  
      <div class='response_img_perfil_user'id='response_img_perfil_user'>
      </div>
      <br>
      <div class='integrantes-table-info' id="integrantes-table-info">                            
      </div>              
          
      <div class='response-insert-user' id='response-insert-user'>
      </div>           
      <form action="<?=base_url('application/controllers/excel_export.php')?>" method="POST"  id="FormularioExportacion">
                    
          <input type="hidden" id="datos_a_enviar" name="datos_a_enviar"/>
        </form>

            </div>
</div>            
      </div>                      
</div><!--Termina el print section  -->


<style type="text/css">
.repo-edith{
    display: none;
}
.editar_permisos_miembro:hover{
  cursor: pointer;
}
.edit-nota-user:hover{
        cursor: pointer;
}
.img_user:hover{
  cursor: pointer;
}
</style>

<?=$this->load->view("usuarioscuenta/modal/config_user");?>
<script type="text/javascript" src="<?=base_url('application/js/usuarios/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/usuarios/img_perfiles.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<style type="text/css">
.jumbotron h1{
  font-size: 30px !important;
}
</style>
<input type='hidden' name='idusuario' id='id_usuario' class='idusuario' value='0'> 
<input type='hidden' name="id_empresa" id="id_empresa" class='id_empresa' value="<?=$id_empresa;?>">
