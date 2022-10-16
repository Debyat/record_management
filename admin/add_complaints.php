<?php
	if(ISSET($_POST['save_complaints'])){
		$date = date('m/d/Y', strtotime('+8 HOURS'));
		$complaints = $_POST['complaints'];
		$remarks = $_POST['remarks'];
		$itr_no = $_GET['id'];
		$section = $_POST['section'];
		$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
		$f = $q->fetch_array();
		$q1 = $conn->query("SELECT * FROM `complaints` WHERE `itr_no` = '$_GET[id]'") or die(mysqli_error());
		$f1 = $q->fetch_array();
		if(($section == "Prenatal" || $section == "Maternity") && ($f['gender'] == "Male")){
				echo "<script>alert('Wrong section!')</script>";
			}else{
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$conn->query("INSERT INTO `complaints` VALUES('', '$date', '$complaints', '$remarks', '$itr_no', '$section', 'Pending')") or die(mysqli_error());
			echo("<script> location.replace(' patient.php');</script>");
			$conn->close();
			}
	}	

	if(ISSET($_POST['save_medication'])){
		$itr_id = $_GET['id'];
		$medicine_id = $_POST['medicine_id'];
		$quantity = $_POST['quantity'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$remarks = $_POST['remarks'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$conn->query("INSERT INTO `medication` VALUES('', '$itr_id', '$medicine_id', '$quantity', '$date', '$time', '$remarks)") or die(mysqli_error());
		echo("<script> location.replace('medication.php');</script>");
	}

?>