<?=ini_set('display_errors', '1');?>
<section class="panel">
    <header class="blue-col-enid panel-heading custom-tab turquoise-tab">
        <ul class="nav nav-tabs blue-col-enid">     
            <li class="active">
                <a data-toggle="tab" href="#busqueda-general">
                <i class=""></i>
                General
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#busqueda-avanzada">
                     <i class=""></i>Avanzada
                </a>
            </li>                                        
        </ul>
    </header>
    <div class="panel-body  panel-body-enid" >
        <div class="tab-content">
            <div id="busqueda-general" class="tab-pane active">             
                <!--************************Busqueda general ***********************************-->
                <table class='table'>
                    <tr>
                        <td colspan="12" ><center><em style='color:white;'>Parámetros de búsqueda</em></center></td>
                    </tr>                                
                </table>
                <!--*************Parámetros de busqueda ********************* -->
                <div class='col-lg-12 col-md-12 col-sm-12 well'>
                    <center>
                        <form class='busqueda-general-form' id='busqueda-general-form' >
                            <div class='col-lg-5 col-md-6 col-sm-5'>
                                <span  class="control-span">Evento/Artista/Genero musical/Lugar</span>
                                <input name='palabra_clave' class='palabra_clave form-control input-sm' id="palabra_clave" placeholder='Palabra que identificar al evento, artista o genero musical' >
                            </div>
                            <div class='col-lg-5 col-md-6 col-sm-5'>
                                <span class="control-span">Cuando</span>
                                <select class="form-control input-sm" id="busqueda-cuando" name="cuando">
                                    <option value="Cualquiera">Cualquiera</option>
                                    <option value="0">El día de hoy</option>
                                    <option value="1">El día de mañana</option>
                                    <option value="3">En 3 días</option>
                                    <option value="4">En 4 días</option>
                                    <option value="5">En 5 días</option>
                                    <option value="6">En 6 días</option>
                                    <option value="7">En 7 días</option>
                                    <option value="14">En 14 días</option>
                                    <option value="Del próximo mes">En 30 días</option>                                    
                                    <option value="Más">Más</option>                                    
                                </select>
                            </div>
                            
                            <div class='col-lg-2 col-md-6 col-sm-2'>
                                <br>
                                <button type="submit" id="busqueda_event"  class='btn btn btn_nnuevo pull-right'>
                                    <em>
                                        Buscar
                                    </em>
                                </button>
                            </div> 
                        </form> 
                    </center>                  
                </div>
                <!--*************Termina  Parámetros de busqueda ********************* -->
                <!--*************************Busqueda general Termina **********************************-->
            </div>
            <div id="busqueda-avanzada" class="tab-pane">
                   ok
            </div>
        </div>
    </div>
</section>



<div class='eventos-encontrados' id='eventos-encontrados'>
    <!---->
    <div id='query-test' > </div>
    <div id='events' class='events'> </div>
    <!---->
</div>




















<style type="text/css">
.parametros_busqueda{
    background: #208CC1;
    //background: #45A4B3;
    //background: #1693a5;
    //background: #1B3438 none repeat scroll 0% 0%;
    background: #0C2C2F none repeat scroll 0% 0%;
    color: white;
}
.th_table{
    background:#141414;
}
#busqueda_event{
    background: #FCF8E3;
    color: black;
}
.title_main{
    display: none;
}
.input-busqueda{
    height: 30px!important;
}
</style>
<script type="text/javascript" src="<?=base_url('application/js/busquedas/eventos.js')?>"></script>



