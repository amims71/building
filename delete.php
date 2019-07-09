<?php

include 'inc/config.php';

$postToken=test_input($_POST['utoken']);

if($_POST['pc']==1){
	$utoken=$_SESSION['utoken'];
} else{
	$uid=test_input($_POST['uid']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];
}

if ($postToken==$utoken) {
	$duid=test_input($_POST['duid']);
	$sql="DELETE FROM users WHERE uid= '".$duid."'";
	if (mysqli_query($con,$sql)) {
		if($_POST['pc']==1){
			header("Location: view_user.php");
		}else{
			echo "deleted";
		}
	}
}
?>