<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

	function getData($arreglo){

		$accesos = "";
		$in = 1;
		foreach ($arreglo["listaccesos"] as $rowccesos) {
				


					$periodo  = $rowccesos["inicio_acceso"] . " al "  . $rowccesos["termino_acceso"];
					
					$accesos .= "<tr>
                        <td class='blue-col-enid'> ". $in ."</td>
                        <td>
                            <h4>". $rowccesos["tipo"] ." </h4>                            
                        </td>
                        <td class='text-center'>
                        	<strong> $". money_format( "%i" ,  $rowccesos["precio"] ) ."</strong></td>
                        	<td class='text-center'><strong> ". $periodo  . "</strong></td>
                        <td class='text-center'>
                        <strong><i data-toggle='modal' data-target='#confirmationdeleteacceso'  class='fa fa-minus-circle remove-acceso' id='". $rowccesos["idacceso"] ."'></i> </strong></td>
                    </tr>";

                
                    $in ++;
		}



		$tipos ="";

			foreach ($arreglo["tipo_acceso"] as $row) {
				
				$tipos .="<option value='".$row["idtipo_acceso"] ."'>".$row["tipo"]."</option>";
			}
	


		
		$data["accesos"] = $accesos;
		$data["tipo"] = $tipos;		
		
		return $data;	
	}




	/**********************************************/


	function accesos_view_default($arreglo_accesos){

		$list_accesos ='';
		$fecha_actual ='aaa';

		print_r(count($arreglo_accesos));


		foreach ($arreglo_accesos as $row) {
		
			$fecha_rango = $row["inicio_acceso"];

			
			$num_col =4;

			if (count($arreglo_accesos) > 3) {

				$num_col =3;	
			}

			if ($fecha_actual == $fecha_rango) {
				

				$listaccesos .='<div class="col-sm-'.$num_col.'">
				<div class="plan shadow light-gray-bg bordered best-value">
									<div class="header default-bg">
										<h3>Premium</h3>
										<div class="price"><span>$19.99</span>/m.</div>
									</div>
									<ul>
										<li>80 Users</li>
										<li>Unlimited Disk Space</li>
										<li>
											<a href="#" class="pt-popover" data-toggle="popover" data-placement="right" data-content="Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." title="" data-original-title="Unlimited Subdomains">Unlimited Email Acounts</a>
										</li>        
										<li>Subdomains</li>
										<li>Security</li>
										<li>500 Visitors per month</li>
										<li>1 Database</li>
										<li><a class="btn btn-default btn-animated btn-lg radius-50">Add to cart <i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div></div>';

			}else{

				$list_accesos .='<div class="col-sm-'.$num_col.'">
						<div class="plan shadow light-gray-bg bordered">
													<div class="header dark-bg">
														<h3>'.$row["tipo"] .'</h3>
														<div class="price"><span>Free</span></div>
													</div>
													<ul class="">
														<li>1 User</li>
														<li>
															<a href="#" class="pt-popover" data-toggle="popover" data-placement="right" data-content="Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." title="" data-original-title="15GB Storage" data-trigger="hover">1GB Storage</a>
														</li>
														<li>
															<a href="#" class="pt-popover" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." title="" data-original-title="15 Email Acounts">1 Email Acounts</a>
														</li>
														<li>Subdomains</li>
														<li>Security</li>
														<li>Bandwidth</li>
														<li>Databases</li>
														<li><a class="btn btn-dark radius-50 btn-animated btn-lg">Subscribe <i class="fa fa-user"></i></a></li>
													</ul>
												</div>

						</div>';



			}

		




								




		}								


		return $list_accesos;
	}


}/*Termina el helper*/
 
