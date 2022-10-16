<!DOCTYPE html>
<?php
	require'connect.php';
	require_once('logincheck.php');
?>
<html lang = "eng">
	<head>
		<title>Patient Health Center Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<div id = "add" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>ADD ADMINISTRATOR</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form method = "POST" enctype = "multi-part/form-data">
					<div class = "form-inline">
						<label for = "username">Username: </label>
						<input class = "form-control" type = "text" name = "username" required = "required">
						&nbsp;
						<label for = "password">Password: </label>
						<input class = "form-control" type = "password" name = "password" required = "required">
						&nbsp;
						<label for = "name">Name: </label>
						<input class = "form-control" type = "text" name = "name" required = "required">
						&nbsp;
						<label for = "section">Section: </label>
						<select class = "form-control"name = "section">
							<option>--Please select an option--</option>
							<option value = "Maternity">Maternity</option>
							<option value = "Tuberculosis">Tuberculosis</option>
							<option value = "Malnourished">Malnourished</option>
							<option value = "Hypertension">Hypertension</option>
							<option value = "Diabetic">Diabetic</option>
							<option value = "Teenage Pregnancy">Teenage Pregnancy</option>
							<option value = "Teenage Pregnancy">PWD</option>
						</select>
						<br />
						<br />
						<br />
						<button class = "btn btn-primary" type = "submit"  name = "save"><span class = "glyphicon glyphicon-save"></span> SAVE</button>
					</div>
				</form>
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>ACCOUNTS / ADMINISTRATOR</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<br />
				<br />
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							<th>Username</th>
							<th>Password</th>
							<th>Name</th>
							<th>Section</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$q = mysqli_query($conn, "SELECT * FROM `user`") or die(mysqli_error());
						while($f = mysqli_fetch_array($q)){
					?>
						<tr>
							<td><?php echo $f['username']?></td>
							<td><?php echo $f['password']?></td>
							<td><?php echo $f['name']?></td>
							<td><?php echo $f['section']?></td>
							<td><center><a class = "btn btn-warning">Edit</a> |
							<a class = "btn btn-danger">Delete</a></center>
							</td>
						</tr>
					<?php
						}
					?>	
					</table>
			</div>
		</div>
	</div>
	<?php include('common/footer.php') ?>
<?php
	include("script.php");
?>	
</body>
</html>