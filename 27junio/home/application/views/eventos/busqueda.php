<!--Búsqueda -->
<div class='container' style='margin-top:-50px;'>
  <!--Sección Izquierda-->
  <div class='col-lg-8  col-md-8 col-sm-12'>    
    <div style="background:#253E44;"  >
      <div class='row'>     
        <div class='col-lg-5'>
            <div class="jumbotron" >
                    <strong>
                        <h1 class='titulo-pagina-busqueda'>
                          Encuentra <br>
                          los mejores eventos .!
                        </h1>
                    </strong>    
            </div>
        </div>
        <form class='busqueda-general-form'  id='busqueda-general-form' method="POST" >
        <div class='col-lg-3' style='margin-top:100px;'>
            <div class="date-picker"  data-date="2014-02-03">
                <div class="date-container">
                    <h4 class="date">
                        <span data-toggle="datepicker" data-method="subtract" data-type="d" class="fa fa-angle-left" style='color:white;'>
                        </span>
                        <span class="text">
                          17th
                        </span>
                        <span data-toggle="datepicker" data-method="add" data-type="d" class="fa fa-angle-right" style='color:white;'>
                        </span>
                    </h4>
                    <h3 class="month">
                        <span data-toggle="datepicker" data-method="subtract" data-type="M" class="fa fa-angle-left" style='color:white;'>
                        </span>
                        <span class="text">
                          December
                        </span>
                        <span data-toggle="datepicker" data-method="add" data-type="M" class="fa fa-angle-right" style='color:white;'>
                        </span>
                    </h3>
                    <h4 class="year">
                        <span data-toggle="datepicker" data-method="subtract" data-type="y" class="fa fa-angle-left" style='color:white;'>
                        </span>
                        <span class="text">
                          2014
                        </span>
                        <span data-toggle="datepicker" data-method="add" data-type="y" class="fa fa-angle-right" style='color:white;'>
                        </span>
                    </h4>
                </div>
            </div>
            <input type="hidden" id="dateinput" name="fecha_evento">
        </div>


        <div class='col-lg-4'  style='margin-top:150px;'>
          <div class="search pull-right">               
            <input type="text" class="form-control input-sm"  name='palabra_clave' id='palabra_clave' placeholder="Palabra clave" />
            <button type="submit" class="btn btn-primary btn-sm">
                    Busqueda
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class='panel'>

      <div class='row'>
        <div class='query-test' id="query-test"></div>
      </div>
      <div class='events'>
      </div>
    </div>
  </div>
  <!--Sección derecha -->
  <div>
  </div>
</div>



<div class="container">
            <ul class="pagination">
              <li class="disabled">
                <a href="#">«</a>
              </li>
              <li class="active">
                <a href="#">1 <span class="sr-only">(current)</span></a>
              </li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
            </ul>
</div>























<style type="text/css">
.titulo-pagina-busqueda{
    font-size:  1.5em !important;            
    color: white !important;
}
.text{
  color: white;
}
.sub-titulo-busqueda{
    margin-left: 10px;
}
.search-form .form-group {
  float: right !important;
  transition: all 0.35s, border-radius 0s;
  width: 32px;
  height: 32px;
  background-color: #fff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
  border-radius: 25px;
  border: 1px solid #ccc;
}
.search-form .form-group input.form-control {
  padding-right: 20px;
  border: 0 none;
  background: transparent;
  box-shadow: none;
  display:block;
}
.search-form .form-group input.form-control::-webkit-input-placeholder {
  display: none;
}
.search-form .form-group input.form-control:-moz-placeholder {
  /* Firefox 18- */
  display: none;
}
.search-form .form-group input.form-control::-moz-placeholder {
  /* Firefox 19+ */
  display: none;
}
.search-form .form-group input.form-control:-ms-input-placeholder {
  display: none;
}
.search-form .form-group:hover,
.search-form .form-group.hover {
  width: 100%;
  border-radius: 4px 25px 25px 4px;
}
.search-form .form-group span.form-control-feedback {
  position: absolute;
  top: -1px;
  right: -2px;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  color: #3596e0;
  left: initial;
  font-size: 14px;
}
.notification-menu .info-number{
    display: none;
}

</style>
<script type="text/javascript" src="<?=base_url('application/js/busquedas/eventos.js')?>"></script>













<style type="text/css">
.search {
    padding: 5px 0;
    width: 230px;
    height: 30px;
    position: relative;
    left: 10px;
    float: left;
    line-height: 22px;
}            
.btn {
    height: 30px;
    position: absolute;
    right: 0;
    top: 5px;
    border-radius:1px;
}
.date-container{
    text-align: center;
}
.date-picker span.fa {
    position: absolute;
    cursor: pointer;
}
.date-picker span.fa[data-method="subtract"] {
    left: 0px;
}
.date-picker span.fa[data-method="add"] {
    right: 0px;
}

</style>

<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<!--pickers initialization-->
<script type="text/javascript" src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
