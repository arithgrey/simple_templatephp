<script type="text/javascript" src="<?= base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/principal.js')?>"></script>
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/password.js')?>"></script>
<style type="text/css">

    #nomPersona:hover{
        font-size: 1.2em;
        cursor:pointer;
    }
    #designation:hover{
        font-size: 1.1em;
        cursor:pointer;
    }
    #texto:hover{
        font-size: 1.1em;
        cursor:pointer;
        /*color:yellow;*/
    }
    .oculto{
        display: none;
        width: 200px;
    }
    #ocultoTA1{
        display: none;
    }
    #ocultoTA2{
        display: none;
    }
    #alertaError{
        display: none;
        color: red;
    }
    #alertaExito{
        display: none;
        color: white;
    }
    .error{
        background-color: white;
    } 
    .panel-title, .collapsed {
        color: white;
    }
    .page-header{
        display: none;
    }
    .title-collapse-enid{
        color: black !important;
    }
    /*Fin Estilo para el html*/  
</style>
</style>



                        
                            
                
                            
                        
















                    
























































































            
              
                
                    <div class="row">


                        <div class="col-xs-12  col-sm-4 col-md-4 col-lg-4 text-center">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-desk">
                                       
                                        
                                            <h1 id="nomPersona"></h1>
                                            <center>
                                            <input class="oculto" type="text" />
                                            </center>                                    
                                            <span class='designation' id="designation"></span>
                                            <br>
                                            <textarea rows="5" cols="50" id="ocultoTA1" type="text"></textarea>
                                            <p id="texto"></p>                                        
                                            <textarea rows="5" cols="50" id="ocultoTA2" type="text">
                                            </textarea>
                                        

                    <div class="row state-overview">
                        
                            <div class="panel green">
                                
                                    <i class="fa fa-check"></i>
                               
                               
                                        <?=$perfilactual;?>
                               
                            </div>
                       
                    </div>
                    







                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    
       

                    <!--collapse start-->



                    <div class='col-xs-12  col-sm-8 col-md-8 col-lg-8 text-center'>

                    <div class="panel-group" id="accordion">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="">
                                    <a class="accordion-toggle collapsed title-collapse-enid" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="fa fa-unlock-alt"></i>
                                        Cambio de contraseña
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                

<!--Cambio de contraseña inicia -->
                    <div id="div-cambio-pw">

                                           
                                            <form class="form-horizontal" role="form">    
                                                    <div class="input-group">
                                                        <span class="input-group-addon">   
                                                            <label for="inputPassword1" class="control-label">
                                                                 Contraseña Anterior
                                                            </label>
                                                        </span>
                                                        <input type="password" class="form-control" id="anteriorP" placeholder="Anterior" required >            
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-addon">   
                                                               <label for="inputPassword1" class="control-label">
                                                                 Contraseña Nueva
                                                                </label>
                                                        </span>
                                                        <input type="password" class="form-control" id="nuevoP" placeholder="Nuevo" required > 
                                                    </div>                                                                                                       
                                                    <div class="input-group">
                                                        <span class="input-group-addon">                   
                                                                <label for="inputPassword1" class="control-label">
                                                                    Verifica Contraseña Nueva
                                                                 </label>
                                                        </span>
                                                        <input type="password" class="form-control" id="verificaP" placeholder="Verifica" required>                                                    
                                                    </div>                                                    
                                                                                            
                                                    <button class="btn btn-primary pull-right" type="button" id="botoncito">
                                                        <i class="fa fa-exchange"></i>
                                                        Actualizar contraseña
                                                    </button>
                                                                                                
                                                    <div class="btn btn-xs btn-info fade in" id ="alertaError"></div>
                                                    <div class="btn btn-xs btn-info fade in" id ="alertaExito"></div>                                                        
                                            </form>
                            </div><!--Cambio de contraseña termina -->



                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="">
                                    <a class="accordion-toggle collapsed title-collapse-enid" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Collapsible Group Item #2
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="">
                                    <a class="accordion-toggle title-collapse-enid" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Collapsible Group Item #3
                                    </a>
                                </h4>
                            </div>
                            <div style="height: auto;" id="collapseThree" class="panel-collapse collapse in">
                                <div class="panel-body">
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>    <!--collapse end-->
            </div><!--row-->


