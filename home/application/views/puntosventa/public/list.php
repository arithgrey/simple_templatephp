<div class="col-lg-12  col-md-12 col-sm-12 ">
    <div class="panel">
        <div class="panel-body">
            <div class="profile-desk">
                <span class='titulo-config'> 
                    <?=editar_btn($param["in_session"]  , base_url('index.php/accesos/configuracionavanzada/1/'. $param["id_evento"].'/puntoventa/'))?>
                </span>     
                <h1 class='titulo-pv'>
                    Donde adquirir tus accesos 
                </h1>
            </div>

            <div>        
                <?=puntos_disponibles($puntos_venta , $param["in_session"] , $param["id_evento"])?>
            </div>



        </div>    
    </div>    
</div>            














<style type="text/css">
.titulo-config , .titulo-pv{
    display: inline-table;
}
</style>