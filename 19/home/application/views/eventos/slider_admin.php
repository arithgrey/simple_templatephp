
  <div class='response_img_portada' id='response_img_portada'>
  </div>

    <div class='row'>
      <h2>
        Imganes del evento
      </h2>
      <div id="myCarousel" class="vertical-slider carousel vertical slide col-md-12" data-ride="carousel">
        <div class="row">
            <div class="col-md-4">
                <span data-slide="next" class="btn-vertical-slider fa fa-angle-double-up " style="font-size: 30px">
                </span>  
            </div>
            <div class="col-md-8"> 
            </div>
        </div>        
        <div class='section-ev'>                                    
            <?=$slider_principal_evento;?>            
        </div>
        <div class="row">
          <div class="col-md-4">
              <span data-slide="prev" class="btn-vertical-slider  fa fa-angle-double-down" style="color: Black; font-size: 30px">
              </span>
          </div>
          <div class="col-md-8">
          </div>
        </div>

      </div>
      <div class='row'>
        <strong title='Cargar imagenes del evento' id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-evento-section"  >
          <i class="fa fa-plus-circle fa-3x">
          </i>                                                              
        </strong>
      </div>
      <input type='hidden' name='action' value="carga-imgenes-escenario">       
    </div>  



<style type="text/css">
  .btn-vertical-slider{ margin-left:35px; cursor:pointer;}
  a {  cursor:pointer;}
  .carousel.vertical .carousel-inner .item {
            transition: 0.6s ease-in-out top;
         -o-transition: 0.6s ease-in-out top;
        -ms-transition: 0.6s ease-in-out top;
       -moz-transition: 0.6s ease-in-out top;
    -webkit-transition: 0.6s ease-in-out top;
  }
  .carousel.vertical .active {
    top: 0;
  }
  .carousel.vertical .next {
    top: 100%;
  }
  .carousel.vertical .prev {
    top: -100%;
  }
  .carousel.vertical .next.left,
  .carousel.vertical .prev.right {
    top: 0;
  }
  .carousel.vertical .active.left {
    top: -100%;
  }
  .carousel.vertical .active.right {
    top: 100%;
  }
  .carousel.vertical .item {
      left: 0;
  }​
</style>




