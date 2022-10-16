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
		<div class = "panel panel-success">	
		<?php
			$query = $conn->query("SELECT * FROM `medicine` WHERE `medicine_id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
			<div class = "panel-heading">
				<label>UPDATE MEDICINE</label>
				<a href = "user.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
					<div class = "form-group">
							<label for = "middlename">Generic Name: </label>
							<input class = "form-control" type = "text" name = "generic_name" value="<?php echo $fetch['generic_name']?>">
						</div>
						<div class = "form-group">
							<label for = "middlename">Brand Name: </label>
							<input class = "form-control" type = "text" name = "brand_name" value="<?php echo $fetch['brand_name']?>">
						</div>
						<div class = "form-group">
							<label for = "middlename">Dosage Form: </label>
							<select name = "dosage_form" class = "form-control" required = "required">
								<option value = "">--Please select an option--</option>
								<?php 
									$query = $conn->query("SELECT * FROM `dosage_form`") or die(mysqli_error());
									while($dosage = $query->fetch_array()){
									?>
										<option value="<?php echo $dosage['name'] ?>" <?php if($dosage['name'] == $fetch['dosage_form']){ echo 'selected'; } ?>>
										<?php echo $dosage['name']?></option>
									<?php
									}
								?>
							</select>
						</div>
						<div class = "form-group">
						<label for = "middlename">Dosage Strength: </label>
							<input class = "form-control" type = "text" name = "dosage_strength" value="<?php echo $fetch['dosage_strength']?>">
						</div>
						<div class = "form-group">
							<label for = "lastname">Stock: </label>
							<input class = "form-control" type = "number" name = "stock" value="<?php echo $fetch['stock']?>">
						</div>
						<div class = "form-group">
							<label for = "lastname">Date: </label>
							<input class = "form-control" type = "date" name = "date" value="<?php echo $fetch['date']?>">
						</div>
						<div class = "form-group">
							<label for = "lastname">Description: </label>
							<textarea name="description" id="" class="form-control" cols="30" rows="10" value="<?php echo $fetch['description']?>"></textarea>
						</div>
							<button class = "btn btn-warning" name = "update_medicine" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
							<br />
					</div>	
					<?php require 'add_medicine.php'?>
					</div>
				</form>			
			</div>	
		</div>	
	</div>
	<?php include('common/footer.php') ?>
<?php include("script.php"); ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>