<style type="text/css">
.seccion_tipo_evento{
  display: none;
}.seccion_precios_evento{
  display: none;
}
</style>


<div class='bloque'>
  <div  class='col-lg-2 col-md-2 col-sm-12'>

    <div >
            <div class="panel">
                <div class="panel-body">
                    <input type="text" placeholder="Search Blog" class="form-control blog-search">
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <h3>Latest Blog Post</h3>
                        <div class="media">
                            <a href="javascript:;" class="pull-left">
                                <img alt="" src="images/blog/blog-thumb-1.jpg" class=" ">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="javascript:;">02 May 2013 </a></h5>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus amet int
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <a href="javascript:;" class="pull-left">
                                <img alt="" src="images/blog/blog-thumb-2.jpg" class=" ">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="javascript:;">02 May 2013 </a></h5>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus amet int
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <a href="javascript:;" class="pull-left">
                                <img alt="" src="images/blog/blog-thumb-3.jpg" class=" ">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="javascript:;">02 May 2013 </a></h5>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus amet int
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <h3>recent comments</h3>
                        <ul>
                            <li><a href="javascript:;"><i class="  fa fa-comments-o"></i> admin on Vestiblulum quis dolor </a></li>
                            <li><a href="javascript:;"><i class="  fa fa-comments-o"></i> admin on Nam sed arcu tellus</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-comments-o"></i> monster002 on Fringilla ut vel ipsum </a></li>
                            <li><a href="javascript:;"><i class="  fa fa-comments-o"></i> admin on Vestiblulum quis dolor sit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <h3>category</h3>
                        <ul>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Animals</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Landscape</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Portait</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Wild Life</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Video</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <h3>blog archive</h3>
                        <ul>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> May 2013</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> April 2013</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> March 2013</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> February 2013</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> January 2013</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




  </div>  
  <div class='seccion-izquierda'>
  <!--SECCIÓN IZQUIERDA-->
    <div  class='col-lg-6 col-md-6 col-sm-12'>
        <div>
          <div class="row">
            <form class='form-busqueda' action='<?=base_url("index.php/api/busqueda/eventos_enid/format/json")?>'>
              <div>
                  <div class="input-group">
                      <div class="input-group-btn search-panel">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept" >
                              Filtrar por nombre 
                            </span> 
                            <span class="caret">
                            </span>
                          </button>
                          <ul class="dropdown-menu" role="menu">                        
                            <li>
                              <a class='filtro' id='1'>
                                Nombre del evento 
                              </a>
                            </li>
                            <li>
                              <a class='filtro' id='2'>
                                Genero Musical
                              </a>
                            </li>
                            <li>
                              <a class='filtro' id='3' >
                                Artista
                              </a>
                            </li>
                            <li>
                              <a class='filtro' id='4'>
                                Locación
                              </a>
                            </li>
                            <li>
                              <a class='filtro' id='5'>
                                Tipo evento
                              </a>
                            </li>                        
                            <li>
                              <a class='filtro' id='6'>
                                Precio
                              </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                              <a class='filtro' id='0' >
                                Todo 
                              </a>
                            </li>
                          </ul>
                      </div> 
                      <div class='seccion_tipo_evento' >
                        <?=select_tipo_eventos("qtipo" , "form-control qtipo" , "qtipo")?>                 
                      </div>
                      <div class='seccion_precios_evento'>
                        <?=construye_precios($precios_diponibles , "precio_evento" )?>
                      </div>
                      <input type="text" class="form-control q" id="q" name="q" placeholder="Artista , Genero musical , tipo ... ">                  
                      <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">
                            <i class='fa fa-search'></i>
                          </button>
                      </span>                  
                  </div>
              </div>
            </form>  
        </div>
      </div>
      <div class='separate-enid'></div>
      <div class='separate-enid'></div>
      <div class='place_eventos'>
      </div>
      <div class='eventos'>
      </div>
    </div>
  </div>
  <!--SECCIÓN IZQUIERDA TERMINA-->
  <!--SECCIÓN DERECHA-->
  <div class='col-lg-4 col-md-4 col-sm-12 seccion_derecha'>
    <?=$this->load->view('busqueda/seccion_extra')?>

                                


  </div>
</div>






























<!--SECCIÓN DERECHA TERMINA-->
<script type="text/javascript" src="<?=base_url('application/js/busquedas/eventos.js')?>"></script>





<style type="text/css">
.filtro:hover{
  cursor: pointer;
}
.bloque{

}
.busqueda_eventos_icon{
  display: none !important;
}
.vive-la-experiencia-pass{
  margin-right: 2%;
  background: #E31F56;
  padding: 3% 1%;
  color: white;
}
.vive-la-experiencia-pass:hover{
    cursor: pointer;        
    background: #046188;
    font-size: .9em;
    color: white;
}
.titulo-tw{
    
    margin-right: 3%;
    padding: 2px 4px;
    font-size: 90%;
    color: #fff;
    background-color: #166781;
    border-radius: 3px;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
}
.slogan-enid{
  font-size: 5em;
  font-weight: bold;
}



.sticky-left-side {
    position: fixed;
    height: 100%;
  
    z-index: 100;
  }

</style>

