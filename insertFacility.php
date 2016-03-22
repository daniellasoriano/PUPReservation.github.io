<?php 

 ob_start();
  require("connection.php");
  if(isset($_POST['btnSave']))
  {

    $result = mysqli_query($con, "Select * From tblfacility");

    $id_ctr = mysqli_num_rows($result)+1;
  
    $pricesql = "Select * from tblprice";
    $ctr_price = mysqli_query($con, $pricesql);
    $date=date('Y-m-d H:i:s');
    $ctr_price_row = mysqli_num_rows($ctr_price)+1;
    

    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $loc=$_POST['loc'];
    $status=$_POST['status'];
    $prc=$_POST['prc'];

    $dupesql = mysqli_query($con, "Select * FROM tblfacility where strFacilityName = '$name'");

    if (mysqli_num_rows($dupesql) > 0) {
       echo "<script type='text/javascript'>alert('That information is already known. Press backspace to return');</script>";
       echo '<input action="action" type="button" value="Back" onclick="history.go(-1);" />';
    }
    else 
    {
      echo "$id_ctr, $name, $desc, $loc, $status";
      $sql = mysqli_query($con, "Insert into tblfacility (intFacilityID,strFacilityName,strFacilityDesc,strFacilityLoc,strFacilityStatus) values('$id_ctr','$name','$desc','$loc','$status')");      
    
      if($sql)
      {
          $sql4 =  mysqli_query($con, "Insert into tblPrice (intPriceID,dtmEffectiveDate,dblPrice,tblfacility_intFacilityID) values ('$ctr_price_row','$date','$prc','$id_ctr')");    

          echo "<script>alert('Successfully Created!') ; window.location.href = 'facility.php'</script>";
      }
      else
      {
        echo "<script>alert('Error! Something went wrong') ; window.location.href = 'facility.php'</script>";
      }
    }
  }
 mysqli_close($con);
 ob_end_flush();

?>