<?php
include 'functions.php';
?>

<?= template_header('CrowdGym') ?>
<?php

$dataPoints = array(
	array("label" => "Crianças(6-12 anos)", "y" => 10),
	array("label" => "Adolescentes(13-17 anos)", "y" => 25),
	array("label" => "Adultos(18-64 anos)", "y" => 40),
	array("label" => "Idosos(65+ anos)", "y" => 19),
);

?>
<script>
	window.onload = function() {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			exportEnabled: true,
			title: {
				text: "Faixa etária da academia"
			},
			subtitles: [{
				text: "Idade mediana dos alunos"
			}],
			data: [{
				type: "pie",
				showInLegend: "true",
				legendText: "{label}",
				indexLabelFontSize: 16,
				indexLabel: "{label} - #percent%",
				yValueFormatString: "###0 alunos",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();

	}
</script>
	<div id="chartContainer"></div>
	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?= template_footer() ?>