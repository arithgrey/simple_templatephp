<script type="text/javascript" src="<?=base_url('application/js/reportes/listarReportes.js')?>"></script>            



<div class="col-lg-12">   
       <div class=''>
            
                <section id="col-lg-12 col-xs-12">
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
                </select>    
            
        </div>    

        <div class='col-lg-12 col-xs-12'>
            <div id="barchart_values"></div>
        </div>

</div>



<div class='row'>
    
</div>



  <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([

            ["Element", "Density", { role: "style" } ],
            ["Copper", 8.94, "#043544"],
            ["Silver", 10.49, "#043544"],
            ["Gold", 19.30, "#043544"],
            ["Platinum", 21.45, "color: #043544"]
      
      ]);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
                         
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>




