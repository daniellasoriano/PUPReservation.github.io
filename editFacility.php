<?php 
  ob_start();
  include('connection.php');
    if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    if(isset($_POST['update']))
    {
		
    $eFacName=$_POST['name'];
    $eFacDesc=$_POST['desc'];
    $eFacLoc=$_POST['loc'];
    $eFacStatus=$_POST['status'];
    $eVal=$_POST['prc'];

    $pricesql = "Select * from tblprice";
    $ctr_price = mysqli_query($con,$pricesql);
    $date=date('Y-m-d H:i:s');
    $ctr_price_row = mysqli_num_rows($ctr_price)+1;

    $updated=mysqli_query($con, "Update tblFacility SET 
          strFacilityName='$eFacName', strFacilityDesc='$eFacDesc', strFacilityStatus='$eFacStatus' , strFacilityLoc='$eFacLoc'
          WHERE intFacilityID='$id'");
    if($updated)
    {
    $sql4 = "Insert into tblPrice (intPriceID,dtmEffectiveDate,dblPrice,tblfacility_intFacilityID) values ('$ctr_price_row','$date','$eVal','$id')";
     mysqli_query($con, $sql4);    
  
        if($sql4)
          {
             echo "<script>alert('Successfully updated!'); window.location.href = 'facility.php';</script>";
          }
          else{
             echo "<script>alert('Error!') ; window.location.href = 'facility.php';</script>";
          }
    
    }
    else{
      echo "error";
    }
  }

  if(isset($_POST['cancel'])){
    header('Location:facility.php');
  }
  ob_end_flush();
 }
?>

<!DOCTYPE>
<html>
<head>
  <link rel="stylesheet" href="./css/bootstrap.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="./css/bootstrap.css"/>
  <link type="text/css" rel="stylesheet" href="./css/mystyle.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

<body style="background-color:lightgrey">
  <?php 
  if(isset($_GET['id']))
  {
  $id=$_GET['id'];
  $getselect=mysqli_query($con, "SELECT * FROM tblFacility WHERE intfacilityID='$id'");
  while($zzz=mysqli_fetch_array($getselect))
  {
    $id=$zzz['intFacilityID'];
    $name=$zzz['strFacilityName'];
    $desc=$zzz['strFacilityDesc'];
    $sql3 =mysqli_query($con, "Select * from tblPrice where tblfacility_intfacilityID = '$id' order by dtmEffectiveDate desc limit 1");  
    while($row=mysqli_fetch_array($sql3))
      $rate=$row['dblPrice'];

    $loc=$zzz['strFacilityLoc'];
    $status=$zzz['strFacilityStatus'];
?>

                     <!--header-->
                          <div class = "modal-header" style="background:#f0f5f5;" >
                           
                            <h3 class = "modal-title">Create Facility</h3>
                          </div>
                      <!--TABLE-->
                      <div style="margin-left: 40%;">
                      <form method = 'POST'>
                      
                          
                          <br>Name of Facility: 
                          <div class = "col-lg-3"><input required name="name" type="text" class="form-control" name="facname" value="<?php echo $name ?>"></div>
                          <br>Description:
                          <div class = "col-lg-3"><textarea name="desc" class="form-control" rows="5" id= "desc"><?php echo $desc ?></textarea></div>
                          <br>Location:
                          <div class = "col-lg-3"><input required name="loc" type ="text" class="form-control" id = "loc" value="<?php echo $loc ?>"></div>
                          <br>Price:
                          <div class = "col-lg-3"><input required name="prc" type ="text" class="form-control" id = "prc" value="<?php echo $rate ?>"></div>
                          <br>Status:
                          <div class = "col-lg-3">

                            Active <input type="radio" value = "Active" name="status" checked="checked">
                            Inactive <input type="radio" value = "Inactive" name="status">
                          </div>
                          <br>
                          <br>
                      
                          <div class="form-group"> 
                                
                                <div class="inline text-center ">
                                
                                  <button type="submit" class="btn btn-primary" name="update">
                                  <span class="glyphicon glyphicon-ok"></span> Sumbit
                                
                                  <button type="cancel" class="btn btn-primary" name="cancel">
                                  <span class="glyphicon glyphicon-remove"></span> Cancel
                                
                                </div>
                        
                     
                          </div>
                        </form>
                      </div>
</body>
<?php } }?>
</html>