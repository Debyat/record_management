<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
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
	</head>
<body>
	<?php include('common/navbar.php') ?>
	<?php include('common/sidebar.php') ?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div style = "display:none;" id = "com" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>PATIENT / MEDICATION</label>
				<button class = "btn btn-danger" id = "hide_com" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span>CLOSE</button>
			</div>
			<div class = "panel-body">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<form method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "itr_no">ITR No:</label>
						<input class = "form-control" value = "<?php echo $f['itr_no'] ?>" disabled = "disabled" size = "3" type = "number" name = "itr_no">
					</div>
					<div style = "float:right;" class = "form-inline">
						<label for = "family_no">Family no:</label>
						<input class = "form-control" size = "3" value = "
							<?php 
								if($f['family_no'] == "0"){
									echo "";
								}else{
									echo $f['family_no'];
								}	
							?>" disabled = "disabled" type = "number" name = "family_no">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Firstname:</label>
						<input class = "form-control" name = "firstname" value = "<?php echo $f['firstname']?>" disabled = "disabled" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "middlename">Middle Name:</label>
						<input class = "form-control" name = "middlename" value = "<?php echo $f['middlename']?>" disabled = "disabled" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "lastname">Lastname:</label>
						<input class = "form-control" name = "lastname" value = "<?php echo $f['lastname']?>" disabled = "disabled" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label>Medicine:</label>
						<select name = "medicine_id" class = "form-control" required = "required">
                            <option value = "">--Please select an option--</option>
                            <?php 
                                $query = $conn->query("SELECT * FROM `medicine`") or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                                ?>
                                    <option value="<?php echo $fetch['medicine_id'] ?>"><?php echo $fetch['generic_name']?>, <?php echo $fetch['brand_name']?>, <?php echo $fetch['dosage_strength']?></td>
                                <?php
                                }
                            ?>
						</select>
                        <br />
						<label>Quantity:</label>
						<input class = "form-control" name="quantity" type = "number" required = "required">
                        <br />
						<br />
						<label>Date:</label>
						<input class = "form-control" name="date" type = "date" required = "required">
                        <br />
                        <br />
						<label>Time:</label>
						<input class = "form-control" name="time" type = "time" required = "required">
                        <br />
						<label>Remarks:</label>
						<textarea style = "resize:none;" name = "remarks" class = "form-control"></textarea>
						<br />
					</div>
					<br />
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_medication"><span class = "glyphicon glyphicon-save"></span> SAVE</button>
					</div>
					<?php require 'add_complaints.php' ?>
				</form>
			</div>	
		</div>	
		<?php
			$query = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
		<div class = "panel panel-info">
			<div class = "panel-heading">
				<label style = "font-size:16px;">Medication / <?php echo $fetch['firstname']." ".$fetch['lastname']?></label>
				<a style = "float:right; margin-top:-5px;" id = "add_complaints" class = "btn btn-success" href = "patient.php"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
		</div>
		<button class = "btn btn-primary" id = "show_com"><i class = "glyphicon glyphicon-plus">ADD</i></button>
		<div class = "panel-body">
            <div class = "form-group">
                <?php 
                    $query =$conn->query("SELECT * FROM `medication` WHERE `itr_id` = '$_GET[id]' ORDER BY `medication_id` ASC") or die(mysqli_error());
                    while($fetch = $query->fetch_array()){
                    ?>
                        <br />
						<label>Date:</label>
						<input class = "form-control" name="date" type = "date" value="<?php echo $fetch['date'] ?>">
                        <br />
                        <br />
						<label>Time:</label>
						<input class = "form-control" name="date" type = "date" value="<?php echo $fetch['time'] ?>">
                        <br />
                    <?php
                    }
                ?>
            </div>
		</div>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
<?php include("script.php"); ?>
</body>
</html>