<?php
// echo md5(123);
include 'inc/config.php';

$postToken=test_input($_POST['utoken']);
$uid=test_input($_POST['uid']);
$status=test_input($_POST['status']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];


if ($utoken==$postToken) {
    
	if($status=="All"){
	    $sql="SELECT * FROM ticket";
	} else if($status=="Open"){
	    $sql="SELECT * FROM ticket WHERE status='Assigned' OR status='Not Assigned' ";
	} else{
	    $sql="SELECT * FROM ticket WHERE status='".$status."'";
	}
	$result= @mysqli_query(@$con,$sql);
	$js=array();
	while ($row = mysqli_fetch_assoc($result)) {
       array_push($js,$row);
    }
     echo json_encode($js);
}

?>