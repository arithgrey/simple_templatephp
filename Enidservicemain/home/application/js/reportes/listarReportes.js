$(document).on("ready", function(){

    //listarReporte();

});

 function listarReporte()
{
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






 function drawStuff() {

            var data = new google.visualization.arrayToDataTable([
              ['Move', 'Percentage'],
              ["King's pawn (e4)", 44],
              ["Queen's pawn (d4)", 31],
              ["Knight to King 3 (Nf3)", 12],
              ["Queen's bishop pawn (c4)", 10],
              ['Other', 3]
            ]);

            var options = {
              title: 'Chess opening moves',
              width: 900,
              legend: { position: 'none' },
              chart: { subtitle: 'popularity by percentage' },
              axes: {
                x: {
                  0: { side: 'top', label: 'White to move'} // Top x-axis.
                }
              },
              bar: { groupWidth: "90%" }
            };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

}