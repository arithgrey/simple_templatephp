<div class="wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="row" >
                        <div class="col-md-12"  data-toggle="modal" data-target="#modal-logo-empresa"  id='modal-img-logo-empresa'  >
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-pic text-center">
                                        
                                        <img src="<?=$logo_imagen;?>" id="logo_empresa_img" class='logo_empresa_img'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states green-box">
                                    <div class="summary pull-left">
                                        <h4 class='años-empresa-text' id='años-empresa-text'  >Años  <span>haciendo historia</span> <i class="fa fa-pencil-square-o"></i></h4>
                                        <h3 class='años-empresa-text_place' id="años-empresa-text_place"><?=$data_empresa["años"];?></h3>
                                                                              
                                        <div class='row'>   
                                          <div class="input-group" id="años-section" class='años-section'>        
                                              <div class="input-group">
                                                
                                                <select class='form-control' id='años-input'  name='años-input'>
                                                <?=$years;?>
                                                </select>
                                                </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="pro-refund" class="chart-bar"><canvas width="68" height="35" style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">




                                <div class="panel-body p-states green-box medios-contacto" style='background:#0D3441;' data-toggle="modal" data-target="#modal-contactos"  >
                                    <div class="summary pull-left">
                                        <h4  >
                                          Medios de  <span>contacto <i class="fa fa-mobile"></i></span></h4>
                                          <h3 id='resumen-num-contactos'><?=$empresa_contactos_num;?></h3>

                                    </div>



                                    <div id="expense2" class="chart-bar"><canvas width="68" height="35" style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas></div>
                                </div>
                                <br>




                                
                                <div class="panel-body p-states green-box" style='background:#0D3441;'  >
                                    <div class="summary pull-left">
                                          
                                          <h4>País</h4>
                                          <div class='pais_empresa_text' >  
                                            <h3 id='text-nombre-empresa'><?=$data_empresa["countryName"]?></h3>
                                          </div>                                            
                                          <div class='pais_empresa_input'>
                                            <select class="form-control" id="pais-select" name="pais">
                                              <?=$select_pais;?>
                                            </select>
                                          </div>

                                    </div>



                                    <div id="expense2" class="chart-bar"><canvas width="68" height="35" style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas></div>
                                </div>






                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="panel" >
                                <div class="panel-body">
                                    <div class="profile-desk">
                                        <h1> 
                                          <div class='row'>
      <h1 class='nombre-empresa-text' id='nombre-empresa-text'>

        <span class="label label-default"> Empresa  <?=$data_empresa["nombreempresa"];?></span>
      </h1>     
    </div>
    <!--Editar nombre empresa -->
    <div class='nombre-empresa-section' id="nombre-empresa-section">
      <div class="input-group">        
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">Nombre </button>
        </span>
        <input type="text"  value="<?=$data_empresa["nombreempresa"];?>" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
      </div>
  </div>


















  






                                        </h1>
<!--*********************************************Quienes somos *********************************************-->
                                        <div class='row'>                                          
                                            <br>
                                            <span class="designation description-empresa-text" id="description-empresa-text"> Quiénes somos <i class="fa fa-pencil-square-o"></i></span>
                                          
                                        </div>

    
                                        <p  class='description-empresa-text_place' id="description-empresa-text_place">
                                           <?=$data_empresa["quienes_somos"]?>
                                        </p>
                                        <div class='row section-description-empresa' id="section-description-empresa">
                                              <div class="input-group">               
                                                <span class="input-group-addon" id="sizing-addon1">Quiénes somos</span>
                                                <div >        
                                                  <textarea class="form-control" id='descripcion-empresa-input' class='descripcion-empresa-input' rows="3">
                                                    <?=$data_empresa["quienes_somos"]?>
                                                  </textarea>
                                                </div>      
                                              </div>      

                                        </div>



<!--*********************************************Misión empresa  *********************************************-->


                                        <div class='row'>                                                                                      
                                            <span class='designation misions-empresa-text' id='mision-empresa-text'> Misión <i class="fa fa-pencil-square-o"></i></span>                                          
                                        </div>

    
                                        <p class='mision-empresa-text_place' id="mision-empresa-text_place">
                                           <?=$data_empresa["mision"]?>
                                        </p>
                                        
                                        <div id="section-mision-empresa" class='row section-mision-empresa'>
                                          <div class="input-group">               
                                            <span class="input-group-addon" id="sizing-addon1">Misión</span>
                                            <textarea class="form-control" id='mision-empresa-input' class='mision-empresa-input' rows="3">
                                              <?=$data_empresa["mision"]?>
                                            </textarea>
                                          </div>
                                       </div>     

<!--********************************************* Visión *********************************************-->





                                        <div class='row'>                                                                                      
                                            <span class='designation vision-empresa-text' id='vision-empresa-text'> Visión <i class="fa fa-pencil-square-o"></i></span>                                          
                                        </div>
                                        <p class='vision-empresa-text_place' id="vision-empresa-text_place">
                                           <?=$data_empresa["vision"]?>
                                        </p>                                        
                                        <div id="section-vision-empresa" class='section-vision-empresa'>
                                          <div class="input-group">               
                                            <span class="input-group-addon" id="sizing-addon1">Visión</span>
                                            <textarea class="form-control" class="form-control descripcion-vision-input" id='descripcion-vision-input' rows="3">
                                              <?=$data_empresa["vision"]?>
                                            </textarea>
                                          </div>
                                       </div>     

<!--********************************************* *********************************************-->






                                        <div class='row'>                                                                                      
                                            <span class='mas-info-empresa-text designation ' id='mas-info-empresa-text'> + Información <i class="fa fa-pencil-square-o"></i></span>                                          
                                        </div>
                                        <p class='mas-info-empresa-text_place' id="mas-info-empresa-text_place">
                                           <?=$data_empresa["mas_info"]?>
                                        </p>                                        
                                        <div id="section-mas-info" class='section-mas-info'>
                                          <div class="input-group">               
                                            <span class="input-group-addon" id="sizing-addon1">+ Info </span>
                                            <textarea name='mas_info_empresa' class="form-control"   id='mas-info-empresa-input'   rows="3">
                                              <?=$data_empresa["mas_info"]?>
                                            </textarea>       
                                          </div>
                                       </div>    

  <!--************************************* ***********************************-->



































                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                      
                </div>
            </div>
        </div>
































































<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>








<style type="text/css">
.section-description-empresa, #nombre-empresa-section, 
.section-mision-empresa,.section-vision-empresa, #años-section,
 #section-mas-info {
	display: none;
}



.description-empresa-text:hover, .misions-empresa-text:hover, .vision-empresa-text:hover, .mas-info-empresa-text:hover, .años-empresa-text:hover{
  padding: 2px;
  cursor: pointer;

}
</style>






<!--*****************************************************************************-->
<div id="modal-contactos" class="modal fade">  
<div class="modal-dialog modal-lg">
  <div class="modal-content">      
      <!--*************************** Header modal *********************************-->

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Medios de contacto</h4>
      </div>            
      <!--***************************End Header modal *********************************-->
      <div class="modal-body">                  
      	<div id='list-contactos' class='list-contactos'>
      		<?=$contactos_empresa?>
      	</div>        

      	
      </div><!--*********************Termina body modal ******************* -->             


      <!--Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>

</div>


































<!--********************************************************************+******-->




<!--*****************************************************************************-->


<input type='hidden' value="<?=$base_path;?>" name='base_path' id='base_path' class='base_path'> 
<input type='hidden' value='<?=$base_path_img;?>' name='base_path_img' id="base_path_img" class='base_path_img'> 

<div id="modal-logo-empresa" class="modal fade">  
<div class="modal-dialog modal-lg">
  <div class="modal-content">      
      <!--*************************** Header modal *********************************-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Logo de la empresa </h4>
      </div>            
      <!--***************************End Header modal *********************************-->
      <div class="modal-body">                  


        <div class='response_img' id='response_img'></div>
        <div class='row'>
              <div class='lista-imagene' id='lista-imagene'></div>
        </div>
                
        <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post"  enctype="multipart/form-data" id='formulario-logo' >
            <div class="form-group">
            Logo de la empresa :<input type="file" name="imageempresa[]"  id="imgs-empresa">
            <input type='hidden' name="e" value='1'>
            </div>                      
        </form>




        
        
      </div><!--*********************Termina body modal ******************* -->             


      <!--Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>
</div>


<script type="text/javascript" src="<?=base_url('application/js/Organizacion/img.js')?>"></script>
<style type="text/css">
.pais_empresa_input{
  display: none;
}
</style>