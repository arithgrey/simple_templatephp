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
                        Iniciar sessión
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
                Enid Service 
            </h1>
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
    </div>
    <!---->
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
        }.sub-msj{
            margin-left: 6%;
        }.buscador-eventos{
            margin-left: 5%;
        }.content-enid{                    
            height: 100%;
        }.seccion-2{
            margin-top: 5%;
            height: 500px;
            
        }
    </style>
            
<script type="text/javascript" src="<?=base_url('application/js/home/landing_page.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">