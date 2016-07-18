<div class="container">
    <div class="row">
    	<h1 class="text-center">
    		Donde adquirir tus accesos
    	</h1>        
	    <span class="text-center">
	       Zonas disponibles
	    </span>	
    </div>
    <div id="quicknav">
    <?=zona_disponibles($puntos_venta)?>       
    </div>
    <br>
    <?=puntos_disponibles($puntos_venta , $param["in_session"])?>
</div>
<style type="text/css">
    .coupon #head {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        min-height: 56px;
    }
    .coupon #footer {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    #title .visible-xs {
        font-size: 12px;
    }
    .coupon #title img {
        font-size: 30px;
        height: 30px;
        margin-top: 5px;
    }
    .coupon #title span {
        float: right;
        margin-top: 5px;
        font-weight: 700;
        text-transform: uppercase;
    }
    .coupon-img {
        width: 100%;
        margin-bottom: 15px;
        padding: 0;
    }
    .items {
        margin: 15px 0;
    }
    .usd, .cents {
        font-size: 20px;
    }
    .number {
        font-size: 40px;
        font-weight: 700;
    }
    #business-info ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
        text-align: center;
    }
    #business-info ul li { 
        display: inline;
        text-align: center;
    }
    #business-info ul li span {
        text-decoration: none;
        padding: .2em 1em;
    }
    #business-info ul li span i {
        padding-right: 5px;
    }
    .disclosure {
        padding-top: 15px;
        font-size: 11px;
        color: #0a0606;
        text-align: center;
    }
    .coupon-code {
        color: #333333;
        font-size: 11px;
    }
    .exp {
        color: #f34235;
    }
    .print {
        font-size: 14px;
        float: right;
    }
    #quicknav ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
        text-align: center;
    }
    #quicknav ul li { 
        display: inline; 
    }
    #quicknav ul li a {
        text-decoration: none;
        padding: .2em 1em;
    }
    .btn-danger, 
    .btn-success, 
    .btn-info, 
    .btn-warning, 
    .btn-primary {
        width: 105px;
    }
    .panel_body_pv{            
        background: #E31F56;
        color: white;
    }
    .panel_footer_pv{
        background: #0F3140;
    }
    .panel_e{
        
        background: #032935;
    }.table_dias_disponibles{
        width: 100%;
        color: white;
    }
    .titulos_tabla_horarios{
        background: #12afe0;
        color: white;
        padding: 10px;
    }
    .table_dias_disponibles:hover{
        cursor: pointer;
    }
    .sitio_web_punto_venta{
        text-decoration: none;
        color: white;
    }
    .sitio_web_punto_venta:hover{
        text-decoration: none;        
        color: white;
    }
    .n_razon_social{
        color: white;
    }
    .btn_configurar_enid{
        color: white !important;
    }.fa-cog{
        color: #FBF790;
    }

</style>