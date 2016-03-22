<!DOCTYPE html>
<html lang = "en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="css/home.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
		<title>PUP Reservation - Home</title>
		
		<script>
			$(function(){
			$('.fadein img:gt(1)').hide();
			setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 2500);
			});
		</script>

		
  </head>
  
  <body style="background:linear-gradient(to bottom right,aquamarine,#006495,#006C70);">
		<div id = "header">
			<img id = "headerLogo" src = "img/PUPLogo.png"/>
		</div>
		
		<nav class="navbar navbar-default">
		  
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			  </button>
			</div>
			
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<form method="post">
					<button type="submit" onclick="return confirm('Are you sure you want to logout?');" class="btn btn-primary" style = "margin-top:10px; margin-right:10px;"name="btnLogout" >
					<span class="glyphicon glyphicon-log-out"></span> Logout
					</button>
				</form>
				<?php 
					include ('connection.php');
					session_start();
					if(isset($_SESSION['user']) && isset($_SESSION['pwd'])){
					$customer = $_SESSION['usercust'];
					$username;
					$sqlcust = mysqli_query($con, "Select * from tblCustomer where intCustID = '$customer'");
					while ($custrow = mysqli_fetch_array($sqlcust)){
						$username = $custrow['strCustName'];
					}

					echo "Welcome, ".$username."!";
					
					if(isset($_POST['btnLogout'])){
						session_destroy();
						header("location:index.php");
						}
					}
					if (!isset($_SESSION['user']) || !isset($_SESSION['pwd'])){
						echo "<script>alert('User must login first') ; window.location.href = 'index.php'</script>";
					}
				?>
			  </ul>
			  <ul class="nav navbar-nav">
				<li class="dropdown active">
				<a href ="home_cust.php">HOME</a>
				</li>
				
				
				<li class="dropdown">
				<a href ="calendar_cust.php">TRANSACTION</a>
				</li>
					
				
			  </ul>
			  
			</div>
		</nav>
		
		<div class="fadein">
			<ul>
				<li><img src="img/image1.jpg" /></li>
				<li><img src="img/image2.jpg" /></li>
				<li><img src="img/image3.jpg" /></li>
				<li><img src="img/image4.jpg" /></li>
				<li><img src="img/image5.jpg" /></li>
				<li><img src="img/image6.jpeg" /></li>
				<li><img src="img/image7.jpg" /></li>
				<li><img src="img/image8.jpg" /></li>
			</ul>
		</div>
		
		
		
		<div id="footer">
				Copyright &copy; 2016 Facility Reservation All Rights Reserved.
		</div>
  </body>
</html>
