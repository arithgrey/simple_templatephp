<style type="text/css">
@import url("http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.panel-image img.panel-image-preview {
    width: 100%;
  border-radius: 4px 4px 0px 0px;
}
.panel-heading ~ .panel-image img.panel-image-preview {
  border-radius: 0px;
}
.panel-image ~ .panel-body, .panel-image.hide-panel-body ~ .panel-body {
  overflow: hidden;
}
.panel-image ~ .panel-footer a {
  padding: 0px 10px;
  font-size: 1.3em;
  color: rgb(100, 100, 100);
}
.panel-image.hide-panel-body ~ .panel-body {
  height: 0px;
  padding: 0px;
}
.tag-enid-galery{
    background: #052E3A !important;
    color: white !important;
}
.text-edit-mensaje-comunidad:hover{
    cursor: pointer;
}
.img-tmp-empresa:hover{
    cursor: pointer;
}
</style>



       
<div class='comunidad-experiencia-imgs' id='comunidad-experiencia-imgs'></div>                            
























<br>
    <div class="row form-group">
        <div class="col-xs-12 col-md-8">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Nuestra comunidad
                    </h3>
                </div>

                <div class="panel-image">
                    <!--<img src="<?=base_url('application/uploads/IMG_20150301_185535361.jpg')?>" class="panel-image-preview" />-->
                    <?=$this->load->view('empresa/iconos_generales')?>
                </div>
                <div class="panel-body">                    
                    <?=edita_section_mensaje_comunidad($data_empresa["mensaje_comunidad"] ,  $in_session  , $class='class="text-edit-mensaje-comunidad" ' )?>                                                                
                    <!--Social  social  -->  
                    <?=get_iconos_sociales($data_empresa["idempresa"]  , $in_session , $data_empresa["facebook"] , $data_empresa["tweeter"] , $data_empresa["gp"] , $data_empresa["www"]);?>                        
                    <!---Termina social-->
                </div>

                
                        
                 
                
            </div>
            <div class="block clearfix">                
                <div class='comentarios-usuarios' id='comentarios-usuarios'></div>                       
            </div>                            
        </div>




        <aside class="col-md-4 ">
                            <div class="sidebar">
                                
                                <div class="block clearfix">
                                    <h3 class="title">Latest tweets</h3>
                                    <div class="separator-2"></div>
                                    <ul class="tweets">
                                        <li>
                                            <i class="fa fa-twitter"></i>
                                            <p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-twitter"></i>
                                            <p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
                                        </li>
                                    </ul>
                                </div>                              
                                <!--
                                <div class="block clearfix">
                                    <h3 class="title">Popular Tags</h3>
                                    <div class="separator-2"></div>
                                    <div class="tags-cloud">
                                        <div class="tag">
                                            <a href="#">energy</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">business</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">food</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">fashion</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">finance</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">culture</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">health</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">sports</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">life style</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">books</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">lorem</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">ipsum</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">responsive</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">style</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">finance</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">sports</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">technology</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">support</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">life style</a>
                                        </div>
                                        <div class="tag">
                                            <a href="#">books</a>
                                        </div>
                                    </div>
                                </div>-->
                                
                            </div>
                        </aside>


    </div>

















<script src="<?=base_url('application/js/js/jquery.isotope.js')?>"></script>

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

