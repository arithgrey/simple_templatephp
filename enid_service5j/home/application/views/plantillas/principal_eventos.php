<script type="text/javascript" src="<?=base_url('application/js/plantillas/principal.js')?>"></script>
<div class='container'>
    <div class='col-lg-3 col-md-3 col-sm-3'>
        <div class="form-group">                                         
            <select class='form-control input-sm' id='select-template' name='select_template'>            
                <option value='Eventos'>
                    Para eventos
                </option>
                <option value='Escenarios'>
                    Para escenarios
                </option>
            </select>
        </div>
    </div>
    
</div>
<!--***********************************Plantilla de escenarios ***********************************-->
<div class='container' id='section-escenarios' style='display:none;'>
    <br>
    <?=$this->load->view("plantillas/escenarios.php");?>
</div>
<!--***********************************Termina plantilla de escenarios ***********************************-->



<div class="container" id='section-eventos' >	
    <center>    
        <form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">        
            <center>
                <button class='botonExcel btn btn-default'  > 
                    Exportar a Excel 
                    <i class="fa fa-file-pdf-o">
                    </i> 
                </button>  
                <input type="hidden" id="datos_a_enviar" name="datos_a_enviar">
            </center>
        </form>

    </center>
	<section>
        <div class="wizard">            
            <div class="wizard-inner">
                <div class="connecting-line">
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="restriccion-section"  >
                        <a data-original-title="Step 2" href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title='Registra las restricciones más comunes que la organización exige a sus clientes en los eventos'>
                            <span class="round-tab">
                                <i class="glyphicon fa fa-exclamation-triangle">
                                </i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" >
                        <a data-original-title="Step 3" href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Registra los articulos que usualmente la empresa permite ingresar a los clientes en los eventos" >
                            <span class="round-tab">
                                <i class="glyphicon fa fa-check">
                                </i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="politicas-section" >
                        <a data-original-title="Complete" href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title='Redacta las políticas frecuentes de los eventos'>
                            <span class="round-tab">
                                <i class="glyphicon fa fa-circle">
                                </i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="active" >
                        <a data-original-title="Step 1" href="#plantillas_descripciones" data-toggle="tab" aria-controls="plantillas_descripciones" role="tab"  title='Redacta la experiencia  que los clientes usualmente viven en tus eventos'>
                            <span class="round-tab">
                                <i class="glyphicon fa fa-bars">
                                </i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div><!--Termina  wizard-inner  -->
                

            <!--INICIA EL RESUMEN -->    
            <div class="container">                    
                <div class="row"  id="print-section">                        
                    <div id='resumen-plantilla'>
                        <?=$resumen_teplates;?>                        
                    </div>
                </div>
                
            </div>
            <!--TERMINA  EL RESUMEN -->        
            <div class="container"> 
                <center>
                    <div class='panel  alert-ok'>
                        <em>
                            Registro exitoso.! 
                        </em>    
                    </div>
                    <div class='panel alert-fail'>
                        <em>
                            Falla al registrar,  reportar al administrador
                        </em>
                    </div>
                </center>
            </div>

                
            <div class="tab-content">
                 <!--******************* Editor Editor **********************************-->                                
                <div class="tab-pane active" role="tabpanel" id="plantillas_descripciones">                                                        
                    <section class="panel">
                        <header class="panel-heading blue-col-enid">
                            <i class="fa fa-list">
                            </i>
                            La experiencia en los eventos 
                            <br>
                            <button   class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-descripcion-eventos">
                                    + Cargar plantilla, de la experiencia en los eventos 
                            </button>                         

                        </header>
                        <div class="blue-col-enid-complement panel-body">                                    
                            
                        </div>
                        <div class='list-templ-descripcion' id='list-templ-descripcion'>
                        </div>
                    </section>                                                
                </div>
                <!--********************Editor Editor **********************************-->
                <div class="tab-pane" role="tabpanel" id="step2">                                            
                    <div class="form-group">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading blue-col-enid">
                                    <i class="fa fa-star">
                                    </i>
                                    Restricciones 
                                    <br>
                                    <button   class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-restriccion-eventos">
                                        + Cargar plantilla de restricciones 
                                    </button> 
                                </header>
                                <div class="blue-col-enid-complement panel-body">                                                    
                                                                                                                                                                                                                                                     
                                </div>
                                <div class='restricciones-user' id='restricciones-user'>
                                </div>
                            </section>
                        </div>                        
                    </div>                                    
                </div>

                <div class="tab-pane" role="tabpanel" id="step3">    
                    <div class="form-group">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading blue-col-enid">
                                    <i class="fa fa-heart">
                                    </i>
                                    Artículos
                                    
                                    <br>                                        
                                    <button   class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-articulo-eventos">
                                    + Cargar plantilla de artículo
                                    </button> 
                                </header>

                                <div class="panel-body"> 
                                    <div class='obj-permitidos scroll-vertical-enid ' id='obj-permitidos' style='height:500px;'>
                                        <?=$plantilla_obj_permitidos;?>                                                                        
                                    </div>                       
                                </div>
                            </section>
                        </div>        
                    </div>
                </div>

                <div class="tab-pane" role="tabpanel" id="complete">
                    <div class="form-group">                    
                        <section class="panel">
                            <header class="panel-heading blue-col-enid">
                                <i class="fa fa-flag">
                                </i>
                                Políticas
                                <br>
                                <button   class='btn btn btn_nnuevo' data-toggle="modal" data-target="#modal-politica-eventos">
                                    + Cargar plantilla de políticas  
                                </button> 
                            </header>       

                            <div class="blue-col-enid-complement panel-body">                                                             
                                  



                                <div class='list-politicas' id="list-politicas">
                                </div>
                            </div>                                            
                        </section>
                    </div>
                </div>   
                
            </div>
      
        </div>            
    
    </section>
</div>








<!--*******************MODAL DE CONFIGURACIÓN ***********************************-->
    <?=$this->load->view("plantillas/modal/config_evento");?>
<!--*******************TERMINA  MODAL DE CONFIGURACIÓN ***********************************-->
<style type="text/css">
.wizard {
    background: #fff;
    margin: 20px auto;
}
.wizard .nav-tabs {
    border-bottom-color: #e0e0e0;
    margin-bottom: 0;
    margin: 40px auto;
    position: relative;
}
.wizard > div.wizard-inner {
    position: relative;
}
.connecting-line{

    background: #e0e0e0;
    height: 2px;
    left: 0;
    margin: 0 auto;
    position: absolute;
    right: 0;
    top: 50%;
    width: 80%;
    z-index: 1;
}
.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    border-bottom-color: transparent;
    border: 0;
    color: #555555;
    cursor: default;
}
span.round-tab {
    background: #fff;
    border-radius: 100px;
    border: 2px solid #e0e0e0;
    display: inline-block;
    font-size: 25px;
    height: 70px;
    left: 0;
    line-height: 70px;
    position: absolute;
    text-align: center;
    width: 70px;
    z-index: 2;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}
span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}
.wizard .nav-tabs > li {
    width: 25%;
}
.wizard li:after {
    border-bottom-color: #5bc0de;
    border: 5px solid transparent;
    bottom: 0px;
    content: " ";
    left: 46%;
    margin: 0 auto;
    opacity: 0;
    position: absolute;
    transition: 0.1s ease-in-out;
}
.wizard li.active:after {
    border-bottom-color: #5bc0de;
    border: 10px solid transparent;
    bottom: 0px;
    content: " ";
    left: 46%;
    margin: 0 auto;
    opacity: 1;
    position: absolute;
}
.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}
.wizard .nav-tabs > li a:hover {
    background: transparent;
}
.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}
.wizard h3 {
    margin-top: 0;
}
@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }
    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
    }
    .alert-ok , .alert-fail{
        display: none;
    }
    .del_obj_permitido:hover{
        cursor: pointer;
    }
    .nota-articulo:hover{
        cursor: pointer;        
    }
</style>





<style type="text/css">
.descripcion-nota-section{
    -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
    -webkit-transition:all ease .8s ;
    background: black;
    color: white;
    filter: alpha(opacity=0); /*Opacidad Para IE */
    left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
    opacity: 0; /*Inicialmente transparente */
    padding: 5px;
    position: absolute; /*Info sobre la imagen*/
    top: 5%;
    transition:all ease .8s;
    zoom: 1;
}
.nota-articulo:hover .descripcion-nota-section{
    filter: alpha(opacity=80);
    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
}
</style>




























