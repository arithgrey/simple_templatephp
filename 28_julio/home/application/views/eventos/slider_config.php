<?php 
	/*imagenes_portada*/
	$slider = '<div class="carousel-inner">'; 
	$flag = 0; 
	$class =''; 
	
    foreach ($imagenes_portada as $row) {    		
	   	$img =  create_icon_img($row , 'thumbnail' , ' ' );  	
	   	if ($flag == 0 ) {
	   		$class= ' active ';
	   		$flag++;
	   	}else{
	   		$class= '';
	   	}
	   

	   	$slider .= '
	   	 	<div class="item '. $class .'">
		    '. $img .'
		    </div>
	   				';
	  
	}

	$slider .= '</div>';     
    

?>

<div id="myCarousel" class=" vertical-slider carousel vertical slide col-md-12" data-ride="carousel">
   <div class="row">
       <div class="col-md-4">
           <span data-slide="next" class="btn-vertical-slider fa fa-angle-double-up ">
           </span>  
       </div>
       <div class="col-md-8"> 
       </div>
   </div>                                                         
    <?=$slider?>  
   <div class="row">
     <div class="col-md-4">
         <span data-slide="prev" class="btn-vertical-slider  fa fa-angle-double-down" >
         </span>
     </div>
     <div class="col-md-8">
     </div>
   </div>
</div>



<style type="text/css">
 .btn-vertical-slider{
 	font-size: 30px; 	
 	color: white;
 }
</style>



<div id="myCarousel" class="carousel slide" data-ride="carousel">  
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true">
    </span>
    <span class="sr-only">
      Anterior
    </span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true">
    </span>
    <span class="sr-only">
      Siguiente
    </span>
  </a>
</div>
