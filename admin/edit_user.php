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
			$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
			<div class = "panel-heading">
				<label>ADD USER</label>
				<a href = "user.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "username">Username: </label>
							<input class = "form-control" value = "<?php echo $fetch['username']?>" name = "username" type = "text" required = "required">
						</div>
						<div class = "form-group">	
							<label for = "password">Password: </label>
							<input class = "form-control" name = "password" maxlength = "12" value = "<?php echo $fetch['password']?>" type = "password" required = "required">
						</div>
						<div class = "form-group">
							<label for = "firstname">Firstname: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['firstname']?>" name = "firstname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "middlename">Middlename: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['middlename']?>" name = "middlename" placeholder = "(Optional)">
						</div>
						<div class = "form-group">
							<label for = "lastname">Lastname: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['lastname']?>" name = "lastname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "section">Section: </label>
							<select name = "section" class = "form-control" required = "required">
								<option value = "">--Please select an option--</option>
								<option value = "Dental">Dental</option>
								<option value = "Fecalysis">Fecalysis</option>
								<option value = "Hematology">Hematology</option>
								<option value = "Prenatal">Prenatal</option>
								<option value = "Xray">Xray</option>
								<option value = "Rehabilitation">Rehabilitation</option>
								<option value = "Sputum">Sputum</option>
								<option value = "Urinalysis">Urinalysis</option>
								<option value = "Maternity">Maternity</option>
							</select>
						</div>
							<button class = "btn btn-warning" name = "edit_user" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
							<br />
					</div>	
					<?php require 'edit_query.php'?>
					</div>
				</form>			
			</div>	
		</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
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