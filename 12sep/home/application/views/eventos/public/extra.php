<div>   
    <div class='col-lg-12 col-md-12 col-sm-12  panel-mas-info-evento'>
        <div >
            <div class='col-lg-12 col-md-12 col-sm-12 resumen-artistas-sm' >
            <?=construye_resumen_artista($resumen_artistas , $param["in_session"])?>
            </div>
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <a class='link_next_accesos' href="<?=base_url('index.php/eventos/accesosalevento')?>/<?=$param['id_evento']?> ">
                    - Consigue tus accesos.!
                </a>    
            </div>      
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <a class='link_next_accesos' href="<?=base_url('index.php/eventos/diaevento/')?>/<?=$param['id_evento']?>">
                    - Las reglas 
                </a>    
            </div> 
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <a href="<?=base_url('index.php/emp/lahistoria')?>/<?=$param["empresa"]?>" class='hist_empresa'>
                    Nuestra historia
                </a>
            </div>
            <div class='col-lg-12 col-md-12 col-sm-12 resumen-artistas-lg'>
                <?=construye_resumen_artista($resumen_artistas , $param["in_session"])?>
                <hr>
            </div>
        </div>
    </div>
</div>
<br>










<style type="text/css">
.link_next_accesos{
    font-weight: bold;
    font-size: 2.5em;
    //color: rgb(6, 51, 73);
    color: white;
    text-decoration: none;
}    
.resumen-artistas-sm{
    display: none;
}
.panel-mas-info-evento{
    background: #020d17;
    padding: 20px;
    color: white;
}
.hist_empresa{
    display: none;
}
</style>

<style type="text/css">

    /*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px){    
        .resumen-artistas-sm{
            display: block;
        }
        .resumen-artistas-lg{
            display: none;
        }
        .hist_empresa{
            display: block;
            background: #00bffe;
            width: 50%;
            float: right;
            padding: 10px;
            color: white;
            font-weight: bold;
        }

    }
</style>