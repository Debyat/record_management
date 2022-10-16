<?php

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