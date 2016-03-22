<?php 
  ob_start();
  include('connection.php');
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $getselect=mysqli_query($con, "Select * FROM tblFacility WHERE intFacilityID='$id'");
    while($zzz=mysqli_fetch_array($getselect))
    {
      $stat=$zzz['strFacilityStatus'];
    
    if($stat=='Active')
    {
      $eStatus="Inactive";
      $delete=mysqli_query($con, "Update tblFacility SET strFacilityStatus='$eStatus' 
      WHERE intFacilityID='$id'"); 
    }
    else if($stat=='Inactive')
    {
      $eStatus='Active';
      $delete=mysqli_query($con, "Update tblFacility SET strFacilityStatus='$eStatus' 
      WHERE intFacilityID='$id'");
    }
  }
    
    if($delete)
    {
        header("Location:facility.php");
    }
    else
    {
        echo mysql_error();
    }
  }
  ob_end_flush();
?>