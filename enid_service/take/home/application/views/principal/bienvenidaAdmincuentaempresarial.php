
<div  class="container" id='contenedor-time' >    
    <ul class="timeline">
        
        <!---->
        <li id='panel-eventos' class='' >
          <div class="timeline-badge"><i class="fa fa-headphones"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
                <a href="<?=base_url('index.php/inicio/eventos')?>">
                    <h4 class="timeline-title">
                        <i class="fa fa-play-circle">
                        </i> Eventos
                    </h4>
                </a>
              <em>
                <small class="text-muted"> 
                Con esta herramienta tu y los calaborades de la organización 
                podrán registrar y publicar eventos, incluyendo artistas,
                sus horarios, puntos de venta, accesos y más.
                </small>              
            </em>
            </div>
            <div class="timeline-body">
              
            </div>
          </div>
        </li>
        <!---->


        <li id='tendencias-section-panel' class="timeline-inverted">
          <div class="timeline-badge"><i class="fa fa-line-chart"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <a href="<?=base_url('index.php/tendencias/')?>"><h4 class="timeline-title"><i class='fa fa-pie-chart'></i>Tendencias</h4></a>
            </div>
            <div class="timeline-body">
                <p><small class="text-muted"> 
                Con ésta solución sabrás las tendencias, métricas y  reportes que te ayudarán a soportar la toma de deciciones 
                relacionadas a la actividad de tu empresa.
                </small>              
            </p>            
            </div>
          </div>
        </li>
        




        <li id='miembros-section-panel'>
          <div class="timeline-badge"><i class="fa fa-users"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title"><i class="fa fa-user"></i>
                <a href="<?=base_url('index.php/recursocontroller/usuarios')?>">Miembros de la cuenta</a>
              </h4>
              <p><small class="text-muted">
                Gestiona que personas pertenecen a la cuenta así como sus permiso y restricciones dentro de la misma.
              </small></p>
            </div>
            <div class="timeline-body">              
            </div>
          </div>
        </li>








        <li id='puntos-venta-section-panel' class="timeline-inverted">
          <div class="timeline-badge"><i class="fa fa-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
               <a href="<?=base_url('index.php/puntosventa/administrar')?>">
                
              <h4 class="timeline-title">
                <i class="fa fa-globe"></i>
Tus puntos de venta</h4></a>
            </div>
            <div class="timeline-body">
                <p>
                    <small class="text-muted">
                        Administra los puntos de venta en los cuales tus clientes podrán adquirir sus accesos.

                    </small>
                </p>
              
              
            </div>
          </div>
        </li>


        <li class='contactos-section-panel'>
          <div class="timeline-badge"><i class="fa fa-book"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title"><i class="fa fa-spinner"></i>
                <a href="<?=base_url('index.php/directorio/contactos')?>">Tus contactos</a>
              </h4>
              <p><small class="text-muted"> Manten al día tu lista de contactos, desde proveedores hasta las productoras de los artistas.</small></p>
            </div>
            <div class="timeline-body">
              
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge"><i class="fa fa-calendar"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
             <a href="<?=base_url('index.php/actividades/')?>"> <h4 class="timeline-title">Las actividades asignadas a los colaboradores</h4></a>
            </div>
            <div class="timeline-body">
               <small class="text-muted">
                    Asigna tareas a los miembros de la organización.
                </small>
              
            </div>
          </div>
        </li>


        <li id='plantillas-section-panel'>
          <div class="timeline-badge"><i class="fa fa-file-text-o"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
                <a href="<?=base_url('index.php/templates/eventos')?>">
                    <h4 class="timeline-title"><i class="fa fa-file"></i>Mis plantillas</h4>
                </a>
              <p><small class="text-muted"> Las plantillas son textos ágiles que te permitirá escribir continuamente las politicas de los eventas, reglas,  restricciones y demás 
              información común en los encuentros musicales.
                </small>
            </p>
            </div>
            <div class="timeline-body">
              
            </div>
          </div>
        </li>



        <li>
          <div class="timeline-badge"><a href="#panel-eventos" id='up-section'> <i class="fa fa-long-arrow-up"></i></a></div>        
        </li>


    



    </ul>
</div>





























<style type="text/css">
.title_main{
    display: none;
}
</style>


<style type="text/css">

    .timeline {
        list-style: none;
        padding: 20px 0 20px;
        position: relative;
    }
    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #155665;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-title {
    margin-top: 0;
    color: #4DA19E;


}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 15px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}
#up-section{
    color: white;
}
.text-muted{
    color: #000A17;
}
.contenedor-time{
    //background: #DEF2FB;
    padding: 5%;
}


</style>

<!--***********************************INICIA SERVICIOS MODAL  *************************-->
<?php $this->load->view("eventos/modal_config_event_template");?>
<!--***********************************TERMINA SERVICIOS MODAL  *************************-->





























<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/animate.css')?>">
<script type="text/javascript" src="<?=base_url('application/js/home/principal.js')?>"></script>