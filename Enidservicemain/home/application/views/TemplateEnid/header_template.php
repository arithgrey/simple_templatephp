<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="arithgrey" content="">
  <link rel="shortcut icon" href="<?=base_url('application/img/Enid2.png')?>" type="image/png">

  <title>General</title>

  <!--gritter css-->





<?=link_tag('application/js/js/iCheck/skins/minimal/mi.css');?>
<?=link_tag('application/js/js/iCheck/skins/square/square.css');?>
<?=link_tag('application/js/js/iCheck/skins/square/red.css');?>
<?=link_tag('application/js/js/iCheck/skins/square/blue.css');?>
<?=link_tag('application/css/css/clndr.css');?>
  
<?=link_tag('application/js/js/gritter/css/jquery.gritter.css');?>   
<?=link_tag('application/css/css/style.css');?>
<?=link_tag('application/js/js/advanced-datatable/css/demo_page.css')?>
<?=link_tag('application/js/js/advanced-datatable/css/demo_table.css')?>
<?=link_tag('application/js/js/data-tables/DT_bootstrap.css')?>



<?=link_tag('application/css/css/table-responsive.css');?>
<?=link_tag('application/css/css/style-responsive.css');?>

     
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->





        




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
            <a href="<?=base_url()?>"><img style="width: 30%" src="<?=base_url('application/img/Enid2.png')?>" alt="Enid Service"></a>

        </div>



        


        <!--logo and iconic logo end-->


        <div class="left-side-inner">

            <!-- visible to small devices only -->


              <!-- visible to small devices only -->
           

            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="" class="media-object">
                    <div class="media-body">
                        <h4><a href="#"><?=$nombre;?></a></h4> 
                        <span><?=$perfilactual;?></span>
                    </div>
                </div>

                <h5 class="left-nav-title">General</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">                    
                    <li><a href="<?=base_url('index.php/recursocontroller/informacioncuenta')?>"><i class="fa fa-cog"></i> <span>Configuración</span></a></li>


                    <li><a href="" data-toggle="modal"  data-target="#basicModal">
                     <i class="fa fa-code"></i> Versión del sistema</a></li>

                    <li><a href="<?=base_url('index.php/sessioncontroller/logout')?>"><i class="fa fa-sign-out"></i> <span>Salir</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->


            <ul class="nav nav-pills nav-stacked custom-nav">

                
             

                <?php echo $menu;  ?>
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    



    <!-- main content start-->


    <div class="main-content" >


        <!-- header section start-->
        <div class="header-section">


        
        <a class="toggle-btn"><i class="fa fa-th"></i></a>


        




        
        
        <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/jquery-migrate-1.2.1.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/modernizr.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/jquery.nicescroll.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('application/js/js/gritter/js/jquery.gritter.js')?>"></script>
        <script src="<?=base_url('application/js/js/gritter/js/gritter-init.js')?>"></script>
        
        

      

    
        <script type="text/javascript" language="javascript" src="<?=base_url('application/js/js/advanced-datatable/js/jquery.dataTables.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('application/js/js/data-tables/DT_bootstrap.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('application/js/js/dynamic_table_init.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>  
        
        
        



        <style type="text/css">

        .left-side,  .sticky-left-side , .sticky-header , .logo{
            //background: #09AFDF !important;
            //background: none repeat scroll 0% 0% #12ADA2 !important;
            //background: none repeat scroll 0% 0% #03C7FC !important;
            //background-color: rgba(29, 119, 145, 1) !important;
            background: #043544 !important;
        }
        .main-content{
            background: white;
            color: #00090C;
        }

        .blue-col-enid{
            background: none repeat scroll 0% 0% #12ADA2 !important;
            
            //background: none repeat scroll 0% 0% #12ADA2;
            //color: #00090C;
            color: white;
            
        }
        .title-table-enid{
            font-size: 1.1em;
            color: white;
        }
        .enid-header-table{
            
            //background: none repeat scroll 0% 0% #12ADA2 !important;
            //background: none repeat scroll 0% 0% #09AFDF !important;
            background: #1C84A7 !important;
            color: white;
        }
        .header-section , .notification-menu ,  .dropdown-toggle{

            background: none repeat scroll 0% 0% #09AFDF !important;
            color: white !important;
            //background: #1C84A7;
        }

        .panel-heading .nav > li > a {
            color: white;
        }


        .title-page-enid{
            margin-top: -1px;
        }
        .wrapper{
    background: rgb(255, 252, 231);
}
        
        .modal-header{
            background: #09AFDF !important;
            
        }   
        .modal-title{
            color: white !important;
        }   
        .btn-template{
            background: #1A6174 !important;
            color: white !important;
        }
        .blue-col-enid-more{
            background: rgba(10, 62, 66, 0.9) none repeat scroll 0% 0% !important;
        }
        </style>
       

        

        <div class="menu-right">
            
            <ul class="notification-menu">
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-tasks"></i>
                        <span class="badge">8</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">You have 8 pending task</h5>
                        <ul class="dropdown-list user-list">
                            <li class="new">
                                <a href="#">
                                    <div class="task-info">
                                        <div>Database update</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                            <span class="">40%</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="new">
                                <a href="#">
                                    <div class="task-info">
                                        <div>Dashboard done</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar progress-bar-success">
                                            <span class="">90%</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Web Development</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 66%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="66" role="progressbar" class="progress-bar progress-bar-info">
                                            <span class="">66% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Mobile App</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" role="progressbar" class="progress-bar progress-bar-danger">
                                            <span class="">33% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Issues fixed</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar">
                                            <span class="">80% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="new"><a href="">See All Pending Task</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">You have 5 Mails </h5>
                        <ul class="dropdown-list normal-list">
                            <li class="new">
                                <a href="">
                                    <span class="thumb"><img src="" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">John Doe <span class="badge badge-success">new</span></span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jonathan Smith</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jane Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Mark Henry</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jim Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li class="new"><a href="">Read All Mails</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">Notifications</h5>
                        <ul class="dropdown-list normal-list">
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #1 overloaded.  </span>
                                    <em class="small">34 mins</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #3 overloaded.  </span>
                                    <em class="small">1 hrs</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #5 overloaded.  </span>
                                    <em class="small">4 hrs</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #31 overloaded.  </span>
                                    <em class="small">4 hrs</em>
                                </a>
                            </li>
                            <li class="new"><a href="">See All Notifications</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <img src="" alt="" />
                        <?=$nombre;?>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        
                        <li><a class='config-my-data'  href="<?=base_url('index.php/recursocontroller/informacioncuenta')?>"><i class="fa fa-cog"></i>  Configuración</a></li>
                        <li><a href="" data-toggle="modal"  data-target="#basicModal">
                        <i class="fa fa-code"></i>Versión del sistema </a></li>
                        <li><a href="<?=base_url('index.php/sessioncontroller/logout')?>"><i class="fa fa-sign-out"></i> Salir </a></li>


                    </ul>
                </li>

            </ul>



        </div>
        <!--notification menu end -->



        </div>
        <!-- header section end-->



<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Versión</h4>
            </div>
            <div class="modal-body">
                <h3>Enid Service version 1.2</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <div id="masInfo" align="right">
                    <a href="<?=base_url('index.php/reportecontrolador')?>">¿Tienes alguna sugerencia o comentario?</a>
                </div>
            </div>
        </div>
    </div>
</div>



        <!--body wrapper start-->
        <div class="wrapper">
            
            <h1 class='title_main'>
                 &raquo; <?=$titulo;?>
            </h1>
            
        

