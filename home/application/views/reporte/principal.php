<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12'>
        <div class='ver-public-lg-emp'>              
            <a href="#faq-cat-2"  data-toggle="tab"  class='links_enid carga_resumen_eventos tab_enid_w active'>Eventos                     
            </a>|        
            <a href="#faq-cat-3"  data-toggle="tab" class='carga_resumen_cominidad tab_enid_w'>
                Lo que la comunidad quiere                        
            </a>|
            <a href="#solicitudes-artistas"  data-toggle="tab"   class='carga_resumen_solicitudes tab_enid_w'> 
                Artistas solicitados                    
            </a>|
            <a href="#faq-cat-4"  data-toggle="tab" class='carga_resumen_movimientos tab_enid_w '>
                Movimientos                           
            </a>
        </div>       
    </div>
</div>




      
<hr>

<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12'>                     
        <div class="tab-content">
            
            <div class="tab-pane active" id="faq-cat-2">
                <?=$this->load->view("reporte/admin_eventos")?>
            </div>
            <div class="tab-pane" id="faq-cat-3">
                <div class='place_comentarios'>
                </div>
                <div class='place_comentarios_comunidad'>
                </div>           
            </div>
            <div class="tab-pane" id="solicitudes-artistas">
                <div class='place_solicitudes_artistas'>
                </div>
            </div>
            <div class="tab-pane" id="faq-cat-4">
                
                <h2 class="title-enid-resum">
                    Últimos movimientos
                </h2>
                <div class='place_ultimos_movimientos'>
                </div>                
            </div>
        </div>      
    </div>  	
</div>



<input type='hidden' value='nombre_empresa' id='<?=$data_empresa["nombreempresa"]?>' class='nombre_empresa'>
<script type="text/javascript" src="<?= base_url('application/js/reportes/principal_home.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/reportes/resumen_cominidad.js')?>"  ></script>
<input type='hidden' class='id_empresa' value="<?=$id_empresa;?>">

<style type="text/css">    
    .title {
        font-size: 3em;
        font-weight: 700;       
        text-align: center;
    }   
    .mostrar-abreviaturas:hover ,  .ocultar-abreviaturas:hover{
        padding: 1px;
        cursor:pointer;
    }
    .botonExcel{
        cursor: pointer;
    }
    .section-header-title{
        display: none;
    }
    .f_busqueda:hover{
        cursor: pointer;
    }
    .tab_enid_w {
        margin-right: 1%;
        color: white;
    }


    
</style>

<style type="text/css">
.seccion-presentacion_bienvenida{
    background: rgb(6, 51, 73);
    padding: 10%; 
}
.enid_bienvenida{
    font-size:3.7em;
    color: white !important;
    font-weight: bold;          
}
.tab_principal:hover{
    cursor: pointer;
}
.seccion-bienvenida{
    background: rgb(4, 97, 136);
    padding: 10px;
}.title_name_user{
    font-size: 1.5em;
    color: white;
}
.nombre_user{
    text-align: right !important;
}
.primeros-pasos{
    float: right;
    background: #063349;
    color: white !important;    
}
.nav .open>a, .nav .open>a:hover, .nav .open>a:focus{
    background: #3f8790;
    color: white !important;   
}
.text-title-enid-home{
    font-size: 1.5em;
    font-weight: bold;
    text-decoration: none;
    color: black;
}
.text-title-enid-home:hover{
    font-size: 1.5em;
    font-weight: bold;
    text-decoration: none;
    color: black;
}
.menu-reportes{
    margin-bottom: 10px;
}
.accesos:hover,
.puntos_venta:hover,
.artistas:hover{
    cursor: pointer;
}
.title-enid-resum{
    font-weight: bold;
}
.seccion-desc{
    margin-top: 30px;
}
@media only screen and (max-width: 991px){
    .link_resum{
        background: #dae8ef;        
        text-align: right;
    }
    .nav .open>a, .nav .open>a:hover, .nav .open>a:focus{
        background: #3f8790;
        color: white !important;   
        width: 100%;
    }
    .primeros-pasos{
        float: right;
        background: #3f8790;
        color: white !important;         
    }

}
</style>
