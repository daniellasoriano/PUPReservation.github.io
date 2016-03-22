<?php
include('connection.php');
 if(isset($_GET['id']))
  {
 $id=$_GET['id'];

  $sqlreserv = mysqli_query($con, "Select * from tblreservation where intreservationID = '$id' order by timReservationStart"); 

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

  $price = ($end - $start)*$rate;

require("fpdf/fpdf.php");
$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',25);
$pdf->Write(20,'PAYMENT VOUCHER ');
$pdf->Line(10,30,200,30);

$pdf->SetFont('Arial','I',13);
$pdf->Text(11, 48, 'Reservation No: ');
$pdf->Text(53, 48, $id);

$pdf->Text(130, 48, 'Date: ');
$pdf->Text(149, 48, $reqdate);

$pdf -> SetFont('Arial', 'I', 13);
$pdf -> SetY(55); 
$pdf->Cell(185,15,'Customer Name:',1);
$pdf->Text(55, 64, $cust_name);

$pdf -> SetY(70);
$pdf->Cell(185,15,'Rented Facility:',1,0);
$pdf->Text(55, 78, $fac_name);

$pdf -> SetY(85);
$pdf->Cell(185,15,'Total amount of: Php',1,1);
$pdf->Text(59, 94, $price );

$pdf -> SetY(100);
$pdf->Cell(92.5,35,'Customers Signature:',1,1);


$pdf -> SetY(100);
$pdf -> SetX(102.3);
$pdf->Cell(92.5,35,'Received by:',1);

$pdf->output();


}
}
?>
