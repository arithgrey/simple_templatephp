     </div>
    <!--body wrapper end-->       
     </div>
        <!-- main content end-->
        <!--footer section start-->
            <footer>
            	<div class="container">                      
                </div>
                <script src="<?=base_url('application/js/js/scripts.js')?>">
                </script>
            </footer>
            <!--footer section end-->
    </section>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<input type='hidden' name="in_session" id='in_session' class='in_session' value="<?=$in_session;?>" >
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">





</body>
</html>






 <style type="text/css">
     /*
            .alert-fail{            
                border-radius:10px;    
                margin:10px;
                padding:10px 10px 10px 36px;
            }
            .alert-ok{
                border-radius:10px;    
                margin:10px;
                padding:10px 10px 10px 36px;
            }
            .alert-fail-sm{
                border-radius:10px;    
                margin:5px;
                padding:5px 5px 5px 36px;
            }
            .alert-ok-sm{
                 border-radius:5px;    
                margin:5px;
                padding:5px 5px 5px 36px;
            }
            .alert-ok , .alert-fail{
                display: none;
            }   
            .genero_registrado , .mas-info , .menos-info , .img-tmp-empresa , .guardar_img_enid {
                //background: #E31F56;           
            }
         
            
        */
        .t_enid{
            font-size: 2em;
            font-weight: bold;
        }
        .title-table-enid{
            color: white;
            font-size: 1em;
        }       
        .usr-info .thumb{
            height: 60px !important;
            width: 60px !important;
        }
        .content-enid-sec{
            background: #1C84A7 none repeat scroll 0% 0% !important;
        }
        .section-enid-title{
            padding: 11px;
        }
        .editar_client{
            padding: 5px;
        }
        .total_table{
            font-size: .9em;
        }       
        .img-icon-enid-escenario{
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            height: 35px;
            width: 35px;
        }
        .img-div, .img-div-text{             
            display: inline-block;
        }        
        .img-div-text{
            padding: 10px;
            position:absolute;
        }
        .img-horizontal{
            display: inline-block !important; 
            margin: 10px auto;
            position: relative !important;            
        }        
        
        .editar-lb-enid{
            -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
            -webkit-transition:all ease .8s ;
            background: black;
            color: white;
            color: white;
            filter: alpha(opacity=0); /*Opacidad Para IE */
            opacity: 0; /*Inicialmente transparente */
            padding: 5px;
            position: absolute; /*Info sobre la imagen*/
            top: 3%;    
            transition:all ease .8s;
            zoom: 1;
        }
       .dinamic_campo_tb{
            display: none;
        }
        .botonExcel{
            color:#000000; 
            
        }
        .totales_tb{
            background: #1A8084;
            color: white;
        }
        .link-org{
            background: #23516B;
            border-radius: 2px;
            color: white;
            padding: 8px;
            text-decoration: none;
        }
        .link-org:hover{
            background: #C61C58;      
            color: white;
            text-decoration: none;
        }
        .nav > li > a:hover, .nav > li > a:focus{
            color: white;
        }
        .resultados-busqueda-enid{
            background: #3C5E79 !important;
            padding:15px;
        }
        .elementos-encontrados-enid{
            font-size: .75em;
        }
        .enid-ping{
            color: white;
        }       
        .genero_registrado , .mas-info , .menos-info {
            color: white;
            cursor: pointer;
            padding: 5px;
        }        
        .table_enid_service{            
            font-size:.75em; 
            text-align:center; 
            padding:10px; 
            
        }
        .locacion{
            cursor: pointer;
            color: #607D8B;
        }
        .animationload {
              background-color: #032935;
              height: 100%;
              left: 0;
              position: fixed;
              top: 0;
              width: 100%;
              z-index: 10000;
          }
      .osahanloading {
          animation: 1.5s linear 0s normal none infinite running osahanloading;
          background: #fed37f none repeat scroll 0 0;
          border-radius: 50px;
          height: 50px;
          left: 50%;
          margin-left: -25px;
          margin-top: -25px;
          position: absolute;
          top: 50%;
          width: 50px;
      }
      .osahanloading::after {
              animation: 1.5s linear 0s normal none infinite running osahanloading_after;
              border-color: #85d6de transparent;
              border-radius: 80px;
              border-style: solid;
              border-width: 10px;
              content: "";
              height: 80px;
              left: -15px;
              position: absolute;
              top: -15px;
              width: 80px;
          }
          @keyframes osahanloading {
          0% {
              transform: rotate(0deg);
          }
          50% {
              background: #85d6de none repeat scroll 0 0;
              transform: rotate(180deg);
          }
          100% {
              transform: rotate(360deg);
          }
          }

        /**/        
          .fa-cog{
            cursor: pointer;
          }
          .modal-enid .modal-header .close {
            color: #fff;
            background-color:#3C5E79;
            border-color: #357ebd;
            opacity: 1;
            padding: 10px 17px;
            font-size: 27px;
        }
        
        @media (min-width: 992px) {
            .modal-enid .modal-header,
            .modal-enid .modal-body,
            .modal-enid .modal-footer {
                width: 900px;
            }
        }
        @media (min-width: 768px) {
            .modal-enid .modal-header,
            .modal-enid .modal-body,
            .modal-enid .modal-footer {
                width: 600px;
                margin: 30px auto;
            }
        }
        
        .modal-content .modal-header{background-color:#09afdf}.modal-content .modal-title{color:#fff}.modal-open .page-wrapper{-webkit-filter:blur(3px);-moz-filter:blur(5px);-o-filter:blur(5px);-ms-filter:blur(5px);filter:blur(5px)}.modal-footer .btn+.btn{margin-bottom:5px}@media (min-width:1200px){.modal-lg{width:1140px}}.overlay-container{position:relative;display:block;text-align:center;overflow:hidden}.overlay-bottom,.overlay-to-top,.overlay-top{color:#fff;position:absolute;top:auto;background-color:rgba(30,30,30,.5);opacity:0;filter:alpha(opacity=0)}
        .table_enid_service{
            width: 100%;    
            font-size: .68em !important;
        }
        .table_enid_service .table_enid_service_header{
            background: #2f4b56;    
            color: white;   
        }
        .num_registros_encontrados{
            font-size: .8em;
        }
        .validado{
            font-size: .7em;
        }        
        .eliminar_enid:hover{
            cursor: pointer;
        }
        .text_bajo_imagen{
            clear: left;            
        }
        .enid_hidden{
            display: none;
        }
        .guardar_img_enid{
            background: #133E50;
        }
        .jumbotron{
            background: #3C5E79 !important; 
            font-size: .9em;
            color: white !important;
        }
        .jumbotron-slogan{        
          background: #032935 !important;
        }
        .portada_principal{
            height: 400px;
        }.pagination_enid{
            width: 30%;
            background: #364654;
            color: white;
        }.pagination_enid ul li a{
            color: white !important;
        }.indicador_slider:hover{
            cursor: pointer;           
        }
        .btn_configurar_enid_w{
            list-style: none;
        }
        .btn_configurar_enid , .btn_agregar_enid{
            list-style:none;
        }
        .menu_seleccion_enid{
            background: #046188;
        }
        .menu_seleccion_enid ul li a{
            color: white !important;
        }        
        .info_estado , .config_tipo_evento{        
          background: #428bca;
        }
        .info_estado:hover{
          cursor: pointer;
        }
        .info_estado_a{
          color: white;
        }        
        .msj_notificacion_config{
            margin: 0 auto;
            text-align: center;
            background-color: #28393C;
            color: white;
            padding: 10px;
            font-size: .6em;
        }
        .separate-enid{
            padding: 10px;
        }.nav-justified{
            background: #428bca;
        }
        .titulo_evento_slider{
            color: #FFFFFF;
            margin-left: 1%;
            font-weight: bold;
            font-size: 4em;
        }
        
          .msj_faltante{
            font-size: 2em;
            font-weight: bold;
          }

        .btn-comunidad{
            background: #046188;
        }
          
        </style>




























<?=construye_header_modal('modal-version-sistema', " Versión del sistema " );?>        
    <h3>
        Versión 1.0.0
    </h3>
    <div id="masInfo" align="right">
        <a href="<?=base_url('index.php/reportecontrolador')?>">
            ayudanos a mejorar nuestros servicios
        </a>
    </div>
<?=construye_footer_modal()?>                                  

<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/animate.css')?>">




        <style type="text/css">
           
            /*Los templates */
            body{
                font:  16px/28px 'Hind','Helvetica Neue',Helvetica,sans-serif !important;
            }ul{ 
                list-style: none !important 
            }.ver-public-sm{
              display: none;
            }.seccion-presentacion{
                background:  rgb(6, 51, 73);  
                padding: 5%;
                display: block;
            }.text-filtro-enid{        
                display: none;
            }.nombre-evento-mov{      
              font-size:3.7em;
              color: white !important;
              font-weight: bold;          
            }.nombre_empresa_enid{
                float: right;
                font-size: 1.7em;
                color: #d9534f;
                font-weight: bold;    
            }iframe{
                border: 0px !important;
            }.enid-lg-hidden{
                display: none;
            }.part_desc_{
                background: rgb(4, 97, 136);
            }.text_link_accesos_enid{
                color: black;
            }.link-event-enid{
                text-decoration: none;
                color: white;
            }.link-event-enid:hover{
                text-decoration: none;
                color: white;
            }.text-title-enid{
                font-size: 2em;
                font-weight: bold;
                text-decoration: none;
                color: black;
            }.hiddden_descripcion{
                display: none;
            }.more-info-f-up{
                display: none;
            }.more-info-f-up:hover , .more-info-f-down:hover{
                cursor: pointer;
            }.hiddden_descripcion , .show_descripcion{
                font-size: .9em;
            }.text-imagen-enid-b{                
                font-weight: bold;
            }.text-imagen-enid{
                color: white;
                font-weight: bold;
            }.text-imagen-enid:hover , .text-imagen-enid-b:hover{
                cursor: pointer;
            }.main-content{        
                background: white;
                color: #00090C;
            }.left-side,  .sticky-left-side , .sticky-header , .logo{
                background: #032935 !important;            
            }.enid-header-table , .header-table-info{        
                background: #0B6777;
                color: white;
                font-size: 1em !important;
                font-weight: bolder;
                text-align: center !important;
            }.blue-col-enid{            
                background:rgb(23, 79, 92) none repeat scroll 0% 0%;
                color: white;            
            }.btn_nnuevo{            
                background: #166781;
                color: white;

                border-radius: 0;
                border-style: solid;
                border-width: 0;
                cursor: pointer;
                padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
                font-size: 0.98889rem;
                //background-color: #008CBA;
                border-color: #007095;
                color: #FFFFFF;
                
                


            }.btn_nnuevo:hover{            
                background: #00BCD4;
                color: white;
            }a{
                color: #09AFDF;
                transition: all 0.2s ease-in-out 0s;
            }.btn_busqueda{
                background: #19344a;
                color: white;
                border-radius: 0;
                border-style: solid;
                border-width: 0;
                cursor: pointer;
                padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
                font-size: 0.98889rem;
                //background-color: #008CBA;
                border-color: #007095;
                color: #FFFFFF;                
            }.btn-default{
                background: #19344a;
                color: white;
                border-radius: 0;
                border-style: solid;
                border-width: 0;
                cursor: pointer;
                padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
                font-size: 0.98889rem;
                //background-color: #008CBA;
                border-color: #007095;
                color: #FFFFFF; 
            }

            .title-page-enid{
                margin-top: -1px;
            }.btn-template{
                background: #1A6174 !important;
                color: white !important;
                border-radius: 0;
                border-style: solid;
                border-width: 0;
                cursor: pointer;
                padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
                font-size: 0.98889rem;
                //background-color: #008CBA;
                border-color: #007095;
                color: #FFFFFF;

            }.blue-col-enid-more{
                 background: #FCF566 none repeat scroll 0% 0% !important;
                color: black !important;
                font-size: 1.5em !important;
            }.header-panel{
                font-size: .9em;            
                text-align: center !important;
            }.white-enid{
                color: white !important;
            }.scroll-enid{
                height: 600px;
                overflow-x: auto;
                overflow: scroll;
                width: 100%;
            }.scroll-horizontal-enid{            
                overflow-x: auto;                    
            }.scroll-enid-public{
                height: 300px;        
            }
            h1 , h1 a,h2 a,h3 a,h4 a,h5 a,h6 a , h1 strong{color: #166781}  
            .enid-filtro-busqueda:hover{                    
                cursor: pointer;
            }.scroll-vertical-enid{
                overflow-x:hidden; 
                overflow-y:scroll;            
            }.img-icon-enid{
                margin: 0 auto;            
                background: #357ebd !important;    
                color: white;
            }.img-icon-enid:hover{
                cursor: pointer; 
            }.modal-enid {            
                margin: 0px;
            }.modal-enid .modal-content {
                margin-top: 5%;
                border-radius: 0px;
                border-left-width: 0px;
                border-right-width: 0px;
                height: 80%;
                overflow: auto;
            }.modal-enid .modal-title {
                font-size: 34px;
                font-weight: bold;
            }.tab_enid:hover{
                cursor: pointer;
                text-decoration: none;
                color: black;
            }.tab_enid{
                font-size: .8em;
                text-decoration: underline;
                color: black;
            }.titulo-enid{
                color: #166781 !important;
                font-size: 24px !important;
                font-weight: bold !important;
                margin: 0px 0px 5px !important;
                text-transform: uppercase !important;
           }.titulo-enid-sm{
                color: #166781 !important;
                font-size: 18px;
                font-weight: bold;
                margin: 0px 0px 5px;
                text-transform: uppercase;
            }.error_enid{
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
            }.uppercase_enid{
                text-transform:uppercase;
            }.nav > li > a:hover, .nav > li > a:focus{
                  background: #CCD0B0;  
            }.text-filtro-enid{
                font-size: .7em;
                text-align: center !important;
            }.links_modal .link_modal{
              text-decoration: none;
              color: white;
              font-size: .9em;
              padding: 7px  20px ;
              background: #3C5E79;  
              width: 25%;
            }
            .links_modal .link_modal:hover{
              text-decoration: none;
              color: white;
              font-size: .9em;
              padding: 13px  10px;
              background: rgb(62, 178, 192);  
            }
            .text-desc-enid{
                font-size: .9em;
            }.text_completo{
                display: none;
            }
            .parte_descripcion,
            .text_completo{
                font-size: .8em !important;
            }
            /**/
            .tex_hidden_title{
                display: none;
            }
            .ver-public-lg-emp{
                display: block;
                background: rgb(8, 65, 84);
                padding: 10px;
                margin-bottom: 10px;
                color: white;
            }
            .ver-public-lg{
                display: block;
                background: rgb(8, 65, 84);
                padding: 10px;
                margin-bottom: 10px;
                color: white;
            }

            /*Todo lo que pertenece a medios*/
            @media only screen and (max-width: 991px) {
                
                .ver-public-lg{
                    display: none;
                }    
                .ver-public-sm{
                    display: block;
                    background: rgb(8, 65, 84);
                    padding: 10px;
                    margin-bottom: 10px;
                    color: white;
                }
                .ver-public-sm:hover{
                    text-decoration: none;
                    color: white;
                }
                .seccion-presentacion{
                  background:  rgb(6, 51, 73);  
                  padding: 10%;
                  display: block;
                }
                
                .menu_seleccion_enid{
                    display: none;
                }
                .text-filtro-enid{ 
                    display: block;      
                    background: #055D80;
                    color: white;                    
                    margin-bottom: 3px;    
                    width: 50%;
                }                   
                .text-filtro-enid:hover{ 
                    cursor: pointer;
                }   
                .hidden-field-mov{
                  display: none;
                }
                .msj_notificacion_config{
                    padding: 1px;                                    
                }
                .enid-lg-hidden{
                    display: block;
                }.tex_hidden_title{
                    display: block;
                }

            }
            /**/

        </style>
<?=ini_set('display_errors', '');?>