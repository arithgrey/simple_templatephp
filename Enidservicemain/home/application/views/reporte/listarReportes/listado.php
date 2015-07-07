<script type="text/javascript" src="<?=base_url('application/js/reportes/listarReportes.js')?>"></script>            
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    //google.setOnLoadCallback(drawChart);
</script>


<div class="container-fluid">   
  <div class='row-fluid'>


                <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
                  <div id="metricas-reporte"></div>
                </div>                  

          

                <section class='col-xs-12  col-sm-12  col-md-12 col-lg-12 centered'>
                    <table id='dynamic-table' class="display table table-bordered table-striped dataTable dynamic-table-enid">
                        <thead class="enid-header-table">                    
                            <tr>
                                <th> ID </th>
                                <th>Reporte</th>
                                <th>Observaciones</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Registrado</th>                                
                            </tr>
                        </thead>                      
                            <?=getListrepo($list_repo_system);?>                          
                    </table>       
                </section>    

                
              
  </div>               
</div>   



