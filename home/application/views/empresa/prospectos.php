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
        <div>        
            <div>            
                <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
                <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
                <script src="<?=base_url('application/js/js/jquery-migrate-1.2.1.min.js')?>"></script>
                <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
                <script src="<?=base_url('application/js/js/modernizr.min.js')?>"></script>
                <script src="<?=base_url('application/js/js/jquery.nicescroll.js')?>"></script>
                <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>                      
            </div>   
        </div>                         
    </section>



    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <div class=''>
                <a href="<?=base_url()?>" class='btn-inicio'>
                    <button class='btn btn-default inicio-btn pull-left '>                    
                        Principal
                    </button>
                </a>

                <a href="<?=base_url('index.php/startsession')?>">
                    <button class='btn btn-default login-btn pull-right '>                    
                            Iniciar sesión
                    </button>
                </a>
            </div>
            <!---->
            
        </div>
        
    </div>

    





         <div class='contenedor-principal'>
        <div class='row'>
           
            <!---->
        
            
        </div>
                      
            <center>
                <h1 class='enid-service'>                                    
                    <div class='text-service'>
                        Enid Service     
                    </div>                   
                </h1>    
                <br>            
                <br>            
                <br>            
                <br>            
                
            </center>
            
            
    </div>






    <div class='row seccion-text'>
        <div class='col-lg-8 col-lg-offset-2'>
            <div class='text-center'>
                <span class='mensaje_presentacion'>
                    Hemos encontrado una nueva forma de  mejorar el marketing de tus eventos musicales.
                </span>            
                
            </div>            
            <center>

                <button class="btn btn-default btn_call_to_action registra_cuenta">                    
                    ¡ Entérate cómo.!
                </button>
                <br>
                <form   style="display:none;" class='form_prospectos' id='form_prospectos' action="<?=base_url('index.php/api/emp/prospectos_enid/format/json')?>">                        
                <br>
                    <div class='col-lg-6 col-lg-offset-3 col-md-6 col-sm-12'>
                        <div class="input-group">

                              <span class="input-group-addon" id="basic-addon1">
                                email@
                              </span>
                              <input type="mail" name="mail" id="mail" class="mail form-control input-sm" required>
                        </div>
                        <div class='place_mail'>                            
                        </div>

                    </div>                                
                </form>
                
            </center>
            

        </div>        
    </div>
    





</body>        
<script type="text/javascript" src="<?=base_url('application/js/home/landing_page.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/prospectos.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<style type="text/css">
        
        .error_enid{
                background: red;
                color: white;
            }.response_ok_enid{            
                background: #357ebd !important;
                width: 25%;
                padding: 2px;
                color: white !important;
            }.alerta_enid{
                background: #ba6d78;
                width: 25%;
                padding: 2px;
                color: white;   
                font-size: .9em;
                border-radius: 1px;
            }    
        .inicio-btn{
              border-radius: 0;
            border-style: solid;
            border-width: 0;
            cursor: pointer;
            padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
            font-size: 1.3rem;
            background: #063349;
            border-color: #007095;
            color: #FFFFFF;
            margin-top: 1%;
            margin-left: 1%;
        }
        .search-enid {
            padding: 5px 0;
            width: 230px;
            height: 30px;
            position: relative;
            left: 10px;
            float: left;
            line-height: 22px;
        }.enid-service{
            margin-top: 15%;
            margin-left: 5%;
            font-size: 6em;
            font-weight: bold;
            color: #223c48;
        }.more_info{            
            color: #074e65 !important;
        }

        .sub-msj{
            margin-left: 6%;
            color: #223c48;
            font-weight: bold;
            font-size: 1.5em;
        }
        
       


    .img-logo{
        margin-top: 25%;        
        width: 50%;        
    }
    .mensaje_presentacion{        
        font-weight: bold;
        font-size: 2.1em;
        color: white;
    }
    .seccion-text{
        margin-top: -70px;
        background: #00bffe;
        height: 700px;
    }
    .registra_cuenta{
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 1rem 1.77778rem 0.9rem 1.77778rem;
        font-size: 1.3rem;
        background-color: #074E65 !important;
        border-color: #007095;
        color: white;
        
    }
    .registra_cuenta:hover{
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 1rem 1.77778rem 0.9rem 1.77778rem;
        font-size: 1.3rem;
        background-color: #074E65 !important;
        border-color: #007095;
        color: white;
        
    }


    .login-btn{
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
        font-size: 1.3rem;
        background: #063349;
        border-color: #007095;
        color: #FFFFFF;
        margin-top: 1%;
        margin-right: 1%;

    }
    .login-btn:hover{
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
        font-size: 1.3rem;
        background: #063349;
        border-color: #007095;
        color: #FFFFFF;
        margin-top: 1%;
        margin-right: 1%;

    }
    @media only screen and (max-width: 991px) {
        .btn-inicio{
            display: none;
        }    
    }


    
    

</style>