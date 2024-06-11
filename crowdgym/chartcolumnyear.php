<?php
include 'functions.php';
?>

<?= template_header('CrowdGym') ?>
<?php

$dataPoints = array(
	array("y" => 990, "label" => "janeiro"),
	array("y" => 700, "label" => "fevereiro"),
	array("y" => 500, "label" => "março"),
	array("y" => 400, "label" => "abril"),
	array("y" => 450, "label" => "maio"),
	array("y" => 470, "label" => "junho"),
	array("y" => 460, "label" => "julho"),
	array("y" => 490, "label" => "agosto"),
	array("y" => 550, "label" => "setembro"),
	array("y" => 600, "label" => "outubro"),
	array("y" => 800, "label" => "novembro"),
	array("y" => 950, "label" => "dezembro"),

);
?>

	<script>
		window.onload = function() {

			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				theme: "light2",
				title: {
					text: "Fluxo Anual da Academia"
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
	</script>	<div id="chartContainer"></div>
	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<?= template_footer() ?>