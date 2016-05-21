<script type="text/javascript">
$(function(){
    $('nav, .nav-controller').on('click', function(event) {
        $('nav').toggleClass('focus');
    });

    $('nav, .nav-controller').on('mouseover', function(event) {
        $('nav').addClass('focus');
        $('.controller-open').hide();
        $('.controller-close').show();


    }).on('mouseout', function(event) {
        $('nav').removeClass('focus');
        $('.controller-open').show();
        $('.controller-close').hide();
    })
})
</script>

<style type="text/css">

.img-slider-admin{

    width: 100%;
    height: 350px;
}

.nav-controller {
    position: fixed;
    top: 45px;
    right: 65px;
    padding: 5px 6px 1px;
    border: 5px solid rgb(51, 51, 51);
    color: rgb(51, 51, 51);
    border-radius: 25px;
    font-size: 12pt;
    cursor: pointer;
    z-index: 300;
}

/**/
nav {
  position: fixed;
  top: 0px;
  right: -100%;
  padding-top: 65px;
  padding-bottom: 15px;
  height: 100%;
  max-width: 400px;
  text-align: right;
  background-color: rgb(255, 255, 255);
  box-shadow: -3px 0px 3px 0px rgba(160, 160, 160, 0.30);
  z-index: 100;    
  overflow: auto;
}

nav.focus {
    right: 0px;
}
nav > ul {
    list-style: none;
}
nav > ul > li > a:hover {
    font-size: 1.1em;
    font-weight: 700;
    color: rgb(51, 51, 51);
    text-decoration: none;
}
</style>

<nav class="animate" style='background:#052E3A;'>
    <p style='background:#09AFDF; padding:50px; color:white; font-size:1.1em;'>
      <strong>
        Otros escenarios del evento
      </strong>
    </p>
    <div class="divider">
    </div>
    <div style='background:white; padding:10px;'>        
        <div class="comments-list">
            <?=$otros_escenarios;?>               
        </div>
    </div>        
</nav>

<div class="nav-controller img-down">
    <span class="fa  fa-angle-double-left  controller-open">
    </span>
    <span  style='display:none;' class="fa fa-angle-double-right   controller-close">
    </span>
</div>
<div>          
  <ul class="nav nav-pills" role="tablist">

    <li class="active">
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/nuevo')?>/<?=$data_escenario["idevento"]?>">
        <i class='fa fa-star'>
        </i>     
        <?=$nombre_evento?>
      </a>
    </li>    
    <li class='artistas-btn'>
      <a   aria-expanded="false" href="#pill-1" role="tab" data-toggle="tab" title="Top Sellers">
        <i class=" icon-up-1">
        </i> 
        Escenario
      </a>
    </li>
    <li class='artistas-btn'>
      <a   aria-expanded="false" href="#pill-3" role="tab" data-toggle="tab" title="Top Sellers">
        <i class=" icon-up-1">
        </i> 
        Artistas 
      </a>
    </li>
    <!---->
    <li>    
      <a href="<?=base_url('index.php/escenario/inevento')?>/<?=$id_escenario;?>/<?=$data_escenario["idevento"]?>" >
        <i class=" icon-up-1">
        </i> 
        Ver como el público
      </a>
    </li>
  </ul>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
      <?=$this->load->view("escenarios/config_escenario");?>
    </div>
    <div class="tab-pane" id="pill-3">
        <?=$this->load->view("escenarios/config_artistas");?>
    </div>    
  </div>            
</div>





<!--Cargamos los modal de configuración ***********-->
    <?=$this->load->view("escenarios/modal/escenario_avanzado")?>
<!--Terminamos de cargar los modal de configuración ***********-->

<input type='hidden' name='evento' id='evento' class='evento' value="<?=$data_escenario['idevento'];?>"> 
<input type='hidden' name='nombre_evento' id='nombre_evento' value="<?=$nombre_evento?>"> 
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$data_escenario['idescenario'];?>">
<!---->
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>
<!---->
<link href="<?=base_url('application/views/principal/dropzone.css')?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<!--pickers css-->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->
<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/img.js')?>"></script>
<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>

<script type="text/javascript">     
    
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })

    $('#artista').keyup(function (e){ 

        Stringentrante = $(this).val();         
        
        buscarartista(Stringentrante);
    });

    function buscarartista(Stringentrante){        
        SC.initialize({
            lient_id: '1ce2bf4dcd83ee01f111219905b4f943'
        });
         
        SC.get('/tracks', { q: Stringentrante }, function(tracks) {                        
                newcontenidodatalist ="";                
                   for(var x in tracks ) {
                    /*Genero del artista*/
                    genre =  tracks[x]["genre"];
                    username = tracks[x]["user"].username;
                    avatar_url =  tracks[x]["user"].avatar_url;
                    uri =   tracks[x]["user"].uri;
                    id = tracks[x]["id"].id;
                        newcontenidodatalist += "<option value='"+ username  +"'>" ;                        
                   }                   
                   document.getElementById('dinamic-artistas').innerHTML= newcontenidodatalist;                
        });    
    }
</script>    




<style type="text/css">
.nombre-escenario-text:hover, .descripcion-escenario-text:hover {
    cursor: pointer;
    padding: 2px;
}.section-descripcion-escenario-in, .section-nombre-evento-in {
    display: none;
}#img-button-more-imgs:hover{
    cursor: pointer;
    font-size: 1.1em;    
}.section-fecha-type{
    background: #062735;
}.section-input{
    display: none;
}.nombre-escenario-text{
    color:  black;
}.title_main{
    display: none;
}.alert-ok-sm , .alert-fail-sm , .alert-ok , .alert-fail {
    display: none;
}.artistas-inputs:hover{
    cursor: pointer;
}.img-artista-evento{
    width: 150px; 
    height:150px;
}.img-artista-evento:hover{
    cursor: pointer;
}
.container{background-color:#f8f8f8;}
.watch-card{margin-top:50px;margin-bottom:50px;}
.watch-card > div{max-width:300px;}
.watch-card:hover .artist-title a, .watch-card:hover .listing-tab .tab-content ul li a{color:#167ac9;}
.listing-tab .tab-content ul li:hover{cursor:pointer;text-decoration:underline;}
.artist-title{padding:15px;background:#fff;}
.artist-title a{test-decoration:none;font-size:21px;font-family:arial, san-serif; color:#555;}
.artist-title a:hover{color:#16a3de;}
.artist-collage img{max-width:100%;}
.artist-collage{position:relative;max-height:150px;overflow:hidden;}
.artist-collage,.artist-collage div{padding:0;}
span.play-mix {
    position: absolute;
    top: 38%;
    z-index: 9;
    left: 30%;
    border: 3px solid rgba(255,255,255,.25);
}
span.btn.play-mix-btn {
    background-color: #000;
    padding: 5px 12px;
    border:none;
    border-radius: 2px;
    box-shadow:0 0 70px rgba(255,255,255,.5);
}
.collage-rhs img{margin-top:-5px;}
span.play-mix-btn:hover {
    box-shadow: 0 0 80px rgba(255,255,255,.9);
}
.listing-tab{
    padding:0;    
}.related-artist .artist-next{padding-left:0;}
.related-artist .col-md-12{padding-right:0;}
.play-mix-btn span {
    color: #1775bc;
}
.related-artist img{width:100%;}
.related-artist h3 {
    font-size: 17px;
    margin-left: 15px;
    margin-top: 9px;
}.related-artist{overflow:hidden;padding-bottom:10px;}
.listing-tab .tab-content ul{padding:0;margin:0;}
.listing-tab .tab-content ul li {
    list-style-type: none;
    border-bottom: 1px solid #eee;
    padding: 8px;
}.listing-tab .tab-content ul li {
    list-style-type: none;
    border-bottom: 1px solid #eee;
    padding: 8px;
    padding-left: 20px;
    font-size: 13px;
    color: #666;
}.listing-tab .tab-content ul li a{text-decoration:none; color:#666;}
.listing-tab .tab-content ul li span{display:inline-block;float:right;padding-right:10px;}
.listing-tab .nav-tabs>li,.nav-tabs>li a:hover{margin-bottom:0;background:none;}
.listing-tab .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{border:none;background:none;}
.listing-tab .nav-tabs>li>a:hover{border-color:none;color:red;}
.listing-tab .nav-tabs>li>a{border:0;padding:17px 0 7px;color:#333;margin-left:15px;}
.listing-tab .nav-tabs>li.active>a{border-bottom:2px solid #bb0000;color:#000;}
.listing-tab{background-color:#fff;}



</style>











<style type="text/css">
.descripcion-nota-section{
    -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
    -webkit-transition:all ease .8s ;
    background: black;
    color: white;
    filter: alpha(opacity=0); /*Opacidad Para IE */
    left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
    opacity: 0; /*Inicialmente transparente */
    padding: 5px;
    position: absolute; /*Info sobre la imagen*/
    top: 5%;
    transition:all ease .8s;
    zoom: 1;
}
.nota-articulo:hover .descripcion-nota-section{
    filter: alpha(opacity=80);
    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
}
.section-header-title{
    display: none;
}
</style>
<?=ini_set('display_errors', '1');?>


