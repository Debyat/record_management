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
	<?php include('common/navbar.php')?>
	<?php include('common/sidebar.php')?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div id = "add" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>ADD Medicine</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "middlename">Generic Name: </label>
							<input class = "form-control" type = "text" name = "generic_name">
						</div>
						<div class = "form-group">
							<label for = "middlename">Brand Name: </label>
							<input class = "form-control" type = "text" name = "brand_name">
						</div>
						<div class = "form-group">
							<label for = "middlename">Dosage Form: </label>
							<select name = "dosage_form" class = "form-control" required = "required">
								<option value = "">--Please select an option--</option>
								<?php 
									$query = $conn->query("SELECT * FROM `dosage_form`") or die(mysqli_error());
									while($fetch = $query->fetch_array()){
									?>
										<option value="<?php echo $fetch['name'] ?>"><?php echo $fetch['name']?></td>
									<?php
									}
								?>
							</select>
						</div>
						<div class = "form-group">
						<label for = "middlename">Dosage Strength: </label>
							<input class = "form-control" type = "text" name = "dosage_strength">
						</div>
						<div class = "form-group">
							<label for = "lastname">Stock: </label>
							<input class = "form-control" type = "number" name = "stock">
						</div>
						<div class = "form-group">
							<label for = "lastname">Date: </label>
							<input class = "form-control" type = "date" name = "date">
						</div>
						<div class = "form-group">
							<label for = "lastname">Description: </label>
							<textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
						</div>
							<button  class = "btn btn-primary" name = "save_medicine" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							<br />
					</div>
					<?php require 'add_medicine.php' ?>					
					</div>
				</form>
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>MEDICINE</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>Generic Name</th>
							<th>Brand Name</th>
							<th>Dosage Form</th>
							<th>Dosage Strength</th>
							<th>Stock</th>
							<th>Date</th>
							<th>Description</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						include('server/server.php');
						$query = $conn->query("SELECT * FROM `medicine` ORDER BY `medicine_id` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['generic_name']?></td>
							<td><?php echo $fetch['brand_name']?></td>
							<td><?php echo $fetch['dosage_form']?></td>
							<td><?php echo $fetch['dosage_strength']?></td>
							<td><?php echo $fetch['stock'] ?></td>
							<td><?php echo $fetch['date'] ?></td>
							<td><?php echo $fetch['description'] ?></td>
							<td><center><a class = "btn btn-sm btn-warning" href = "edit_medicine.php?id=<?php echo $fetch['medicine_id']?>">
							<i class = "glyphicon glyphicon-edit"></i> Update</a> 
						<a onclick="confirmationDelete(this);return false;" href = "delete_medicine.php?id=<?php echo $fetch['medicine_id']?>" class = "btn btn-sm btn-danger">
							<i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
						</tr>
					<?php
						}
						$conn->close();
					?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	<?php include('common/footer.php') ?>
	
<?php require'script.php' ?>
<script type = "text/javascript">
	function confirmationDelete(anchor)
		{
			var conf = confirm('Are you sure want to delete this record?');
			if(conf)
			window.location=anchor.attr("href");
		}
</script>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>