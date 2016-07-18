<div class='place_puntos_venta'>
</div>
<div class="panel-body">
    <div class="profile-desk">                        
        <hr>
        <div>	            
            <?=editar_btn($in_session , base_url('index.php/puntosventa/administrar') );?>                                             
            <?=agregar_btn($in_session , base_url('index.php/accesos/configuracionavanzada/1') . "/" .$data_evento['idevento'] );?>                                             
            <div class='contenedor_pv'>
                <div class="[ container text-center ]">
                    <div class='puntos_venta'>			
                    </div>
                    
                </div>
            </div>
        </div> 	
    </div>
</div>











<!--************************* ****************************** ***************************************-->            
<style type="text/css">

.contenedor_puntos_venta{
    background: rgb(22, 103, 129);    
}
#puntos-venta{
    color: white !important;
}
.contenedor_pv{
    background: white;
    padding: 10px;
}
</style>
