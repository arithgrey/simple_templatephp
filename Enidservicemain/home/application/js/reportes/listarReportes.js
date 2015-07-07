$(document).on("ready", function(){

  
  $("footer").ready(list_metrics_general);

});

  
 function list_metrics_general(){

      url = now + "index.php/api/listarreportesrest/listmetricsgeneral/format/json";  
      $.get( url ).done(function(newdata) {

           var data = google.visualization.arrayToDataTable([

                  ["", "", { role: "style" } ],
                  ["", 0 , "#043544"]
                            
            ]);

             for(var x in newdata){                      

                  data.addRow([ newdata[x].Total  , parseInt(newdata[x].valor)   , "#043544"]);
             }

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
            
            var chart = new google.visualization.BarChart(document.getElementById("metricas-reporte"));
            chart.draw(view, options);      
      }).fail(function() {
          
          alert( genericresponse[2] );

      });


 } 







 function listarReporte(){

    url = now + "index.php/api/listarreportesrest/listarReportes/format/json";

    $.get( url )
        .done(function( data ) {




        listar = "";

                            
        for(var i in data){

            
            idreporte = data[i].idreportesystema;
            nombre = data[i].reporte;
            descripcion = data[i].descripcionreporte;
            fecha = data[i].fecha_registro;
            tipo = data[i].tiporeporte;
            status_repo =  data[i].status_repo;

            listar += "<tr><td class=''>"+idreporte+"</td>";
            listar += "<td class='blue-col-enid'>"+nombre+"</td>";
            listar += "<td>"+descripcion+"</td>";
            listar += "<td>"+status_repo+"</td>";
            listar += "<td>"+tipo+"</td>";
            listar += "<td>"+fecha+"</td></tr>";

        };
        listar+="";
        llenaelementoHTML("#data-reportes-siste" , listar);
        

    })
    .fail(function() {
        alert( "error" );
    });
 }






 