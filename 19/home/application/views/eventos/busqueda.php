<section class="panel">
                        <header class="panel-heading">
                            Media Manager
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">

                            <ul id="filters" class="media-filter">
                                <li><a href="#" data-filter="*"> All</a></li>
                                <li><a href="#" data-filter=".images">Images</a></li>
                                <li><a href="#" data-filter=".audio">Audio</a></li>
                                <li><a href="#" data-filter=".video">Video</a></li>
                                <li><a href="#" data-filter=".documents">Documents</a></li>
                            </ul>

                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i> Select all</button>
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-folder-open"></i> Add New</button>
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-trash-o"></i> Delete</button>
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Upload New File</button>
                            </div>



                            <div id="gallery" class="media-gal">
                                <div class="images item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image1.jpg" alt="" />
                                    </a>
                                    <p>img01.jpg </p>
                                </div>

                                <div class=" audio item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image2.jpg" alt="" />
                                    </a>
                                    <p>img02.jpg </p>
                                </div>

                                <div class=" video item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image3.jpg" alt="" />
                                    </a>
                                    <p>img03.jpg </p>
                                </div>

                                <div class=" images audio item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image4.jpg" alt="" />
                                    </a>
                                    <p>img04.jpg </p>
                                </div>

                                <div class=" images documents item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image5.jpg" alt="" />
                                    </a>
                                    <p>img05.jpg </p>
                                </div>

                                <div class=" audio item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image1.jpg" alt="" />
                                    </a>
                                    <p>img01.jpg </p>
                                </div>

                                <div class=" documents item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image2.jpg" alt="" />
                                    </a>
                                    <p>img02.jpg </p>
                                </div>
                                <div class=" video item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image3.jpg" alt="" />
                                    </a>
                                    <p>img03.jpg </p>
                                </div>

                                <div class=" images item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image4.jpg" alt="" />
                                    </a>
                                    <p>img04.jpg </p>
                                </div>

                                <div class=" documents item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image5.jpg" alt="" />
                                    </a>
                                    <p>img05.jpg </p>
                                </div>

                                <div class=" video item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image1.jpg" alt="" />
                                    </a>
                                    <p>img01.jpg </p>
                                </div>

                                <div class=" audio images item " >
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="images/gallery/image2.jpg" alt="" />
                                    </a>
                                    <p>img02.jpg </p>
                                </div>

                            </div>

                            <div class="col-md-12 text-center clearfix">
                                <ul class="pagination">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Media Gallery</h4>
                                        </div>

                                        <div class="modal-body row">

                                            <div class="col-md-5 img-modal">
                                                <img src="images/gallery/image1.jpg" alt="">
                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit Image</a>
                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> View Full Size</a>

                                                <p class="mtop10"><strong>File Name:</strong> img01.jpg</p>
                                                <p><strong>File Type:</strong> jpg</p>
                                                <p><strong>Resolution:</strong> 300x200</p>
                                                <p><strong>Uploaded By:</strong> <a href="#">ThemeBucket</a></p>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label> Name</label>
                                                    <input id="name" value="img01.jpg" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label> Tittle Text</label>
                                                    <input id="title" value="awesome image" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label> Description</label>
                                                    <textarea rows="2" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label> Link URL</label>
                                                    <input id="link" value="images/gallery/img01.jpg" class="form-control">
                                                </div>
                                                <div class="pull-right">
                                                    <button class="btn btn-danger btn-sm" type="button">Delete</button>
                                                    <button class="btn btn-success btn-sm" type="button">Save changes</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- modal -->

                        </div>
                    </section>

































<div class='container'>    
    <div class="panel" >
        <div class="panel-body">
            <div class="profile-desk">                                         
            <h1>Encuentra tu evento</h1>    
            <!--*************Parámetros de busqueda ********************* -->                                    
            <form class='busqueda-general-form' id='busqueda-general-form' >
                <div class='col-lg-5 col-md-6 col-sm-5'>
                    <span  class="control-span">
                        Evento /Artista /Genero musical /Lugar
                    </span>
                    <input name='palabra_clave' class='palabra_clave form-control input-sm' id="palabra_clave" placeholder='Palabra que identificar al evento, artista o genero musical' >
                </div>
                <div class='col-lg-5 col-md-6 col-sm-5'>
                    <span class="control-span">
                        Cuando
                    </span>
                    <select class="form-control input-sm" id="busqueda-cuando" name="cuando">
                        <option value="Cualquiera">
                            Cualquiera
                        </option>
                        <option value="0">
                            El día de hoy
                        </option>
                        <option value="mas_uno">
                            El día de mañana
                        </option>                        
                        <option value="semana">
                            De la semana
                        </option>
                        <option value="mes">
                            Del Mes 
                        </option>       
                        <option value="Del próximo mes">
                            Más
                        </option>                                                
                    </select>
                </div>                            
                <div class='text-center'>
                    <br>
                    <button type="submit" id="busqueda_event"  class='btn btn btn_nnuevo pull-right'>                
                            Buscar                
                    </button>
                </div> 
            </form>                                                         
            <!--*************************Busqueda general Termina **********************************-->                 
            </div>
        </div>
    </div>
</div>




<div class='eventos-encontrados' id='eventos-encontrados'>    
    
    <!--
        Test de la consulta mysql  en la búsqueda
        <div class='container'>        
            <div id='query-test' > 
            </div>
        </div>
    -->
    <div class='container'>
        <div id='events' class='events'> 
        </div>
    </div>
</div>




<style type="text/css">
    .parametros_busqueda{
        background: #208CC1;
        //background: #45A4B3;
        //background: #1693a5;
        //background: #1B3438 none repeat scroll 0% 0%;
        background: #0C2C2F none repeat scroll 0% 0%;
        color: white;
    }
    .th_table{
        background:#141414;
    }
    #busqueda_event{
        background: #FCF8E3;
        color: black;
    }
    .title_main{
        display: none;
    }
    .input-busqueda{
        height: 30px!important;
    }
    .section-header-title{
        display: none;
    }
    .slogan_section{
        background: #09afdf;
        padding: 5px;
        color: white;
    }
</style>
<script type="text/javascript" src="<?=base_url('application/js/busquedas/eventos.js')?>"></script>









































































<style type="text/css">
  .section-description-empresa, #nombre-empresa-section, 
  .section-mision-empresa,.section-vision-empresa, #años-section,
   #section-mas-info , #reponse-exp , .reponse-exp , .slogan-edit-section {
    display: none;
  }
  
  .description-empresa-text:hover, .nombre-empresa-text:hover .misions-empresa-text:hover, .vision-empresa-text:hover, .mas-info-empresa-text:hover, .años-empresa-text:hover , .slogan-text:hover , #artistas-empresa-text:hover, #mision-empresa-text:hover{
    padding: 1px;
    cursor: pointer;    
  }
  #nombre-empresa-text:hover{
    cursor: pointer;
    padding: 5px;
  }
  #principal-contenido-historia:hover{
    cursor: pointer;
    padding: 100px;
  }
  .section-header-title{
    display: none;
  }
</style>







<style type="text/css">
      
  .animate {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }
  .info-card {
    width: 100%;
    border: 1px solid rgb(215, 215, 215);
    position: relative;
    font-family: 'Lato', sans-serif;
    margin-bottom: 20px;
    overflow: hidden;
  }
  .info-card > img {
    width: 100px;
    margin-bottom: 60px;
  }
  .info-card .info-card-details,
  .info-card .info-card-details .info-card-header  {
    width: 100%;
    height: 100%;
    position: absolute;
    bottom: -100%;
    left: 0;
    padding: 0 15px;
    background: rgb(255, 255, 255);
    text-align: center;
  }
  .info-card .info-card-details::-webkit-scrollbar {
    width: 8px;
  }
  .info-card .info-card-details::-webkit-scrollbar-button {
    width: 8px;
    height: 0px;
  }
  .info-card .info-card-details::-webkit-scrollbar-track {
    background: transparent;
  }
  .info-card .info-card-details::-webkit-scrollbar-thumb {
    background: rgb(160, 160, 160);
  }
  .info-card .info-card-details::-webkit-scrollbar-thumb:hover {
    background: rgb(130, 130, 130);
  }           

  .info-card .info-card-details .info-card-header {
    height: auto;   
    bottom: 100%;
    padding: 10px 5px;
  }
  .info-card:hover .info-card-details {
    bottom: 0px;
    overflow: auto;
    padding-bottom: 25px;
  }
  .info-card:hover .info-card-details .info-card-header {
    position: relative;
    bottom: 0px;
    padding-top: 45px;
    padding-bottom: 25px;
  }
  .info-card .info-card-details .info-card-header h1, 
  .info-card .info-card-details .info-card-header h3 {
    color: rgb(62, 62, 62);
    font-size: 22px;
    font-weight: 900;
    text-transform: uppercase;
    margin: 0 !important;
    padding: 0 !important;
  }
  .info-card .info-card-details .info-card-header h3 {
    color: rgb(142, 182, 52);
    font-size: 15px;
    font-weight: 400;
    margin-top: 5px;
  }
  .info-card .info-card-details .info-card-detail .social {
    list-style: none;
    padding: 0px;
    margin-top: 25px;
    text-align: center;
  }
  .info-card .info-card-details .info-card-detail .social a {
    position: relative;
    display: inline-block;
    min-width: 40px;
    padding: 10px 0px;
    margin: 0px 5px;
    overflow: hidden;
    text-align: center;
    background-color: rgb(215, 215, 215);
    border-radius: 40px;
  }
  a.social-icon {
    text-decoration: none !important;
    box-shadow: 0px 0px 1px rgb(51, 51, 51);
    box-shadow: 0px 0px 1px rgba(51, 51, 51, 0.7);
  }
  a.social-icon:hover {
    color: rgb(255, 255, 255) !important;
  }
  a.facebook {
    color: rgb(59, 90, 154) !important;
  }
  a.facebook:hover {    
    background-color: rgb(59, 90, 154) !important;
  }
  a.twitter {
    color: rgb(45, 168, 225) !important;
  }
  a.twitter:hover {
    background-color: rgb(45, 168, 225) !important;
  }
  a.github {
    color: rgb(51, 51, 51) !important;
  }
  a.github:hover {
    background-color: rgb(51, 51, 51) !important;
  }
  a.google-plus {
    color: rgb(244, 94, 75) !important;
  }
  a.google-plus:hover {
    background-color: rgb(244, 94, 75) !important;
  }
  a.linkedin {
    color: rgb(1, 116, 179) !important;
  }
  a.linkedin:hover {
    background-color: rgb(1, 116, 179) !important;
  }
#lightbox .modal-content {
    display: inline-block;
    text-align: center;   
}

#lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    
    z-index:1032;
}


.slogan-emp:hover .editar-slogan-empresa{
    filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;
}
.nombre-emp:hover .editar-nombre-empresa{
    filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;
}
.img-down{  
  background: #E31F56;
  height: 40px;
  width: 40px;
  -moz-border-radius: 25px;
  border-radius: 25px;
  color:white;

}
.img-down:hover{
  cursor: pointer;
}
.mision-empresa-text:hover .editar-mision-empresa{
  filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;
}
.vision-empresa-text:hover .editar-vision-empresa{
 filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white; 
}
.mas-info-empresa-text:hover .editar-mas-info-empresa{
  filter: alpha(opacity=80);
    opacity: .8;
    font-size: .7em;
    background: #0B9BCB;
    color: white;   
}
.social-fb:hover , 
.social-tw:hover ,
.social-gp:hover, 
.la-historia:hover, 
.tu-artista:hover , 
.social-www:hover{
  cursor: pointer;
  padding: 1px;

}
</style>



<script type="text/javascript">
    $(function() {
        var $container = $('#gallery');
        $container.isotope({
            itemSelector: '.item',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        // filter items when filter link is clicked
        $('#filters a').click(function() {
            var selector = $(this).attr('data-filter');
            $container.isotope({filter: selector});
            return false;
        });
    });
</script>
