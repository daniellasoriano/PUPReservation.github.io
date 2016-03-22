<!DOCTYPE html>
<html lang = "en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="css/facility.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
		<title>PUP-Create Facility</title>

		
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
				
				<li class="dropdown active">
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
				<font size="6">Facility</font>
			</div>
					
					<div class = "modal-body">
							<div class="inline text-right">
							<span class="glyphicon glyphicon-search"></span> <input type="text" name="search" placeholder="Search" value="">
							</div>
							
							<div class = "form-inline text-center">
							<button type="submit" class="btn btn-primary" data-toggle = "modal" data-target = "#popUpOccupied">
							<span class="glyphicon glyphicon-pencil"></span> Create
							</div>
							<div class = "modal fade" id = "popUpOccupied">
									<div class = "modal-dialog">
											<div class = "modal-content" style ="width:600px; left: 30px;">
											<!--header-->
													<div class = "modal-header" style="background:#f0f5f5;">
														<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
														<h3 class = "modal-title">Create Facility</h3>
													</div>
											<!--TABLE-->
											<div>
											<form method = 'POST' action = 'insertFacility.php'>
													<div class="container" style ="width:600px">
													<div class="table-responsive"> 
													<label>Name of Facility:</label>
													<input required name="name" type="text" class="form-control" name="facname" placeholder="Name of Facility" value="">
													<label>Description</label>
													<textarea name="desc" class="form-control" rows="5" id= "desc"></textarea>
													<label>Location:</label>
													<input required name="loc" type ="text" class="form-control" id = "loc">
													<label>Price:</label>
													<input required name="prc" type ="number" class="form-control" id = "prc" min = '50'>
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
																
																	<button type="submit" class="btn btn-primary" name="btnSave">
																	<span class="glyphicon glyphicon-ok"></span> Sumbit
																
																	<button type="cancel" class="btn btn-primary" data-dismiss="modal">
																	<span class="glyphicon glyphicon-remove"></span> Cancel
																
																</div>
												
													</div>
													</div>
													</div>
												</form>
											</div>
											</div>
									</div>
							</div>
					
					</div>
					
					<div class="row">   
									<div class="col-lg-12">
										<table class="table table-responsive well" id="dbtbl">
										 <thead bgcolor="#ffffff">
											<tr>
											<th>Name</th>
											<th>Description</th>
											<th>Location</th>
											<th>Price</th>
											<th>Status</th>
											<th>Actions</th>
											</tr>
										</thead>
								
				                            <tbody id="tableBody" name="tableBody">
												<?php view() ?>
				                            </tbody>
				                        </table>
                        			</div>
                      			</div>
					
					
		</div><!--container-->						
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
  $sql2 = mysqli_query($con,"Select * from tblfacility where strFacilityStatus = 'active' order by strFacilityName"); 

  while($zzz=mysqli_fetch_array($sql2))
  {
  $id=$zzz['intFacilityID'];
  $name=$zzz['strFacilityName'];
  $desc=$zzz['strFacilityDesc'];
  $loc=$zzz['strFacilityLoc'];
  $rate;
  $status=$zzz['strFacilityStatus'];

  echo "<tr><td>$name</td>";
  echo" <td>$desc</td>";
  echo" <td>$loc</td>";

  $sql3 =mysqli_query($con,"Select * from tblPrice where tblfacility_intFacilityID = '$id' order by dtmEffectiveDate desc limit 1"); 
	  while($row=mysqli_fetch_array($sql3))
	  {
	  	$rate=$row['dblPrice'];
	  }
  
  echo "<td>₱$rate/hr</td>";

  echo " <td>$status</td>";
?>
 

  <td>
  <a class="btn btn-default" href="editFacility.php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-pencil"></span></a>
    <?php
      if($status=='Inactive')
      { 
    	?>
    	<a class="btn btn-default" href="deletefacility.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to activate this record?');"><span class="glyphicon glyphicon-ok "></span></a>
   	  	<?php
   	  }
   	  else if($status=='Active')
   	  {
   	  	?>
   	 	 <a class="btn btn-default" href="deleteFacility.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to deactivate this record?');"><span class="glyphicon glyphicon-remove "></span></a> 	
   	  	<?php
   	  }
    ?>
  </td>

<?php } }  ?>