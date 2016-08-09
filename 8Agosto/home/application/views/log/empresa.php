<?php 	
	$list =  ""; 		

	$d_class ='';
	if (count($log)> 9 ) {
		$d_class="style='overflow-y:scroll;  height: 400px;' ";	
	}

	foreach ($log as $row) {
		
		$id_usuario     = $row["id_usuario"];
		$id_log         = $row["id_log"];
		$fecha_registro = $row["fecha_registro"];
		$idusuario      = $row["idusuario"];
		$nombre         = $row["nombre"];
		$email          = $row["email"];
		$puesto         = $row["puesto"];
		$cargo          = $row["cargo"];
		$modulo         = $row["modulo"];
		$tipo_evento    = $row["tipo_evento"];
		$descripcion    = $row["descripcion"];
		$id_modulo      = $row["id_modulo"];

		$class = ["" , "insert_class" ,  "update_class" , "delete_class" ];
		$imgs =["", "img_insert.png" ,  "img_update.png" , "img_delete.png"]; 
		$nota_log =["", "Información del evento" ,  "Información del escenario" , "Información del artista" ,  "Información de los accesos"];
		
	
		$url_img_icon = base_url("application/img")."/".$imgs[$tipo_evento];

		$list .=  '
			<div class="panel-body '. $class[$tipo_evento]  .' ">
                <div class="media blog-cmnt">
                    <a href="javascript:;" class="pull-left">
                        <img alt="" src="'.$url_img_icon.'" class="media-object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="#">
                            '.$nombre . " | " .$email  .'| '. $puesto.'|'.$cargo.'
                            </a>
                        </h4>                        
                        <p class="mp-less">
                          '.$descripcion.'
                        </p>
                        <span class="fecha-registro">
                        '.$fecha_registro.'
                        </span>
                        <span class="info-modulo btn btn-default input-sm pull-right">
                        '.$nota_log[$modulo].'
                        </span>
                    </div>
                </div>
            </div>        
		';
	}
?>
<divc <?=$d_class;?>>
	<?=$list?>
</div>




<style type="text/css">
	.fecha-registro{
		font-size: .9em;
		font-weight: bold;
		color: black !important;
	}.mp-less{
		font-size: .8em;
	}.insert_class{
		background: #f5f5f5;
	}.update_class{
		background: #428bca;
		color: white;
	}.delete_class{
		background: #d9534f;
	}.enid-scroll-log{
		height: 700px;
		overflow-y: scroll;
	}.info-modulo{
		font-size: .8em;
		background: #223c48;
		color: white !important;
	}
</style>