<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	include('connection.php');
	$date = date("Y", strtotime("+ 8 HOURS"));
	
    $data = [
        'maternity',
        'malnourished',
        'tubercolusis',
        'teenage_preg',
        'hypertension',
        'diabetic',
        'pwd'
    ];

    $dataPoints = [];

    foreach ($data as $value) {
        $response = $conn->query("SELECT COUNT(*) as total FROM `$value` GROUP BY `patient_id`") or die(mysqli_error());
        $result = $response->fetch_array();
		$array = [
			'label' => $value,
			'y' => isset($result['total']) ? $result['total'] : 0,
		];
		array_push($dataPoints, $array);
    }
?>
<html lang = "eng">
	<head>
		<title>Health Center Patient Record Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
		<script src = "js/jquery.canvasjs.min.js"></script>
		<script>
			window.onload = function() {
				var chart = new CanvasJS.Chart("chartContainer", {
					animationEnabled: true,
					title: {
						text: "Total Population"
					},
					subtitles: [{
						text: "Year 2022"
					}],
					data: [{
						type: "pie",
						yValueFormatString: "#,##0.00\"%\"",
						indexLabel: "{label} ({y})",
						dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
					}]
				});
				chart.render();
			}
 		</script>
	</head>
<body>
	<?php include('pages/common/navbar.php') ?>
	<?php include('pages/common/sidebar.php') ?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "well">
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		</div>
	</div>
</body>
</html>