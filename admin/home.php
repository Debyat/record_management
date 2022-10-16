<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	include('server/server.php');
	$date = date("Y", strtotime("+ 8 HOURS"));
	$qfecalysis = $conn->query("SELECT COUNT(*) as total FROM `fecalisys` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$ffecalysis = $qfecalysis->fetch_array();
	$qmaternity = $conn->query("SELECT COUNT(*) as total FROM `birthing` `prenatal` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fmaternity = $qmaternity->fetch_array();
	$qhematology = $conn->query("SELECT COUNT(*) as total FROM `hematology` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fhematology = $qhematology->fetch_array();
	$qdental = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fdental = $qdental->fetch_array();
	$qxray = $conn->query("SELECT COUNT(*) as total FROM `radiological` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fxray = $qxray->fetch_array();
	$qrehab = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$frehab = $qrehab->fetch_array();
	$qsputum = $conn->query("SELECT COUNT(*) as total FROM `sputum` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fsputum = $qsputum->fetch_array();
	$qurinalysis = $conn->query("SELECT COUNT(*) as total FROM `urinalysis` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$furinalysis = $qurinalysis->fetch_array();
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
										echo $ffecalysis['total'];
									}
								?>, legendText: "Maternity"}, 
							{ label: "Tuberculosis",  y: 
								<?php 
									if($fmaternity == ""){
										echo 0;
									}else{
										echo $fmaternity['total'];
									}	
								?>, legendText: "Tuberculosis"},
							{ label: "Malnourished",  y: 
								<?php 
									if($fhematology == ""){
										echo 0;
									}else{
										echo $fhematology['total'];
									}	
								?>, legendText: "Malnourished"},
							{ label: "Hypertension",  y: 
								<?php 
									if($fdental == ""){
										echo 0;
									}else{
									echo $fdental['total'];
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