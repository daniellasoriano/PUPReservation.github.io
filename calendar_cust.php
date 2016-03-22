<!DOCTYPE html>
<html lang = "en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.0/css/bootstrap-combined.min.css" rel="stylesheet" />
		<link href="//arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.css" rel="stylesheet" />
		<link href="http://arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.print.css" rel="stylesheet" />
		
		<!-- SCRIPTS -->
		<script class="cssdesk" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
		<script class="cssdesk" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js" type="text/javascript"></script>
		<script class="cssdesk" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.0/js/bootstrap.min.js" type="text/javascript"></script>
		<script class="cssdesk" src="//arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
		<script src ="js/calendar.js" type="text/javascript"></script>


		<link rel="stylesheet" href="css/reservation.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
		<title>PUP-Calendar Schedule</title>

		
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
				<a href ="home_cust.php">HOME</a>
				</li>
				
				
				<li class="dropdown active">
				<a href ="calendar_cust.php">TRANSACTION</a>
				</li>
				
			
				
				
			  </ul>
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
			</div>
		</nav>

	<div class = "modal-dialog">
			<div class = "modal-content ">
	
				<div class = "modal-header" style="background:#f0f5f5;">
					<font size="6">Calendar Schedule</font>
					
				</div>
				<div class="modal-body">
					<button type="submit" class="btn btn-primary" data-toggle = "modal" data-target = "#createPopup">
					Create New
					</button>
					<div id="calendar"></div>

					<div class = "modal fade" id = "createPopup" style="position: fixed; width: 600px; max-height:500px;">
									
											<!--header-->
													<div class = "modal-header" style="background:#f0f5f5;">
														<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
														<font size="6">Create Reservation</font>

														
													</div>
					<div form = "form-horizontal">
						<form action='insertreservfac_cust.php' method='post'>
							<label>Reservation No.</label>
							<?php
							require ('connection.php');
							$getselect=mysqli_query($con, "select * FROM tblReservation");
							$num_rows = mysqli_num_rows($getselect)+1;
							?>
							<input readonly type="text" class="form-control" name="resno" value = "0000<?php echo $num_rows ?>">
							<label>Student Number</label>
							<input required class="form-control" id= "studno" name ="studno" placeholder = "2013-01784-MN-0" pattern="[0-9]+\-[0-9]+\-[a-z]{2,3}+\[a-z]{1}"></input>
							<label>Customer's Name</label>
							<input required type ="text" class="form-control" id = "name" name="name"><br>
							
							<label>Course:</label>
							<input required type ="text" class="form-control" id = "name" name="course">
							
							<label>Year:</label>
							<input required type ="number" class="form-control" id = "name" name="year">
							
							<label>Section:</label>
							<input required type ="text" class="form-control" id = "name" name="sec">
							
							<label>Contact No.</label> 
							<input required type="text" class="form-control" name="conno">
							<label>Email Address</label>
							<input required class="form-control" name = "email" id= "email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}"></input><br>
							
							<label>Facilities:</label>
							<select required class="form-control" id="sel2" name="facility">
							<?php 
								$facility = mysqli_query($con, "Select * from tblFacility");
								while($row = mysqli_fetch_array($facility)){
									$fac = $row['strFacilityName'];
									echo "<option value='$fac'>$fac</option>";
								}
							?>
							</select>
							
							
							<br><label>Date:</label>
							<input required type ="date" class="form-control" id = "date" name= "dor" placeholder ="mm/dd/yyyy" min="<?php echo date('Y-m-d'); ?>">
							<label>Start Time: (include setup)</label>
							<input required type ="time" class="form-control" id = "stime" name= "stime" placeholder ="11:00" Min = "03:00 AM" MAx = "9:00 PM">
							<label>End Time: (include breakdown)</label>
							<input required type ="time" class="form-control" id = "etime" name= "etime" placeholder ="13:00" Min = "04:00 AM" MAx = "10:00 PM">
							

							<label>Status:</label>
													<div class="input-group">
													  <span class="input-group-addon">
														Active <input type="radio" value = "Active" name="status" checked="checked">
														Inactive <input type="radio" value = "Inactive" name="status">
													</div><!-- /input-group -->
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

				<div class = "modal fade" id = "calendarPopup" style="position: fixed; width: 600px; max-height:500px;">
									
											<!--header-->
													<div class = "modal-header" style="background:#f0f5f5;">
														<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
														<font size="6">Reservations</font>

															<div class="row">   
															<div class="col-lg-12">
																<table class="table table-responsive well" id="dbtbl">
																 <thead bgcolor="#ffffff">
																	<tr>
																	<th>Facility</th>
																	<th>Rented by</th>
																	<th>Start</th>
																	<th>End</th>
																	<th>Total Amount</th>
																	<th>Status</th>
																	<th>Action</th>
																	
																	</tr>
																</thead>
														
										                            <tbody id="tableBody" name="tableBody">
																		<?php view() ?>
										                            </tbody>
										                        </table>
						                        			</div>
						                      			</div>
																				
													</div>
			</div><!--BODY-->
</div>
</div> <!--DIALOG-->
	
			
		

		
		
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

 $cust_ID=$_SESSION['usercust'];

  $sqlreserv = mysqli_query($con, "Select * from tblreservation where strReservationStatus = 'active' order by timReservationStart"); 

  while($zzz=mysqli_fetch_array($sqlreserv))
  {
   if($zzz['intCustID_FK'] == $cust_ID){
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
  echo "<tr><td>$fac_name</td>";
  echo " <td>$cust_name</td>";
  echo " <td>$start</td>";
  echo " <td>$end</td>";

  $price = ($end - $start)*$rate;
  echo " <td>₱$price</td>";
  echo " <td>$status</td>";
?>
 

  <td>
  <div form="form-inline">
  <form method = 'post'>
  <input type = "submit" name="btnCancel" value="Cancel">
  </form>

  

  <?php 

  	if(isset($_POST['btnCancel'])){
  	  $eStatus="Cancelled";
      $delete=mysqli_query($con, "Update tblReservation SET strReservationStatus='$eStatus' 
      WHERE intReservationID='$id'"); 
  	}
  ?>
  
	<a class="btn btn-default" href="pdf2.php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-print"></span></a>
</div>
  </td></tr>

<?php } } } ?>