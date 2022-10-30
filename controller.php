<?php
    session_start();

    // For Login
	$username = $_POST['username'];
	$password = $_POST['password'];
    
	if(ISSET($_POST['login'])){
		include "connection.php";
		$query = $conn->query("SELECT *FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
			if($valid > 0){
				$_SESSION['admin_id'] = $fetch['admin_id'];
				echo("<script> location.replace('home.php')</script>");
			}else{
				echo "<script>alert('Invalid username or password')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		$conn->close();
	}	