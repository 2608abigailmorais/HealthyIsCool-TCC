function Grafico_peso(result) {
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable();
      
      data.addColumn('string','Data');
      data.addColumn('number','Peso');
      result.forEach(element => {
        console.log(element)
            data.addRows([[
                element["data"],
                parseFloat(element["peso"])
            ]]);
            });


      var options = {
        title: "Peso",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("graph_column"));
      chart.draw(data, options);
    }
}

function Grafico_altura(result) {
    google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Data');
    data.addColumn('number', 'Altura');
    result.forEach(element => {
        console.log(element)

        data.addRows([[
            element["data"],
            parseFloat(element["altura"])
        ]]);
    });

    var options = {
    chart: {
        title: 'Altura',
    },
    width: 600,
    height: 400
    };

    var chart = new google.charts.Line(document.getElementById('graph_line'));

    chart.draw(data, google.charts.Line.convertOptions(options));
    }
}

function Grafico_imc(result) {
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMaterial);

function drawMaterial() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Data');
      data.addColumn('number', 'IMC');
      data.addColumn('number', 'IMC ideal máximo');
        result.forEach(element => {
            console.log(element)
            data.addRows([[
                element["data"],
                parseFloat(element["imc"]),
                parseFloat(24.99)
            ]]);
        });

      var options = {
        title: 'IMC',
        width: 600,
        height: 400
        
      };

      var materialChart = new google.charts.Bar(document.getElementById('graph_div'));
      materialChart.draw(data, options);
    }
}