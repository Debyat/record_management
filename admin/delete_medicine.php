<?php
	include('server/server.php');
	$conn->query("DELETE FROM `medicine` WHERE `medicine_id` = '$_GET[id]'") or die(mysqli_error());
	echo("<script> location.replace('medicine.php');</script>");
