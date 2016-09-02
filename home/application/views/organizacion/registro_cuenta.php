<a href="<?=base_url('index.php/startsession')?>">
    <button  class='btn btn-default btn_save inicia'>    
            Iniciar sessión        
    </button>        
</a>


<div class='contenedor-form col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4  col-sm-10 col-sm-offset-1'>



      <div class='seccion-form-login'>    
            <h1 class='enid-service'>
                Enid 
                <br>service
            </h1>                            
            <form id="form-registro" method="post" action="<?=base_url('index.php/api/emp/nueva/format/json/')?>">                                        
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    usuario (@email)
                  </span>
                  <input type="mail" name='mail' id="mail"  class="mail form-control input-sm" required>                                   
                </div>
                <div class='place_user'>
                </div>

                <div class='hidden-empresa'>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        Organización
                      </span>
                      <input type="text" name='org' id="org"  class="form-control input-sm" >                                   
                    </div>                
                </div>            
                <div class='place_org'>
                </div>

                <div class="input-group">
                  <span class="input-group-addon" >
                    Contraseña
                  </span>
                  <input type="password" class="form-control input-sm"  name='pw' id="pw">
                  
                </div>
                <div class='place_pw'>
                </div>
                <div class="input-group">
                  <span class="input-group-addon" >
                    Contraseña nuevamente
                  </span>
                  <input type="password" class="form-control input-sm"  name='pw2' id="pw2">
                    
                </div>
                <div class='place_pw2'>
                </div>
                <div>                                        
                    <span class='text-condiciones'>                        
                        <a  data-toggle="modal" data-target="#modal_usos_privacidad"  >
                            He leído y  acepto las condiciones de uso y privacidad para hacer uso del sistema Enid Service.
                        </a>
                        <input type="checkbox" value='0' name='privacidad_condiciones' required  id='privacidad_condiciones' class='privacidad_condiciones'>
                    </span>
                </div>  
                <div class='place_estado_privacidad'>
                </div>              
                <div class='place_estatus_registro'>
                </div>
                <button id="inbutton" class='btn btn-default btn_save recupera'>
                    Registrar
                </button>                          
            </form>
            


      </div> 
</div>
</body>

    <style type="text/css">
        .privacidad_condiciones , .text-condiciones{
            display: inline-block;
        }
        .recupara-pass{          
            position: absolute;
            bottom: 5px;          
            left: 5px;
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
        .inicia{
            float: right;
        }
        .recupera:hover , .recupara-pass:hover{        
            border-radius: 0;
            border-style: solid;
            border-width: 0;
            cursor: pointer;    
            padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
            font-size: 0.98889rem;
            background-color: #223c48;
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
            background: #e8f0f3 !important;
            height: 100%;
            width: 100%;
        }        
        .hidden-empresa{
            display: none;
        }
        .text-condiciones{            
            font-size: .8em;
        }
    </style>
    <script type="text/javascript" src="<?=base_url('application/js/Organizacion/cuenta.js')?>"></script>
    <script src="<?=base_url('application/js/sha1.js');?>"></script>



<?=construye_header_modal('modal_usos_privacidad', "Condiciones de uso y privacidad Enid Service ");?>  
<iframe src='<?=base_url("index.php/home/usos_privacidad_enid_service")?>' width='100%'  height="100%">
</iframe>      
<?=construye_footer_modal()?>  
