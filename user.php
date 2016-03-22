<?php
require ('connection.php');
//session_start();
if(isset($_POST['btnLogin']))
{
	$user=$_POST['user'];
	$pwd=$_POST['pwd'];
	
	$sql=mysqli_query($con,"Select * from tblusers where username='$user' and password='$pwd'") or die(mysqli_error());;
	$num=mysqli_num_rows($sql);
	$row=mysqli_fetch_array($sql);
	
	if($num>0){
		session_start();
		isset($_SESSION['user']) ? $_SESSION['user']: "";
		isset($_SESSION['pwd']) ? $_SESSION['pwd']: "";
		$_SESSION['name']=$row['fullname'];
		$_SESSION['user']=$row['username'];
		$_SESSION['pwd']=$row['password'];
		$_SESSION['useradmin']=$row['intAdminID'];
		$_SESSION['usercust']=$row['intCustIDFK'];
		
		if(($_SESSION['user']==$user) && ($_SESSION['pwd']==$pwd) && ($_SESSION['useradmin'] == 1)){
			header("location:home.php");
		}
		else if(($_SESSION['user']==$user) && ($_SESSION['pwd']==$pwd) && ($_SESSION['usercust'] > 0)){
			header("location:home_cust.php");
		}
	}
	 else{
			header("location:index.php");
		 }
}
?>