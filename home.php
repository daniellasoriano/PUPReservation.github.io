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
		

		
  </head>
  	<style type="text/css">
		.carousel{
		    background: #e5ffe5;
		    margin-top: 20px;
		}
		.carousel .item img{
		    margin: 0 auto;
			height: 300px;
		}
		.item img {
		  	margin: 0 auto;
		    top: 0;
		    left: 0;
		    min-height: 450px;
		    width: 80%;
		}
		.bs-example{
			margin: 20px;
		}
		</style>
  
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
			
					session_start();
					if(isset($_SESSION['user']) && isset($_SESSION['pwd'])){
					echo "Welcome, ".$_SESSION['name']."!";
					
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
				<a href ="home.php">HOME</a>
				</li>
				
				<li class="dropdown">
					<a href ="#" class="dropdown-toggle" data-toggle="dropdown">MAINTENANCE <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href = "facility.php">FACILITY</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
				<a href ="calendar.php">TRANSACTION</a>
				</li>
				
				<li class="dropdown">
					<a href ="#" class="dropdown-toggle" data-toggle="dropdown">QUERIES<span class="caret"></span></a>
							<ul class="dropdown-menu">
							<li><a href="customerschedule.php">CUSTOMER'S NAME</a></li>
							<li><a href="dateschedule.php">DATE</a></li>
							<li><a href="statusschedule.php">STATUS</a></li>
							</ul>
				</li>
					
				
				<li class="dropdown">
				<a href ="report.php">REPORTS</a>
				</li>
				
			  </ul>
			  
			</div>
		</nav>
		
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			    <!-- Carousel indicators -->
			    <ol class="carousel-indicators">
			        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			        <li data-target="#myCarousel" data-slide-to="1"></li>
			        <li data-target="#myCarousel" data-slide-to="2"></li>
			        <li data-target="#myCarousel" data-slide-to="3"></li>
			        <li data-target="#myCarousel" data-slide-to="4"></li>
			        <li data-target="#myCarousel" data-slide-to="5"></li>
			        <li data-target="#myCarousel" data-slide-to="6"></li>
			        <li data-target="#myCarousel" data-slide-to="7"></li>

			    </ol>   
			    <!-- Wrapper for carousel items -->
			    <div class="carousel-inner">
			        <div class="item active">
			            <img src="img/image1.jpg" alt="First Slide">
			        </div>
			        <div class="item">
			            <img src="img/image2.jpg" alt="Second Slide">
			        </div>
			        <div class="item">
			            <img src="img/image3.jpg" alt="Third Slide">
			        </div>
			         <div class="item">
			            <img src="img/image4.jpg" alt="Fourth Slide">
			        </div>
			        <div class="item">
			            <img src="img/image5.jpg" alt="Fifth Slide">
			        </div>
			        <div class="item">
			            <img src="img/image6.jpeg" alt="Sixth Slide">
			        </div>
			        <div class="item">
			            <img src="img/image7.jpg" alt="Seventh Slide">
			        </div>
			        <div class="item">
			            <img src="img/image8.jpg" alt="Eight Slide">
			        </div>
			    </div>
			    <!-- Carousel controls -->
			    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
			        <span class="glyphicon glyphicon-chevron-left"></span>
			    </a>
			    <a class="carousel-control right" href="#myCarousel" data-slide="next">
			        <span class="glyphicon glyphicon-chevron-right"></span>
			    </a>
			</div>

		
		
		
		<div id="footer">
				Copyright &copy; 2016 Facility Reservation All Rights Reserved.
		</div>
  </body>
</html>
