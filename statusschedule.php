<!DOCTYPE html>
<html lang = "en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="css/reservation.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
		<title>PUP-Reservation Schedule (Status)</title>

		
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
				
				<li class="dropdown active">
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
				<font size="6">Reservation Schedule</font>
			</div>
					<div class = "modal-body">
						
							<div class ="form-inline">
							<label name="name">View by:</label>
							<input readonly type="text" class="form-control" name="search" placeholder="Status">
							</div>
							
							
							<form method = 'post'>
							<div class="inline text-center ">
									<label name="name">Status:</label>
									<label class="radio-inline"><input checked type="radio" name="optradio" value ="active">Available</label>
									<label class="radio-inline"><input type="radio" name="optradio"  value ="inactive">Unavailable</label>
									<button type="submit" class="btn btn-primary" name ="btnSearch">
									<span class="glyphicon glyphicon-search"></span> Search
							</div></form>

													<div style="background:#f0f5f5;">
														<h3 class = "modal-title">Results</h3>
													</div>
											<!--TABLE-->
												<div class="container" style ="width:600px">
												<div class="table-responsive">          
												<table class="table" id="dbtbl">
												<thead>
												<tr>
												<th>Customer's Name</th>
												<th>Date</th>
												<th>Facility</th>
												<th>Start Time</th>
												<th>End Time</th>
												<th>Price</th>
												<th>Status</th>
												</tr>
												</thead>
												<tbody>
												<?php view() ?>
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
		</div>

		
		
		<div id="footer">
				Copyright &copy; 2016 Facility Reservation All Rights Reserved.
		</div>
  </body>
</html>

<script type="text/javascript" src="js/myJs.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#dbtbl').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );
</script>
<?php
 function view(){
 include('connection.php');

  $sqlreserv;
  $searchCust;
  if(isset($_POST['btnSearch'])){	

  $customer = $_POST['optradio'];
  $sCust = mysqli_query($con, "Select * from tblreservation");
  while($row=mysqli_fetch_array($sCust)){
  	if($customer == "active")
  		 $sqlreserv = mysqli_query($con, "Select * from tblreservation where strReservationStatus = 'active' or strReservationStatus = 'pending' order by dtmReservationDate");
  	
  	else if($customer == "inactive")
  	
  		 $sqlreserv = mysqli_query($con, "Select * from tblreservation where strReservationStatus = 'cancelled'  order by dtmReservationDate");
  	
}}

else {
	$sqlreserv = mysqli_query($con, "Select * from tblreservation");}

  while($zzz=mysqli_fetch_array($sqlreserv))
  {
  $id=$zzz['intReservationID'];
  $date=$zzz['dtmReservationDate'];
  $start=$zzz['timReservationStart'];
  $end=$zzz['timReservationEnd'];
  $custID=$zzz['intCustID_FK'];
  $facID=$zzz['intFacilityID_FK'];
  $status=$zzz['strReservationStatus'];
  $reqdate=$zzz['dtmRequestDate'];
  $fac_name;
  $fac_id;
  $cust_name;
  $rate;
  $sqlfac = mysqli_query($con,"Select * from tblFacility where intFacilityID = '$facID'"); 
  while($fname=mysqli_fetch_array($sqlfac)){
  	$fac_name = $fname['strFacilityName'];
  	$fac_id= $fname['intFacilityID'];
  }
  $sqlcust = mysqli_query($con,"Select * from tblCustomer where intCustID = '$custID'"); 
  while($cname=mysqli_fetch_array($sqlcust)){
  	$cust_name = $cname['strCustName'];
  }

	$sqlprice =mysqli_query($con,"Select * from tblPrice where tblfacility_intFacilityID = '$fac_id' order by dtmEffectiveDate desc limit 1"); 
	  while($row=mysqli_fetch_array($sqlprice))
	  {
	  	$rate=$row['dblPrice'];
	  }
  echo "<tr><td>$cust_name</td>";
  echo "<td>$date</td>";
  echo " <td>$fac_name</td>";
  echo " <td>$start</td>";
  echo " <td>$end</td>";

  $price = ($end - $start)*$rate;
  echo " <td>₱$price</td>";
  echo " <td>$status</td>";
 } }  ?>