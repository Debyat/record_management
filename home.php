<!DOCTYPE html>
<?php
	// require_once 'logincheck.php';
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

    $toryo = [];

    foreach ($data as $value) {
        $response = $conn->query("SELECT COUNT(*) as total FROM `$value` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
        $toryo[$value] = $response->fetch_array();
    }

?>
<html lang = "eng">
	<head>
		<title>Health Center Patient Record Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<?php require 'script.php'?>
		<script src = "../js/jquery.canvasjs.min.js"></script>
		<script type="text/javascript"> 
			window.onload = function() { 
				$("#chartContainer").CanvasJSChart({ 
					title: { 
						text: "Total Patient Population <?php echo $date?>",
						fontSize: 24
					}, 
					axisY: { 
						title: "asda" 
					}, 
					legend :{ 
						verticalAlign: "center", 
						horizontalAlign: "left" 
					}, 
					data: [ 
					{ 
						type: "pie", 
						showInLegend: true, 
						toolTipContent: "{label} <br/> {y}", 
						indexLabel: "{y}", 
						dataPoints: [ 
							{ label: "Maternity",  y: 
								<?php 
									if($ffecalysis == ""){
											echo 0;
									}else{
										echo $result['fecalisys']['total'];
									}
								?>, legendText: "Maternity"}, 
							{ label: "Tuberculosis",  y: 
								<?php 
									if($fmaternity == ""){
										echo 0;
									}else{
										echo $result['maternity']['total'];
									}	
								?>, legendText: "Tuberculosis"},
							{ label: "Malnourished",  y: 
								<?php 
									if($fhematology == ""){
										echo 0;
									}else{
										echo $result['hematology']['total'];
									}	
								?>, legendText: "Malnourished"},
							{ label: "Hypertension",  y: 
								<?php 
									if($fdental == ""){
										echo 0;
									}else{
									echo $result['hypertension']['total'];
									}
								?>, legendText: "Hypertension"},
							{ label: "Diabetic",  y: 
								<?php 
									if($fxray == ""){
										echo 0;
									}else{
										echo $fxray['total'];
									}	
								?>, legendText: "Diabetic"},
							{ label: "Teenage Pregnancy ",  y: 
								<?php
									if($frehab == ""){
										echo 0;
									}else{
										echo $frehab['total'];
									}	
								?>, legendText: "Teenage Pregnancy "},
							{ label: "PWD",  y: 
								<?php
									if($fsputum == ""){
										echo 0;
									}else{
										echo $fsputum['total'];
									}	
								?>, legendText: "PWD"},
						] 
					} 
					] 
				}); 
			} 
		</script>
	</head>
<body>
	<?php include('common/navbar.php') ?>
	<?php include('common/sidebar.php') ?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "well">
			<div id="chartContainer" style="width: 100%; height: 400px"></div> 
		</div>
	</div>
	<?php include('common/footer.php')?>
		
</body>
</html>