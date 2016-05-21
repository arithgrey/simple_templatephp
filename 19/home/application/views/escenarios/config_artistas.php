<div class="pull-right mas-info" style="font-size: 0.7em; padding: 5px; margin-left: 1px; display: block;">
    <i class="fa fa-chevron-down">
    </i>  + info
</div>
<div class="pull-right menos-info" style="font-size: 0.7em; padding: 5px; margin-left: 1px; display:none;">
    <i class="fa fa-chevron-up">
    </i>  - info
</div>
<div class='container' id='section-resumen-artistas' style='display:none;'>
	<h3>
		Artistas que se presentarán en este escenario
	</h3>	
	<div >
	    <div class='resumen-artistas-escenario-event'>         	        
	    </div>
	</div>
</div> 
<!--inician los artistas del escenario-->
<div class='response_img_artista' id='response_img_artista'>
</div>                                        
<div class='artistas-escenario-section' id='artistas-escenario-section'>
    <div class="animationload" id='loading_artistas' style='display:none'>
        <div class="osahanloading">
        </div>
    </div>     
    

  
   	  
  

</div>
<!--Terminan los artistas del escenario -->
<script type="text/javascript">
	$(".mas-info").click(function(){
		$("#section-resumen-artistas").show();
		$(".mas-info").hide();
		$(".menos-info").show();
		
	});
	$(".menos-info").click(function(){
		$("#section-resumen-artistas").hide();
		$(".mas-info").show();
		$(".menos-info").hide();
		
	});
</script>