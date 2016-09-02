<div class='col-lg-9  col-md-9 col-sm-12'>
  
  <div class='seccion-busqueda'>
    <?=$this->load->view("usuarioscuenta/form_busqueda_user");?>              
  </div>                  
  <div class='response_img_perfil_user' id='response_img_perfil_user'>
  </div>  
  <div class='col-lg-12 col-md-12'>
    <div class='integrantes-table-info' id="integrantes-table-info">                            
    </div>                        
  </div>
  <div class='response-insert-user' id='response-insert-user'>
  </div>                 
</div>

<div class='col-lg-3 col-md-3 col-sm-12 seccion-logs'>
  <div class="panel deep-purple-box">
      <div style="background:#D12F40 none repeat scroll 0% 0%"  class="panel-body">
        <div class="blog-post">
            <h1 class='text-acontecimientos'>
              Últimos acontecimientos 
            </h1>
            <div class="media">
                <a href="javascript:;" class="pull-left">
                    <img alt="" src="images/blog/blog-thumb-1.jpg">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">
                      <a href="javascript:;">
                        02 May 2013 
                      </a>
                    </h5>
                    <p>
                      Donec id elit non mi porta gravida at eget metus amet int
                    </p>
                </div>
            </div>                        
            <div class="media">
                <a href="javascript:;" class="pull-left">
                    <img alt="" src="images/blog/blog-thumb-3.jpg" class=" ">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">
                      <a href="javascript:;">
                        02 May 2013 
                      </a>
                    </h5>
                    <p>
                      Donec id elit non mi porta gravida at eget metus amet int
                    </p>
                </div>
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
</style>



<style type="text/css">
/*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px) {
    /*Inicia media query*/
    .form-second-part{
      margin-top: 0%;
    }
    .hidden-field-mov{
      display: none;
    }.panel-seccion-right{
      margin-top: 10%;
    }
    .seccion-logs{
      margin-top: 10px;
    }
    .f-1, .f-2 , .f-3{
      margin-top: -3%;
    }

    /*Termina  media query*/
  }
</style>

  