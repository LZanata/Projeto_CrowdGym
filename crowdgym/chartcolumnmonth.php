<?php
include 'functions.php';
?>

<?=template_header('CrowdGym')?>
<?php
 
$dataPoints = array( 
	array("y" => 99, "label" => "1°semana" ),
	array("y" => 70, "label" => "2°semana" ),
	array("y" => 100, "label" => "3°semana" ),
	array("y" => 120, "label" => "4°semana" ),
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
		text: "Fluxo Mensal da Academia"
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
<a class = 'link' href="./chartpizza.php">Faixa Etária</a> 
</html>
<?=template_footer()?>