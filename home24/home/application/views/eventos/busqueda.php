
<div class='container'>    
    <div class="panel" >
        <div class="panel-body">
            <div class="profile-desk">                                         
            <h1>Encuentra tu evento</h1>    
            <!--*************Parámetros de busqueda ********************* -->                                    
            <form class='busqueda-general-form' id='busqueda-general-form' >
                <div class='col-lg-5 col-md-6 col-sm-5'>
                    <span  class="control-span">
                        Evento /Artista /Genero musical /Lugar
                    </span>
                    <input name='palabra_clave' class='palabra_clave form-control input-sm' id="palabra_clave" placeholder='Palabra que identificar al evento, artista o genero musical' >
                </div>
                <div class='col-lg-5 col-md-6 col-sm-5'>
                    <span class="control-span">
                        Cuando
                    </span>
                    <select class="form-control input-sm" id="busqueda-cuando" name="cuando">
                        <option value="Cualquiera">
                            Cualquiera
                        </option>
                        <option value="0">
                            El día de hoy
                        </option>
                        <option value="mas_uno">
                            El día de mañana
                        </option>                        
                        <option value="semana">
                            De la semana
                        </option>
                        <option value="mes">
                            Del Mes 
                        </option>       
                        <option value="Del próximo mes">
                            Más
                        </option>                                                
                    </select>
                </div>                            
                <div class='text-center'>
                    <br>
                    <button type="submit" id="busqueda_event"  class='btn btn btn_nnuevo pull-right'>                
                            Buscar                
                    </button>
                </div> 
            </form>                                                         
            <!--*************************Busqueda general Termina **********************************-->                 
            </div>
        </div>
    </div>
</div>




<div class='eventos-encontrados' id='eventos-encontrados'>    
    
    <!--
        Test de la consulta mysql  en la búsqueda
        <div class='container'>        
            <div id='query-test' > 
            </div>
        </div>
    -->
    <div class='container'>
        <div id='events' class='events'> 
        </div>
    </div>
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
    .section-header-title{
        display: none;
    }
    .slogan_section{
        background: #09afdf;
        padding: 5px;
        color: white;
    }
</style>
<script type="text/javascript" src="<?=base_url('application/js/busquedas/eventos.js')?>"></script>