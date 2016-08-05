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

		$list .=  '
			<div class="panel-body '. $class[$tipo_evento]  .' ">
                <div class="media blog-cmnt">
                    <a href="javascript:;" class="pull-left">
                        <img alt="" src="images/blog/blog-avatar.jpg" class="media-object">
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
}
.mp-less{
	font-size: .8em;
}
.insert_class{
	background: #f5f5f5;
}
.update_class{
	background: #428bca;
	color: white;
}
.delete_class{
	background: #d9534f;
}
.enid-scroll-log{
	height: 700px;
	overflow-y: scroll;
}
</style>