<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="arithgrey" content="">
    <link rel="shortcut icon" href="<?=base_url('application/img/Enid2.png')?>" type="image/png">
    <title>
        <?=$titulo?>
    </title>
    <?=link_tag('application/css/css/style.css');?> 
</head>
<body class="sticky-header left-side-collapsed">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">        
        <div class="logo">
            <a href="<?=base_url()?>">
                <img style="width: 20%"  src="<?=base_url('application/img/Enid2.png')?>" alt="Enid Service">
            </a>            
        </div>
        <div class="logo-icon text-center">
            <a href="<?=base_url()?>">
                <img style="width: 70%" src="<?=base_url('application/img/Enid2.png')?>" alt="Enid Service">
            </a>
        </div>
        <!--logo and iconic logo end-->
        <div class="left-side-inner">            
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="" class="media-object">
                    <div class="media-body">
                        <h4>
                            <a href="#">
                                <?=$nombre;?>
                            </a>
                        </h4> 
                        <span>
                            <?=$perfilactual;?>
                        </span>
                    </div>
                </div>
                <h5 class="left-nav-title">
                    General
                </h5>
                <ul class="nav nav-pills nav-stacked custom-nav">                    
                    <li>
                        <a href="<?=base_url('index.php/recursocontroller/informacioncuenta')?>">
                            <i class="fa fa-cog">
                            </i> 
                            <span>Configuración</span>
                        </a>
                    </li>
                    <li>                        
                        <a data-toggle="modal"  data-target="#basicModal" >
                            <i class="fa fa-code">
                            </i> 
                            <span>
                                Versión del sistema                        
                            </span>    
                        </a>    
                    </li>
                    <li>
                        <a href="<?=base_url('index.php/startsession/logout')?>">
                            <i class="fa fa-sign-out">
                            </i> 
                            <span>
                                Salir
                            </span>
                        </a>
                    </li>
                </ul>
            </div>            
             <!--Desplegamos el menú-->
            <ul class="nav nav-pills nav-stacked custom-nav">               

            </ul>            
            <!--Termina Desplegamos el menú-->
        </div>
    </div>
    <!-- left side end-->
    <div class="main-content" >
        <!-- header section start-->
        <div class="header-section">
            <a title='Deslizar menú' class="toggle-btn">
                <i class="fa fa-th">
                </i>
            </a>                    
            <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
            <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
            <script src="<?=base_url('application/js/js/jquery-migrate-1.2.1.min.js')?>"></script>
            <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
            <script src="<?=base_url('application/js/js/modernizr.min.js')?>"></script>
            <script src="<?=base_url('application/js/js/jquery.nicescroll.js')?>"></script>
            <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>              
            
            <!--notification menu end -->
        </div>        
        <div class="wrapper">           

