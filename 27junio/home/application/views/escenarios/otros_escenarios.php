<div class="nav-controller img-down">
    <span class="fa  fa-angle-double-left  controller-open"  >
    </span>
    <span class="fa fa-angle-double-right controller-close" >
    </span>
</div>
<nav class="animate seccion_escenarios"  >
    <h1 class='title_o_escenarios'>
      Escenarios del evento
    </h1>  
    <div class='panel'>            
        <?=$otros_escenarios;?>                                          
    </div> 
    <div >
      <span class='nuevo_escenario_text'  data-toggle="modal" data-target="#modal-nuevo-escenario-evento" >
        Cargar nuevo escenario
      </span>                          
    </div>  
    
</nav>

<style type="text/css">
  .img-slider-admin{
      width: 100%;
      height: 350px;
  }
  .nav-controller{
      position: fixed;
      top:65px;
      right: 65px;
      padding: 5px 6px 1px;
      border: 5px solid #428BCA;
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
  .img_sm_enid{
      width: 100px;    
  }
  .seccion_descripcion{
    width: 82%;
    margin: 0 auto;
  }
  .p-escenario-enid{

      font-size: .8em;
      background: #193746;
      color: white;    
      margin: initial;
  }
  .footer_escenarios{
      font-size: .8em;
  }
  .controller-close{
    display: none;
    color:#428BCA;
  }
  .p_otros_escenarios{  
    padding:10px;   
    background: #f5f5f5;
    border-radius: 1px;
  }
  .otros_escenarios2{   
    height: 300px;
    overflow-x: hidden;
    overflow-y: scroll; 
  }
  .otros_escenarios3{   
    height: 320px;
    overflow-x: hidden;
    overflow-y: scroll; 
  }
  .experiencia_esc{
    background: #E31F56;
    color: white;
    padding: 4px;
  }
  .section_e{
     
      padding: 2px;
  }
  .nombre_escenario_otros{  
    text-decoration: none;
    font-size: 1.2em;
    color: #da4c14;
  }
 
  .contenido_escenario{

    background: #f5f5f5;
    width: 98%;
    margin: 0 auto;
    border-radius: 1px;
  }
  .seccion_escenarios{   
    background: #377696;
    border-top-left-radius: 10px;
  }
  .confi_now_escenario{
    color: blue;
  }
  .config_now_escenario{
    color: white;
    background: #0f96cb;
    padding: 1px;
    border-radius: 1px;
  }.nuevo_escenario_text{
    color: white;
    font-size: .95em;
    margin-right: 25px;
    background: rgb(62, 178, 192);
    padding: 10px;
  }
  .nuevo_escenario_text:hover{
    cursor: pointer;
  }.title_o_escenarios{
 
    color: white;
    font-size: 2em;
    text-align: center;  
    margin-top: -40px;
    margin-bottom: 15px;

  }
</style>





                                
                            
 