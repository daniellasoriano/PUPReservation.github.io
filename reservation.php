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
  
  <body style="background:linear-gradient(to bottom right,Maroon,LightSalmon,Maroon);">
  
  
  <style>
  
  	#navbar 
	{
		background-color:gold; 
		border:2px solid black;
		color:black;
		
	}
	
  </style>
  
  
		<div id = "header">
			<img id = "headerLogo" src = "img/PUPLogo.png"/>
		</div>
		
			<nav class="navbar navbar-default" id="navbar">
		  
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
				
				<li class="dropdown active">
				<a href ="calendar.php">TRANSACTION</a>
				</li>
				
				<li class="dropdown">
					<a href ="#" class="dropdown-toggle" data-toggle="dropdown">QUERIES <span class="caret"></span></a>
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
				<font size="6">Create Reservation</font>
			</div>
					<div class = "modal-body">
						<form action='insertreserv.php' method='post'>
							<label>Reservation No.</label>
							<?php
							require ('connection.php');
							$getselect=mysqli_query($con, "select * FROM tblReservation");
							$num_rows = mysqli_num_rows($getselect)+1;
							?>
							<input readonly type="text" class="form-control" name="resno" placeholder="0000<?php echo $num_rows ?>">
							<label>Student Number</label>
							<input required class="form-control" id= "studno" name ="studno" placeholder = "2013-01784-MN-0" pattern="[0-9]+\-[0-9]+\-[a-z]{2,3}+\[a-z]{1}"></input>
							<label>Customer's Name</label>
							<input required type ="text" class="form-control" id = "name" name="name"><br>
							
							<form class = "form-inline">
							<label>Course:</label>
							<input required type ="text" class="form-control" id = "name" name="course">
							
							<label>Year:</label>
							<input required type ="number" class="form-control" id = "name" name="year">
							
							<label>Section:</label>
							<input required type ="text" class="form-control" id = "name" name="sec">
							</form>

							<label>Contact No.</label> 
							<input required type="text" class="form-control" name="conno">
							<label>Email Address</label>
							<input required class="form-control" id= "email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}"></input><br>
							<form class = "form-inline">
							<label>Facilities:</label>
							<select required class="form-control" id="sel2" name="facility">
							<?php 
								$facility = mysqli_query($con, "Select * from tblFacility");
								while($row = mysqli_fetch_array($facility)){
									$fac = $row['strFacilityName'];
									echo "<option value=$fac>$fac</option>";
								}
							?>
							</select>
							</form>
							<form class = "form-inline">
							<br><label>Date:</label>
							<input required type ="date" class="form-control" id = "date" placeholder ="mm/dd/yyyy" min="<?php echo date('Y-m-d'); ?>">
							<label>Start Time: (include setup)</label>
							<input required type ="time" class="form-control" id = "stime" placeholder ="11:00" Min = "03:00 AM" MAx = "9:00 PM">
							<label>End Time: (include breakdown)</label>
							<input required type ="time" class="form-control" id = "etime" placeholder ="13:00" Min = "04:00 AM" MAx = "10:00 PM">
							</form>
							<br>
							<br>
					
					<div class="form-group"> 
								
								<div class="inline text-center ">
									<button type="submit" class="btn btn-primary" name ="btnConfirm">
									<span class="glyphicon glyphicon-ok"></span> Confirm
								
									<button type="cancel" class="btn btn-primary">
									<span class="glyphicon glyphicon-remove"></span> Cancel
								
								</div>
				
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>

		
		
		<div id="footer">
				Copyright &copy; 2016 Facility Reservation All Rights Reserved.
		</div>
  </body>
</html>
