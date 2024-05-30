<?php
        $dataPoints = array( 
          array("y" => 33, "label" => "domingo" ),
          array("y" => 24, "label" => "segunda-feira" ),
          array("y" => 18, "label" => "terça-feira" ),
          array("y" => 18, "label" => "quarta-feira" ),
          array("y" => 10, "label" => "quinta-feira" ),
          array("y" => 76, "label" => "sábado" )
        );
         
        ?>
        <!DOCTYPE HTML>
        <html>
        <head>
        <script>
        window.onload = function() {
         
        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "light2",
          title:{
            text: "Fluxo Semanal da Academia"
          },
          axisY: {
            title: "Quantidade de Alunos"
          },
          data: [{
            type: "column",
            yValueFormatString: "#,##0.## alunos",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
          }]
        });
        chart.render();
         
        }
        </script>
        </head>
        <body>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        </body>
        <a class = 'link' href="./chartcolumn.php">Fluxo Anual</a>
        <a class = 'link' href="./chartcolumnmonth.php">Fluxo Mensal</a> 
        <a class = 'link' href="./chartpizza.php">Faixa Etária</a>  
        </html>     