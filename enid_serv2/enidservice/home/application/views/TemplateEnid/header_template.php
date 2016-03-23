<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="arithgrey" content="">
  <link rel="shortcut icon" href="<?=base_url('application/img/Enid2.png')?>" type="image/png">
  <title>General</title>


  <!--
    <?=link_tag('application/js/js/gritter/css/jquery.gritter.css');?>       

    --> 
    <?=link_tag('application/css/css/style.css');?>
    
<!--
    <?=link_tag('application/css/css/table-responsive.css');?>
    <?=link_tag('application/css/css/style-responsive.css');?>
-->
   
    
 
</head>
<body class="sticky-header left-side-collapsed">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">
        <!--logo and iconic logo start-->
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
                    <li data-toggle="modal"  data-target="#basicModal">                        
                            <i class="fa fa-code">
                            </i> 
                            Versión del sistema                        
                    </li>
                    <li>
                        <a href="<?=base_url('index.php/sessioncontroller/logout')?>">
                            <i class="fa fa-sign-out">
                            </i> 
                            <span>
                                Salir
                            </span>
                        </a>
                    </li>
                </ul>
            </div>            
            <ul class="nav nav-pills nav-stacked custom-nav">
                <!--Desplegamos el menú-->
                <?php echo $menu; ?>
                <!--Termina Desplegamos el menú-->
            </ul>            
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
       <!-- 
        <script type="text/javascript" src="<?=base_url('application/js/js/gritter/js/jquery.gritter.js')?>"></script>
        <script src="<?=base_url('application/js/js/gritter/js/gritter-init.js')?>"></script>            
        <script type="text/javascript" language="javascript" src="<?=base_url('application/js/js/advanced-datatable/js/jquery.dataTables.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('application/js/js/data-tables/DT_bootstrap.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('application/js/js/dynamic_table_init.js')?>"></script>        
    -->
        <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>      
        
        <div class="menu-right">            
            <ul class="notification-menu">
                <li title='Tareas pendientes'>
                    <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-tasks">
                        </i>
                        <span class="badge">
                        1
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">You have 1 pending task</h5>
                        <ul class="dropdown-list user-list">
                            <li class="new">
                                <a href="#">
                                    <div class="task-info">
                                        <div>
                                            Database update
                                        </div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                            <span class="">
                                                40%
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>                            
                        </ul>
                    </div>
                </li>            
                <li >
                    <a title='Más opciones' href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">                        
                        <?=$nombre;?>
                        <i class="fa fa-sort-desc">
                        </i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">                        
                        <li>
                            <a class='config-my-data'  href="<?=base_url('index.php/recursocontroller/informacioncuenta')?>">
                                <i class="fa fa-cog">
                                </i>  
                                Configuración de la cuenta
                            </a>
                        </li>
                        <li>
                            <a href="" data-toggle="modal"  data-target="#modal-version-sistema">
                                <i class="fa fa-code">
                                </i>
                                Versión del sistema 
                            </a>
                        </li>
                        <li title='Terminar sessión del sistema'>
                            <a href="<?=base_url('index.php/sessioncontroller/logout')?>">
                                <i class="fa fa-sign-out">
                                </i> 
                                Salir 
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <!--notification menu end -->
        </div>
        <!-- header section end-->
        
        <!---->
        <div class="wrapper">           


        

        <div class="panel section-header-title" >
            <div class="panel-body">
                <div class="profile-desk">
                    <h1>
                       <?=$titulo;?>
                    </h1>                
                    <hr>            
                </div>
            </div>
        </div>