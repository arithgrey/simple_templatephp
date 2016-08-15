<div class='separate-enid'>
</div>
<div > 
    <div id="blue">
        <div class="col-md-12 ">
            <div class="panel panel-primary coupon">
              <div class="panel-heading" id="head">
                <div class="panel-title" id="title">                    
                    <span  class="hidden-xs">
                        <a class='link_next' href="<?=base_url('index.php/eventos/accesosalevento')?>/<?=$param['id_evento']?> ">
                            Consigue tus accesos.!
                        </a>
                    </span>
                    <span class="visible-xs">
                        <a class='link_next' href="<?=base_url('index.php/eventos/accesosalevento')?>/<?=$param['id_evento']?> ">
                            Consigue tus accesos.!
                        </a>
                    </span>
                </div>
              </div>
              <div class="panel-body">
                <img src="http://i.imgur.com/e07tg8R.png" class="coupon-img img-rounded">
                <div class="col-md-9">                           
                    <?=construye_resumen_artista($resumen_artistas , $param["in_session"])?>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-12">                   
                    <?=construye_resumen_politicas_restricciones($param["politicas"] , $param["restricciones"] , $param["in_session"] );?>
                </div>
              </div>
              <div class="panel-footer">
                <span class='text_reglas'>
                    <a title='Información del evento ' class='mas_del_evento' href="<?=base_url('index.php/eventos/accesosalevento/')?>/<?=$param['id_evento']?>">
                        + Del evento
                    </a>
                </span>  
              </div>
              
            </div>
        </div>
    </div>
    
    
</div>
<style type="text/css">
.coupon {
    border: 3px dashed #bcbcbc;
    border-radius: 10px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", 
    "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
    font-weight: 300;
}
.coupon #head {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    min-height: 56px;
}

.coupon #footer {
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

#title .visible-xs {
    font-size: 12px;
}

.coupon #title img {
    font-size: 30px;
    height: 30px;
    /*margin-top: 5px;*/
}

@media screen and (max-width: 500px) {
    .coupon #title img {
        height: 15px;
    }
}

.coupon #title span {
    float: right;
    /*margin-top: 5px;*/
    font-weight: 700;
    text-transform: uppercase;
}

.coupon-img {
    width: 100%;
    /*margin-bottom: 15px;*/
    padding: 0;
}

.items {
    margin: 15px 0;
}

.usd, .cents {
    font-size: 20px;
}

.number {
    font-size: 40px;
    font-weight: 700;
}

sup {
    top: -15px;
}

#business-info ul {
    /*margin: 0;*/
    padding: 0;
    list-style-type: none;
    text-align: center;
}

#business-info ul li { 
    display: inline;
    text-align: center;
}

#business-info ul li span {
    text-decoration: none;
    padding: .2em 1em;
}

#business-info ul li span i {
    padding-right: 5px;
}

.disclosure {
    padding-top: 15px;
    font-size: 11px;
    color: #bcbcbc;
    text-align: center;
}

.coupon-code {
    color: #333333;
    font-size: 11px;
}

.exp {
    color: #f34235;
}

.print {
    font-size: 14px;
    float: right;
}

.link_next{
    text-decoration: none;
    color: white;
}
.link_next:hover{
    text-decoration: none;
    color: white;   
}
.text_reglas{
    font-size: .9em;
}

.mas_del_evento{
    color: #E31F56;
}
/*-------------------------------------------------------------*/
</style>

