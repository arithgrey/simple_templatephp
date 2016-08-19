<div class="container">    
    <div class='row'>
        <button id="nuevo-contacto-button" type="button" class="btn btn btn_nnuevo pull-left btn_new_pv" data-toggle="modal" data-target="#contact-modal">
        + Nuevo 
        </button>
    </div>        
    <div class='section-busqueda-enidservice' title='Filtro criterio'>            
        <form class='form-filtro' id="form-filtro">    
            <div class='col-lg-4 col-md-3 col-sm-12' title='Filtro criterio'>                    
                <div class="input-group">
                    <div class="input-group-addon">
                        Punto de venta 
                    </div>
                    <input name='puntos_venta_b' id='puntos-venta-filtro' class='puntos-venta-filtro  input-sm form-control' value='<?=$q?>'>                       
                </div>
            </div>                
            <div class='col-lg-3 col-md-3 col-sm-12' title='Filtro criterio'>                                
                <div class="input-group">
                    <div class="input-group-addon">
                        Zona
                    </div>                
                    <select name='zona_b' class='form-control input-sm' id="busqueda-zona" >
                        <?=lista_zonas_punto_venta();?>
                    </select>
                </div>    
            </div> 
            <div class='col-lg-3 col-md-3 col-sm-12' title='Filtro criterio'>                            
            </div>    
            <div class='col-lg-2 col-md-3 col-sm-12' title='Filtro criterio'>                                   
                <button class="btn btn_busqueda pull-right" id='busqueda-btn'>
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <div>
        <div class='place_puntos_venta'>
        </div>
        <div class="puntos_venta">                        
        </div>
    </div>        
</div>



























<script type="text/javascript" src="<?=base_url('application/js/puntosventa/principal.js')?>">
</script>
<script type="text/javascript" src="<?=base_url('application/js/puntosventa/img.js')?>">
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVF0GA9R64Jnbd3ZX53TnLI-61vOqcq-4&signed_in=true&libraries=places" async defer>
</script>

<div  id='map'>
</div>




<input type='hidden' value='<?=$qmodal?>' class='qmodal'> 
<?=$this->load->view("puntosventa/modal/principal_config")?>
<style type="text/css">
 #resultado-filtro-contactos-div, #busqueda-contactos-section{
        display: none;
    }
    #text-busqueda-contactos{
        padding: 10px;
    }
    #text-busqueda-contactos:hover{
        cursor: pointer;
        background: #1A6174;
        color: white;
    }
    .header-table{
        background: #10B9D5 none repeat scroll 0% 0%;
        text-align: center !important;
    }
    .status-registro{
        display: none;
    }
    .img_punto_venta:hover , .nota-punto-venta:hover , .contactos:hover , .editar-punto-venta:hover , .delete-punto-venta:hover{
        cursor: pointer;
        }
    .delete-contacto-icon {
        position: absolute; 
        top: 5%;
        left: 10%; 
        zoom: 1;
        filter: alpha(opacity=0); 
        opacity: 0;
        padding: 5px;
        color: white;
        background: black;
        -moz-transition:all ease .8s; 
        -webkit-transition:all ease .8s ;
        transition:all ease .8s;
    }
    .img-horizontal:hover .delete-contacto-icon{
        filter: alpha(opacity=80);
        opacity: .8; 
    }
    .seccion-disponibilidad{
        background: #ecebe0;
        padding: 6px;
    }
    .dinamic_campo_tb{
        display: none;
    }
    .fa-check{
        color: #ffe8ef;
    }
    #nota-punto-venta , .map-icon{
        display: inline-table !important;
    }
</style>





