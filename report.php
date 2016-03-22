<!DOCTYPE html>
<html lang = "en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="css/reservation.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
		<title>PUP-Reservation</title>

		
  </head>
  
  <body>
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
			  <ul class="nav navbar-nav">
				<li class="dropdown">
				<a href ="home.php">HOME</a>
				</li>
				<li class="dropdown">
					<a href ="#" class="dropdown-toggle" data-toggle="dropdown">MAINTENANCE <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href = "facility.php">FACILITY</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
				<a href ="reservation.php">TRANSACTION</a>
				</li>
				
				<li class="dropdown">
					<a href ="#" class="dropdown-toggle" data-toggle="dropdown">QUERIES<span class="caret"></span></a>
							<ul class="dropdown-menu">
							<li><a href="customerschedule.php">CUSTOMER'S NAME</a></li>
							<li><a href="dateschedule.php">DATE</a></li>
							<li><a href="statusschedule.php">STATUS</a></li>
							</ul>
				</li>
					
				
				<li class="dropdown active">
				<a href ="report.php">REPORTS</a>
				</li>
				
				
			  </ul>
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
			</div>
		</nav>
		
		<div class = "modal-dialog">
			<div class = "modal-content">
			<div class = "modal-header" style="background:#f0f5f5;">
				<font size="6">Report</font>
			</div>
					<div class = "modal-body">
						
							<form class = "form-inline text-center">
							<label>Start Date:</label>
							<input required type ="text" class="form-control" id = "sdate" placeholder ="mm/dd/yyyy">
							<label>End Date:</label>
							<input required type ="text" class="form-control" id = "edate" placeholder ="mm/dd/yyyy">
							</form>
							<br>
							<br>
					
							<div class = "form-inline text-center">
							<button type="submit" class="btn btn-primary" data-toggle = "modal" data-target = "#popUpOccupied">
							<span class="glyphicon glyphicon-ok"></span> Generate Report
							</div>
							<div class = "modal fade" id = "popUpOccupied">
									<div class = "modal-dialog">
											<div class = "modal-content" style ="width:600px; left: 30px;">
											<!--header-->
													<div class = "modal-header" style="background:#f0f5f5;">
														<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
														<h3 class = "modal-title">Results</h3>
													</div>
											<!--TABLE-->
												<div class="container" style ="width:600px">
												<div class="table-responsive">          
												<table class="table">
												<thead>
												<tr>
												<th>Customer's Name</th>
												<th>Course, Year & Section</th>
												<th>Facility</th>
												<th>Date Rented</th>
												<th>Time Rented</th>
												</tr>
												</thead>
												<tbody>
												<tr>
												<th>Ana Daniella Soriano</th>
												<th>BSIT 3-4</th>
												<th>Bulwagang Balagtas</th>
												<th>01/04/2016</th>
												<th>8:00AM-10:00AM</th>
												</tr>
												<tr>
												<th>Jamie Percano</th>
												<th>BSCS 3-1D</th>
												<th>Claro M. Recto Hall</th>
												<th>01/12/2016</th>
												<th>1:00PM-3:00PM</th>
												</tr>
												<tr>
												<th>Marigold Quipot</th>
												<th>BSCS 3-1D</th>
												<th>Claro M. Recto Hall</th>
												<th>01/15/2016</th>
												<th>8:00PM-12:00NN</th>
												</tr>
												<tr>
												<th>Jude Dijos</th>
												<th>BSIT 3-1D</th>
												<th>Open Court</th>
												<th>01/22/2016</th>
												<th>1:00PM-3:00PM</th>
												</tr>
												</tbody>
												</table>
												</div>
													</div><!--Table-->
											</div>
									</div>
							</div>
					
				</div>
			
			</div>
		</div>

		
		
		<div id="footer">
				Copyright &copy; 2016 Facility Reservation All Rights Reserved.
		</div>
  </body>
</html>
