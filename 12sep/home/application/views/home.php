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
    <div class='contenedor-principal'>
        <div class='row'>
            <div class=''>
                <a href="<?=base_url('index.php/startsession')?>">
                    <button class='btn btn-default login-btn pull-right '>                    
                        Iniciar sesión
                    </button>
                </a>
            </div>
            <!---->
            <div>
                <a href="<?=base_url('index.php/home/registro')?>">
                    <button class='btn btn-default login-btn pull-right '>                    
                        Registrar cuenta 
                    </button>
                </a>
            </div>
            <!---->

        </div>
        <div>                 
            <h1 class='enid-service'>                    
                
                <div class='text-service'>
                    Enid Service     
                </div>                   
            </h1>
            
            <br>
            
            <span class='sub-msj'>
                Ahora los mejores eventos llegan a ti
            </span>
            <div class='buscador'>
                <form class='form-busqueda' action="<?=base_url('index.php/eventos/busqueda')?>">
                    <div class='buscador-eventos'>
                        <div class="search-enid">
                            <input type="text" class="form-control input-sm qparam" maxlength="64" placeholder="Evento, Artista, Genero musical,  zona ... "/>                    
                        </div>     
                    </div>
                </form>                            
            </div>           
        </div>
    </div>

    <!---->
    <div class='seccion-2'>
        <div class='col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 '>        
            <div class='text_presentacion'>                
                <div class='row'>
                    <span class='conoce_text'> 
                        Conoce nuestra plataforma.!    
                    </span>    
                </div> 
                <br>   
                <div class='row'>
                    <span class='general_desc'>                    
                       Enid service es una herramienta intuitiva que por una lado  potencia la promoción de eventos musicales, con ella podrás añadir tantos eventos como se necesite y a cada uno de ellos agregar información de interés, incluyendo artistas, escenarios, puntos de venta, promociones y mucho más, por otro lado hacer accesible a los espectadores las experiencias musicales que se ajusten a sus gustos y oidos.
                    </span>
                    <br>
                    <div class='row'>
                        
                                               
                        <img src="<?=base_url('application/img/presentacion/p02.png')?>" class='img_1'>        
                        
                    </div>
                    
                    
                    
                </div>                    
            </div>            
        </div>    
    </div>
    <!---->









    <!---->
    <div class='seccion-3'>
        <div class='col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 '>                    
            <h1 class='more_info'>                        
                <div class='text-service'>
                    Has sentir la experiencia antes del evento.
                </div>                   
            </h1>
            <div class='row'>
                <span class='desc_visibilidad'>                    
                    Con Enid Service podrás dar visibilidad  de lo que el público  vivirá antes el día del evento.       
                </span>                    
            </div>                    
            <hr>
            <div class='seccion-resumen-img'>
                <div class='row'>
                    <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12'>
                        <img src="<?=base_url('application/img/presentacion/p07.png')?>" class='img_1'>        
                        <img src="<?=base_url('application/img/presentacion/p08.png')?>" class='img_1'>        
                        <img src="<?=base_url('application/img/presentacion/p03.png')?>" class='img_1'>        
                        <img src="<?=base_url('application/img/presentacion/p04.png')?>" class='img_1'>        
                        <img src="<?=base_url('application/img/presentacion/p05.png')?>" class='img_1'>        
                        <img src="<?=base_url('application/img/presentacion/p09.png')?>" class='img_1'>        
                    </div>
                    
                </div>
            </div>            
        </div>    
    </div>
    <!---->

    <div class='seccion-4'>
        
        <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 '>                    
            <hr>
            <div class='text-call'>
                Descubre todo lo que ofrece Enid Service.!
            </div>                   
            <a href="<?=base_url('index.php/home/registro')?>">
                <button class='btn btn-default login-btn '>                    
                    Registrar una cuenta es gratis
                </button>
            </a>

        </div>            
        
    </div>









</body>


    <style type="text/css">

        .login-btn{        
            border-radius: 0;
            border-style: solid;
            border-width: 0;
            cursor: pointer;    
            padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
            font-size: 0.98889rem;
            background-color: #008CBA;
            border-color: #007095;
            color: #FFFFFF;
            margin-right: 2%;
            margin-top: 1%;        
        }
        .login-btn:hover{        
            border-radius: 0;
            border-style: solid;
            border-width: 0;
            cursor: pointer;    
            padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
            font-size: 0.98889rem;
            background-color: #008CBA;
            border-color: #007095;
            color: #FFFFFF;
            margin-right: 2%;
            margin-top: 1%;        
        }.search-enid {
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
        }.buscador-eventos{
            margin-left: 5%;
        }.content-enid{                    
            height: 100%;
        }
        .seccion-3{
            margin-top: 3%;
            text-align: center;
            
        }
        .seccion-2{
            margin-top: 20%;
            height: 700px;
            //background: #223c48 none repeat scroll 0% 0%;
            //background: #0c1823;
            background: #074e65;
            
        }.general_desc{
            color: white;                        
            font-size: 1.2em;
        }        
        .desc_visibilidad{
            font-size: 1.2em;
        }
        .img_1{
            width: 100%;
            margin-top: 25px;
        }
        .text_presentacion{
            text-align: center;
        }
        .conoce_text , .more_info {
            color: white;
            font-size: 3em;
            font-weight: bold;
        }.seccion-4{
            text-align: center;
        }
        .text-call {
            font-size: 2em;
            font-weight: bold;
        }
        @media only screen and (max-width: 991px){
            .seccion-2{
                margin-top: 35%;
                height: 500px;
                background: #174F5C none repeat scroll 0% 0%;                                
            }
            .general_desc{
                color: white;                        
                font-size: 1em;
            }.desc_visibilidad{
                font-size: 1em;
            }

        }
    </style>
            
<script type="text/javascript" src="<?=base_url('application/js/home/landing_page.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">