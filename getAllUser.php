<?php
// echo md5(123);
include 'inc/config.php';

$postToken=test_input($_POST['utoken']);
$uid=test_input($_POST['uid']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];

$type=test_input($_POST['type']);
if ($type=='2') {
	$sql="SELECT users.name as name,type, email,phone, users.uid as uid, company.name as cname, floor FROM users,company WHERE type= '".$type."' AND users.uid=company.uid ";
} else{
	$sql="SELECT name,type, email,phone, uid FROM users WHERE type= '".$type."' ";
}

if ($utoken==$postToken) {
	// $sql="SELECT name,type, uid FROM users WHERE type= '".$type."' ";
	$result= @mysqli_query(@$con,$sql);
	$js=array();
	while ($row = mysqli_fetch_assoc($result)) {
       array_push($js,$row);
    }
     echo json_encode($js);
}

?>