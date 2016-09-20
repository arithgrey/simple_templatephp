<div class='row'>
  <div class='col-lg-9  col-md-9 col-sm-12'>
    
    <div class='seccion-busqueda'>
      <?=$this->load->view("usuarioscuenta/form_busqueda_user");?>              
    </div>                  
    <div class='response_img_perfil_user' id='response_img_perfil_user'>
    </div>

    <div class='row'>
      <div class='col-lg-12  col-md-12 col-sm-12'>
        <div class='seccion-form-user'>
          <?=$this->load->view("user/modal/user_new")?>
        </div>
        <div class='dinamic_info'>        
          <div class='integrantes-table-info' id="integrantes-table-info">                            
          </div>                        
          <div class='response-insert-user' id='response-insert-user'>
          </div>  
        </div>  
      </div>
    </div>                  
  </div>

  <div class='col-lg-3 col-md-3 col-sm-12 seccion-logs'>
    <div class="panel deep-purple-box">
        <div style="background:#D12F40;"  class="panel-body">
          <div class="blog-post">
              <h1 class='text-acontecimientos'>
                Últimos acontecimientos 
              </h1>              
          </div>                  
        </div>
    </div>
  </div>




</div>
<style type="text/css">
.repo-edith{
    display: none;
}
.editar_permisos_miembro:hover, .edit-nota-user:hover , .img_user:hover{
  cursor: pointer;
}
</style>
<script type="text/javascript" src="<?=base_url('application/js/usuarios/principal.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>"/>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<input type='hidden' name="id_empresa" id="id_empresa" class='id_empresa' value="<?=$id_empresa;?>">





<style type="text/css">
.form-second-part{
  margin-top: 4%;
}
.integrantes-l{
  width: 100%;

}
.text-acontecimientos{
  color: white;
} 
.conf-estado-text{
  font-weight: bold;
  font-size: 2.5em;
}
.config_estatus_user:hover{
  cursor: pointer;
}
.seccion-form-user{
  display: none;
}
</style>



<style type="text/css">

  .hidden_inputs_enid{
    display: none;
  }.more-inputs{
    font-size: .8em;
    font-weight: bold;
  }
  .more-inputs:hover{
    font-size: .8em;
    font-weight: bold;
    cursor: pointer;
  }
/*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px) {
    /*Inicia media query*/
    .form-second-part{
      margin-top: 0%;
    }
    .hidden-field-mov{
      display: none;
    }
    .seccion-logs{
      margin-top: 10px;
      display: none;
    }
    .f-1, .f-2 , .f-3{
      margin-top: -3%;
    }.miembos-cuenta-text{
      display: none;
    }

    /*Termina  media query*/
  }
</style>

  