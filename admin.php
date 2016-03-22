<html>
<head> <title> WEB DEV </title>

	<style>
		div {

			margin-left: 40%;
			margin-top: 10%
		}

	</style>
</head>
<body> 
		<div>
		<form method ="post">
		<div class="align-right">
		<input type="submit" name= "btnLogout" value ="Logout">
		</div>
		<?php 
			
			session_start();
			if(isset($_SESSION['user']) && isset($_SESSION['pwd'])){
			echo "Welcome, ".$_SESSION['fname']." ".$_SESSION['lname']."!";
			
			if(isset($_POST['btnLogout'])){
				session_destroy();
				header("location:index.php");
				}
			}
			if (!isset($_SESSION['user']) || !isset($_SESSION['pwd'])){
				echo "<script>alert('User must login first') ; window.location.href = 'index.php'</script>";
			}
		?>
		</form>
		</div>
</body>