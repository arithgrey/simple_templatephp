<?=ini_set('display_errors', '1');?>
<div class='print-section' id="print-section">    
    <div class="container">
        <div class="row">
            <div class="center-block" >
                <?=$resumen_usuarios;?>
            </div>
        </div>
    </div>    


  <div class="container">     
      <button id='btn-nuevo-integrante' type="button" class="btn btn btn_nnuevo " title='Registra un nuevo integrante a la cuenta' data-toggle="modal" data-target="#edit-usuario-perfil">
      + Nuevo miembro
      </button>
                        
        <div class="form-group">                 
          <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="input-group">                      
              <div class="input-group-addon">
                    Miembro de la cuenta 
              </div>
              <input list="integrantes-list" id="integrantes-l" class='integrantes-l form-control' >    
                  <?=$integrantes_filtro;?>                                                  
            </div>      
          </div>
                                        
          <div class="col-md-3 col-sm-3 col-lg-3">                
              <div class="input-group">                                                   
                <span class="input-group-addon">
                        Turno
                </span>
                <select name="turno-filtro" class="form-control" id="turno-filtro">
                  <option value="Matutino">
                          Matutino
                  </option>
                  <option value="Vespertino">
                        Vespertino
                  </option>
                  <option value="Nocturno">
                        Nocturno
                  </option>
                  <option value="Mixto">
                        Mixto
                  </option>
                </select>                            
              </div>                      
          </div>
          <div class="col-md-2 col-sm-2 col-lg-2">
            <div class="input-group">
              <span class="input-group-addon">
                      Estado
              </span>
              <select name="estatus-filtro" id="estatus-filtro" class="form-control">
                <option value="Usuario Activo">
                        Usuario Activo
                </option>
                <option value="Inactivo">
                        Inactivo
                </option>
                <option value="Baja">
                        Baja
                </option>
              </select>
            </div>                      
          </div>
          <div class="col-md-1 col-sm-1 col-sm-1">
            <button class='btn btn_busqueda' id='btn-busqueda'>
            Buscar
            </button>
          </div>
        </div>                      

        <div class='integrantes-table-info' id="integrantes-table-info">                    
          <?=$integrantes;?>                                                                     
        </div>              
        <div class='response-insert-user' id='response-insert-user'>
        </div>           
        <form action="<?=base_url('application/controllers/excel_export.php')?>" method="POST"  id="FormularioExportacion">
          <button class='botonExcel btn btn-default pull-left '  >
            Exportar a Excel 
            <i class="fa fa-file-pdf-o">
            </i> 
          </button>  
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
</style>

<?=$this->load->view("usuarioscuenta/modal/config_user");?>
<script type="text/javascript" src="<?=base_url('application/js/usuarios/principal.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<!--pickers css-->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->