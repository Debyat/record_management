<?php
    include('server/server.php');
	if(ISSET($_POST['save_medicine'])){	
		$generic_name = $_POST['generic_name']; 
		$brand_name = $_POST['brand_name']; 
		$dosage_form = $_POST['dosage_form']; 
		$dosage_strength = $_POST['dosage_strength']; 
		$stock = $_POST['stock']; 
		$date = $_POST['date']; 
		$description = $_POST['description']; 
		$q1 = $conn->query("SELECT * FROM `medicine` WHERE `brand_name` = '$brand_name'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<script>alert('Brand Name already exist')</script>";
			}else{
				$conn->query("INSERT INTO `medicine` VALUES('', '$generic_name', '$brand_name', '$stock', '$dosage_form', '$dosage_strength', '$description', '$date')");
				echo("<script> location.replace(' medicine.php');</script>");
			}
	}
	if(ISSET($_POST['update_medicine'])){	
        $id = $_GET['id'];
		$generic_name = $_POST['generic_name']; 
		$brand_name = $_POST['brand_name']; 
		$dosage_form = $_POST['dosage_form']; 
		$dosage_strength = $_POST['dosage_strength']; 
		$stock = $_POST['stock']; 
		$date = $_POST['date']; 
		$description = $_POST['description'];
        $conn->query("UPDATE `medicine` SET `generic_name` = '$generic_name', `brand_name` = '$brand_name', `dosage_form` = '$dosage_form', `dosage_strength` = '$dosage_strength',
		`stock` = '$stock', `date` = '$date', `description` = '$description' WHERE `medicine_id` = '$id'") or die(mysqli_error());
        echo("<script> location.replace(' medicine.php');</script>");
	}	
