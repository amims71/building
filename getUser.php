<?php
// echo md5(123);
include 'inc/config.php';

$postToken=test_input($_POST['utoken']);
$uid=test_input($_POST['uid']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];
$uid=test_input($_POST['fid']);

if ($utoken==$postToken) {
	$sql="SELECT uid,name,email,phone,type FROM users WHERE uid= '$uid'";
	$result= @mysqli_query(@$con,$sql);
	@$row=mysqli_fetch_assoc($result);
	echo json_encode($row);
}

?>