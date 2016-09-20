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

    <div id="fb-root"></div>

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
    <div class="container">
        <form class="form-signin" role="form">
            <?php if (@$user_profile): ?>



                <?/*=print_r($user_profile);*/?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" 
                        src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" 
                        style="width: 140px; 
                        height: 140px;">
                        <h2>
                            <?=$user_profile['name']?>                            
                        </h2>
                        <a href="" class="btn btn-lg btn-default btn-block" role="button">
                            View Profile
                        </a>
                        <a href="<?=$logout_url?>" class="btn btn-lg btn-primary btn-block" role="button">
                            Logout
                        </a>

                    </div>

                </div>



            <?php else:?>
                <h2 class="form-signin-heading">
                   Log in to Facebook
                </h2>
                <?=$login_url?>
                <a href="<?=$login_url?>" class="btn btn-lg btn-success btn-block" role="button">
                    Login
                </a>
            <?php endif; ?>
        </form>
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