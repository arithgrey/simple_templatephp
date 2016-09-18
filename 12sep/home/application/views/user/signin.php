<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="arithgrey" content="">
    <link rel="shortcut icon" href="<?=base_url('application/img/Enid2.png')?>" type="image/png">
    <title>
        Enid Service
    </title>
    <?=link_tag('application/css/css/style.css');?> 
</head>
<body class='content-enid'>
    <section>                        
        <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/jquery-migrate-1.2.1.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/modernizr.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/jquery.nicescroll.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>
    </section>



<a href="<?=base_url('index.php/home/prospectos')?>">
    <button  class='btn btn-default btn_save inicia'>    
        Prueba gratis
    </button>        
</a>
<div class='contenedor-form col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4  col-sm-10 col-sm-offset-1'>
      <div class='seccion-form-login'>    
            <h1 class='enid-service'>
                Enid <br>service
            </h1>                            
        <form id="in" method="post" action="<?=base_url('index.php/api/sessionrestcontroller/start/format/json')?>">                        
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                usuario (@email)
              </span>
              <input type="mail" name='mail' id="mail"  class="form-control input-sm" >                                   
            </div>
            <div class="input-group">
              <span class="input-group-addon" >
                Contraseña
              </span>
              <input type="password" class="form-control input-sm"  name='pw' id="pw">
              <input type='hidden' name='secret' id="secret">
            </div>                                
            <div class="control-group">                                                          
              <label  id="reportesession" class='reportesession'>
              </label>                                                          
            </div>                
            <button id="inbutton" class='btn btn-default btn_save recupera'>
                Iniciar
            </button>                          
        </form>
      </div> 
</div>

<!--
<a data-toggle="modal" class='pull-right recupara-pass'>                                                 
  Recuperar contraseña                         
</a>
-->
</body>

    <style type="text/css">

        .recupara-pass{          
            position: absolute;
            bottom: 5px;          
            left: 5px;
        }
        .inicia{
            float: right;
        }
        .recupera , .recupara-pass , .inicia{        
            border-radius: 0;
            border-style: solid;
            border-width: 0;
            cursor: pointer;    
            padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
            font-size: 0.98889rem;
            background-color: #223c48;
            border-color: #007095;
            color: white;
            margin-right: 2%;
            margin-top: 1%;        
        }
        .recupera:hover , .recupara-pass:hover{        
            border-radius: 0;
            border-style: solid;
            border-width: 0;
            cursor: pointer;    
            padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
            font-size: 0.98889rem;
            //background-color: #223c48;
            border-color: #007095;
            color: #FFFFFF;
            margin-right: 2%;
            margin-top: 1%;        
        }.search-enid {
            padding: 5px 0;
            width: 230px;
            height: 30px;
            position: relative;            
            line-height: 22px;
        }.enid-service{
            margin-top: 15%;          
            font-size: 6em;
            font-weight: bold;
            color: #223c48;
        }.content-enid{        
            //background: #e8f0f3 !important;
            height: 100%;
            width: 100%;
        }
        /*
        .contenedor-form{
          width: 35%;
          margin: 0 auto;
          margin-top: 5%;
        }
        */
    </style>
            
<script type="text/javascript" src="<?=base_url('application/js/home/landing_page.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">





               
  



<!--Cargamos modals de configuración-->
<?=$this->load->view("user/modal/config_inicio_session");?>
<!--Terminamos de cargar  modals de configuración-->
<script type="text/javascript" src="<?=base_url('application/js/home/recu.js')?>"></script>
<script src="<?=base_url('application/js/sha1.js');?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/home/ini.js')?>"></script>
<div class="animationload" style='display:none;' id='status_registro_user'>
    <div class="osahanloading">
    </div>
</div>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
