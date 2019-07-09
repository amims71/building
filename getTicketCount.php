<?php
// echo md5(123);
include 'inc/config.php';

$postToken=test_input($_POST['utoken']);
$uid=test_input($_POST['uid']);
// $status=test_input($_POST['status']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];


if ($utoken==$postToken) {
    if($uid==1){
    	$sqlAll="SELECT * FROM ticket";
    	$sqlCompleted="SELECT * FROM ticket WHERE status='Completed'";
    	$sqlAssigned="SELECT * FROM ticket WHERE status='Assigned'";
    	$sqlNotAssigned="SELECT * FROM ticket WHERE status='Not Assigned'";
    } else{
    	$sqlAll="SELECT * FROM ticket WHERE assignedToUid='".$uid."' OR createdByUID='".$uid."'";
    	$sqlCompleted="SELECT * FROM ticket WHERE status='Completed' AND (assignedToUid='".$uid."' OR createdByUID='".$uid."')";
    	$sqlAssigned="SELECT * FROM ticket WHERE status='Assigned' AND (assignedToUid='".$uid."' OR createdByUID='".$uid."')";
    	$sqlNotAssigned="SELECT * FROM ticket WHERE status='Not Assigned' AND (assignedToUid='".$uid."' OR createdByUID='".$uid."')";
    }
	
	$resultAll= @mysqli_query(@$con,$sqlAll);
	$resultCompleted= @mysqli_query(@$con,$sqlCompleted);
	$resultAssigned= @mysqli_query(@$con,$sqlAssigned);
	$resultNotAssigned= @mysqli_query(@$con,$sqlNotAssigned);
	
	$js->all=mysqli_num_rows($resultAll);
	$js->completed=mysqli_num_rows($resultCompleted);
	$js->assigned=mysqli_num_rows($resultAssigned);
	$js->notAssigned=mysqli_num_rows($resultNotAssigned);
	$js->open=$js->all-$js->completed;
	
	
	
	
     echo json_encode($js);
}

?>