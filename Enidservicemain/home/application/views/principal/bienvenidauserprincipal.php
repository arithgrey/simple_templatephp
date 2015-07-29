<script type="text/javascript">
$(document).ready(function(){
	
		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("#event-img");


});
</script>

<link href="<?=base_url('application/js/js/dropzone/css/dropzone.css')?>" rel="stylesheet"/>
<!--dropzone-->
<script src="<?=base_url('application/js/js/dropzone/dropzone.js')?>"></script>

<?php
	$evento_carpet  =  base_url().'application/uploads/upload.php?e=5';
?>


<form action="<?=$evento_carpet?>" class="dropzone" id="event-img">

	<input type="file" name="file">
	
    
</form>
