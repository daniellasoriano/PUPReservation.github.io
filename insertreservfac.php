<?php 
require('connection.php');
if (isset($_POST['btnConfirm']))
{
	$id = $_POST['resno'];
	$studno = $_POST['studno'];
	$name = $_POST['name'];
	$course = $_POST['course'];
	$year = $_POST['year'];
	$sec = $_POST['sec'];
	$contact = $_POST['conno'];
	$email = $_POST['email'];
	$fac = $_POST['facility'];
	$reservdate = $_POST['dor'];
	$dor = date('Y-m-d H:m:i');
	$stime = $_POST['stime'];
	$etime = $_POST['etime'];
	$stat = $_POST['status'];

	$faciID = 0;
	$studId = 0;
	
	$facili = mysqli_query($con, "Select * from tblfacility");
			while($row = mysqli_fetch_array($facili)){
			$facility = $row['strFacilityName'];
				if($fac == $facility){
					$faciID = $row['intFacilityID'];
				}
		
	}

	echo "'$studId','$name','$studno','$course', '$year', '$sec', '$contact', '$email'";
	
	$sql = mysqli_query($con, "Select * from tblcustomer where strCustName = '$name' and strCustStudID = '$studno'");
	$dup = mysqli_num_rows($sql);
	if($dup > 0){

		while($stud = mysqli_fetch_array($sql)){
			$studId = $stud['intCustID'];
		}
	}
	else{
		$sql = mysqli_query($con, "Select * from tblcustomer");
		$studId = mysqli_num_rows($sql)+1;
		$sql4 = mysqli_query($con,"Insert into tblcustomer (intCustID, strCustName, strCustStudID, strCustCourse, strCustYear, strCustSec, intCustNumber, strCustEmail)
			values ('$studId','$name','$studno','$course', '$year', '$sec', '$contact', '$email')");
		echo "'$studId','$name','$studno','$course', '$year', '$sec', '$contact', '$email'";
	}
	

	$sql2 = mysqli_query($con, "Insert into tblreservation (intReservationID, dtmReservationDate, timReservationStart, timReservationEnd, strReservationStatus, intCustID_FK, intFacilityID_FK, dtmRequestDate)
		 values ('$id', '$reservdate', '$stime', '$etime', '$stat','$studId', '$faciID', '$dor')");

	if($sql){
		echo "<script>alert('Successfully Created!') ; window.location.href = 'calendar.php'</script>";
	}
}


?>