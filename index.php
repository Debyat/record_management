<?php include "pages/common/header.php" ?>
<style>
	html body{
		height: 100%;
		background-image: url('images/Homebackground.jpg');
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>
<div class = "navbar navbar-default">
	<img src = "images/logo.jpg" style = "float:left;" height = "55px" /><label class = "navbar-brand">
				Health Center Patient Record Management System - Brgy. Baod Health Center</label>
		</div>
	<div id = "top" class = "login">
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<center><h1 class = "panel-title">Administrator</h1></center>
			</div>
			<div class = "panel-body">
				<form enctype = "multipart/form-data" action = "controller.php" role = "form" method = "POST">
					<div class = "form-group">
						<label for = "username">Username</label>
						<input class = "form-control" name = "username" placeholder = "Username" type = "text" required = "required" >
					</div>
					<div class = "form-group">
						<label for = "password">Password</label>
						<input class = "form-control" name = "password" placeholder = "Password" type = "password" required = "required" >
					</div>
					<div class = "form-group">
						<button class = "btn btn-block btn-success"  name = "login"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
					</div>
				</form>
			</div>
		</div>	
	</div>			
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
<?php include "pages/common/footer.php" ?>
