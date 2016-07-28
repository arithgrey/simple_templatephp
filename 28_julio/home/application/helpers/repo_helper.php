<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	/**/
	function resumen_e($data){

		$tbl = "<span>No se han registrado eventos desde más de hace 30 días </span>"; 
		if ($data["num_eventos"] > 0 ){		

			$tbl =  create_header_resumem_e(); 			
			$tbl .= create_resumen_data($data["repo_evento"]);  
			$tbl .= "</table>";
		}
		/**/
		return $tbl;
	}	
	/**/
	function create_resumen_data($data){
		
		$tramo = ""; 
		$f = 1; 		
		foreach ($data as $row) {

			$idevento =  $row["idevento"]; 
			$nombre_event =  $row["nombre_evento"]; 
			$fecha_registro =  $row["fecha_registro"]; 
			$fecha_inicio =  $row["fecha_inicio"]; 
			$fecha_termino =  $row["fecha_termino"];
			$edicion =  $row["edicion"];	
			$num_accesos  =  $row["num_accesos"];
			$artistas =  $row["artistas"];
			$puntos_venta =  $row["evento_punto_venta"];

			

			$tramo .=   "<tr>";
				$tramo .= get_td($f);
				//$tramo .= get_td($img);				
				$tramo .= get_td($nombre_event);	
				$tramo .= get_td($fecha_registro);				
				$tramo .= get_td(fechas_enid_format($fecha_inicio , $fecha_termino));
				$tramo .= get_td($num_accesos);
				$tramo .= get_td($puntos_venta);
				$tramo .= get_td($artistas);			
			$tramo .=   "</tr>";

			$f ++; 

		}
		return $tramo; 
	}



	/**/
	function create_header_resumem_e(){
		$cabeceras =  array("#" , "Evento" ,  "Fecha registro" , "Fecha del evento",   "Accesos promocionados", "Puntos de venta" ,  "Artistas" ); 
		$header = "<table class='table_enid_service' border=1>"; 
			$header .= "<tr>"; 
			for ($x=0; $x < count($cabeceras); $x++) { 					
				$header .= get_td($cabeceras[$x]);
			}
		$header .= "</tr>"; 
		return $header; 
	}
	/**/
	function get_title_afectacion($tipo){
		$t1 =  "Afectacion"; 		
		if ($tipo ==  2 ) {
			$t1 =  "Prioridad"; 
		}
		$title = '<label>
					'. $t1 .'
				  </label>';
		return $title;

	}
	/**/
	function get_title_tipo($tipo){
		$t1 =  "Incidencia"; 		
		if ($tipo ==  2 ) {
			$t1 =  "Mejora"; 
		}
		$title = '<label>
					'. $t1 .'
				  </label>';
		return $title;

	}		
	/**/
	function get_titulo_form($tipo){

		$t1 =  "Registra incidencia "; 		
		if ($tipo ==  2 ) {
			$t1 =  "Propon una mejora "; 
		}
		$tipo =  '<div class="panel">
		            <div class="panel-body">
		                <div class="profile-desk">
		                    <h1>
		                        '.$t1.'
		                    </h1>
		                    <span class="designation">
		                        Ayudanos a brindarte un mejor servicio 
		                    </span>                                       
		                                       
		                </div>
		            </div>
		        </div>
';
		return $tipo;

	}
	/**/
	function reporte_cuadro_global($data){		

		$tb ="";
		if (count($data["fechas"]) > 0 ) {
			
			$tb .="<table class='table table-bordered'>";					
			$tb .=  get_vector_fechas($data["fechas"]); 		
			$tb .="</table>";			
		}
		/**/
		$data["linea_tiempo"] =  $tb; 
		$data["reporte"] =get_table_global($data["info"]);			
		return $data;
	}	
	/**/
	function get_vector_fechas($data){	
		$h =  "<tr>"; 		
		$h .= get_td("<a style='font-weight: bolder; font-size: .9em;' > últimos registrados </a>" ,"");
		foreach ($data as $row){
			$h .=  get_td( "<a style='font-weight: bolder; font-size: .9em;' class='f_busqueda' id='".$row["fecha"] ."'>". $row["fecha"] ."</a>", "");			
		}
		$h .=  "</tr>"; 		
		return $h;
	}
	/*Construimos la tabla global*/	
	function get_table_global($data){
		
		$tb ="";
		$tb .="<table class='table table-bordered' id='table-descriptions' style='display:none;'>";			
		$tb .="<tr class='enid-header-table'>";						
			$tb .=get_td("Conversión <br> C" , "");
			$tb .=get_td("Intervalo de promoción <br>IP" , "");
			$tb .=get_td("Contactos <br>CN" , "");
			$tb .=get_td("Contactos efectivos <br>CE" , "");
			$tb .=get_td("Intensidad<br> I" , "");
			$tb .=get_td("Promociones <br> P " , "");
		$tb .="</tr>";		
		$tb .="<tr>";						
			$tb .=get_td("Escenarios <br> E" , "");
			$tb .=get_td("Artistas <br> A" , "");
			$tb .=get_td("Servicios incluidos <br> SI" , "");
			$tb .=get_td("Géneros musicales <br> GM" , "");
			$tb .=get_td("Puntos de venta <br> PV" , "");
			$tb .=get_td("Ubicación<br>U" , "");		
		$tb .="</tr>";		
		$tb .="</table>";


		$tb .=  "<h6 class='mostrar-abreviaturas' id='mostrar-abreviaturas'><small>Mostrar abreviaturas</small></h6>";
		$tb .=  "<h6 class='ocultar-abreviaturas' style='display:none;' id='ocultar-abreviaturas'><small>Ocultar abreviaturas</small></h6>		
					";

		$tb .= '
		<div class="dinamic_fecha_text" id="dinamic_fecha_text"></div>		
		<a class="mas-info pull-right">+info</a>
				<a class="menos-info pull-right" style="display:none;">-info</a>';
		$tb .="<table class='table table-bordered' >";							



		
			$tb .="<tr class='enid-header-table'>";			
			$tb .= get_td("#" ,"");			
			$tb .= get_td("Evento" ,"title='nombre del evento' ");			
			

			$tb .= get_td("Edicion" ,"class='dinamic_campo_tb'  ");									
			$tb .=get_td("Escenarios" , "title='Escenarios del evento' ");
			$tb .=get_td("Artistas" , "title='Artistas de la escena' ");
			$tb .=get_td("Puntos de venta" , "title='El lugar donde el público puede adquirir sus boletos'");
			$tb .=get_td("Servicios" , "title='Servicios que puede disfrutar el espectador'");			
			$tb .=get_td("accesos" , "title='Dónde será el evento'");
			$tb .=get_td("Ubicación" , "title='Dónde será el evento'");
			$tb .=get_td("Eslogan" , "class='dinamic_campo_tb'  ");			
			$tb .= get_td("Fecha" , "titulo='Duración del evento'");
			$tb .= get_td("Lapso de la promoción (días)" , "title='Periodo desde que se píblica la campaña de marketing del evento hasta que el día del suceso' ");			
			
			$tb .= get_td("Días para el evento" , "titulo='Días restantes para el evento' class='dinamic_campo_tb' ");
			
			$tb .=get_td("Conversión" , "class='dinamic_campo_tb'");
			$tb .=get_td("Intervalo de promoción" , "class='dinamic_campo_tb'");
			$tb .=get_td("Contactos " , "class='dinamic_campo_tb'");
			$tb .=get_td("Contactos efectivos " , "class='dinamic_campo_tb'");
			$tb .=get_td("Intensidad" , "class='dinamic_campo_tb'");
			$tb .=get_td("Promociones" , "class='dinamic_campo_tb'");
			



			$tb .="</tr>";
			$b =1;

		
		foreach ($data as $row) {	

			$nombre_evento = $row["nombre_evento"];
			$edicion =  $row["edicion"];			
			$idevento =$row["idevento"]; 
			$escenarios =$row["escenarios"]; 
			$artistas =$row["artistas"]; 
			$evento_punto_venta =$row["evento_punto_venta"]; 
			$accesos =$row["accesos"]; 
			$servicios 	 =  $row["servicios"];
			$ubicacion =  $row["ubicacion"];
			$eslogan  =  $row["eslogan"];

			$fecha_inicio = $row["fecha_inicio"];
			$fecha_termino =  $row["fecha_termino"];
			$periodo_publicacion =  $row["periodo_publicacion"];
			$dias_restantes =  $row["dias_restantes"];



			$tb .="<tr ".dinamic_class_table($b)." >";	
			if ($nombre_evento != "Totales" ) {
				$tb .= get_td($b , "");			
			}else{
				$tb .= get_td("" , "");			
			}
			
			/*Nombre del evento*/
			$tb .= get_td(create_url_evento_public($nombre_evento , $idevento , 'style="color:white;" ' )  ,"class='franja-vertical'");
			/*Nombre del evento termina*/
			$tb .= get_td($edicion ,"class='dinamic_campo_tb'");			
			
			
			$tb .=get_td_val($escenarios , "");
			$tb .=get_td_val($artistas , "");
			$tb .=get_td_val($evento_punto_venta , "");			
			$tb .=get_td_val($servicios , "");
			
			$tb .=get_td_val($accesos , "");
			$tb .=get_td($ubicacion , "");
			$tb .=get_td($eslogan , "class='dinamic_campo_tb'");
			$tb .=get_td(fechas_enid_format($fecha_inicio , $fecha_termino )  , "");
			$tb .= get_td($periodo_publicacion , "" );
			$tb .= get_td($dias_restantes  , "class='dinamic_campo_tb'" );

			$tb .=get_td("" , "class='dinamic_campo_tb'");
			$tb .=get_td("" , "class='dinamic_campo_tb'");
			$tb .=get_td("" , "class='dinamic_campo_tb'");
			$tb .=get_td("" , "class='dinamic_campo_tb'");
			$tb .=get_td("" , "class='dinamic_campo_tb'");
			$tb .=get_td("" , "class='dinamic_campo_tb'");


			$tb .="</tr>";
			$b++;
		}
		$tb .="</table>
			<span class='botonExcel btn btn-default'>
	            Exportar a Excel 
	            <i class='fa fa-file-pdf-o'>
	            </i> 
            </span>      
        ";					
		return $tb;
	}
	/**/
	

	/**/
	function get_horizontal_vector($titulo){
		$tb =  ""; 
		$tb .="<tr>";			
		$tb .=  get_td( $titulo , "");
		$tb .="</tr>";
		return $tb;
	}
	/**/
	function r_gb_empresa($data){
		
		$tb ="<table class='table table-bordered'>";	
		$tb .="<tr class='enid-header-table'>";	
		$tb .=  get_td("La semana pasada", ""); 
		$tb .=  get_td("Esta semana", ""); 
		$tb .=  get_td("La próxima semana", ""); 
		$tb .=  get_td("Del anterior mes", ""); 
		$tb .=  get_td("Este mes", ""); 		
		$tb .=  get_td("El próximo mes", ""); 				
		$tb .="</tr>";	

		foreach ($data as $row){			
			
			$mes_menos_uno = $row["eventos_menos_1"];
			$mes =  $row["eventos_mes"];
			$eventos_mas_1 =  $row["eventos_mas_1"];							
			$semana_menos_uno  =  $row["semana_menos_uno"];
			$semana =  $row["semana"];
			$semana_mas_uno = $row["semana_mas_uno"];			
			/**/
			$tb .="<tr>";
			$tb .= get_td("<a class='dinamic_busqueda semana_menos_uno' id='1'>".$semana_menos_uno ."</a>", "");
			$tb .= get_td("<a class='dinamic_busqueda semana' id='2'>".$semana ."</a>", "");
			$tb .= get_td("<a class='dinamic_busqueda semana_mas_uno' id='3'>".$semana_mas_uno ."</a>", "");
			$tb .= get_td("<a class='dinamic_busqueda mes_menos_uno' id='4' >".$mes_menos_uno ."</a>", "");			
			$tb .= get_td("<a class='dinamic_busqueda mes'  id='6' > ".$mes ."</a>", "");			
			$tb .= get_td("<a class='dinamic_busqueda eventos_mas_1' id='5' > ".$eventos_mas_1 ."</a>", "");					
			$tb .="</tr>";
		}
		$tb .="</table>";		
		
		
		
		return $tb;
	}	
	/**/

}/*Termina el helper*/