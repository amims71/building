<?php

include 'inc/config.php';

$postToken=test_input($_POST['utoken']);
$uid=test_input($_POST['uid']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];
if($_POST['pc']==1){
	$utoken=$_SESSION['utoken'];
}

if ($postToken==$utoken) {
	$name=test_input($_POST['name']);
	$email=test_input($_POST['email']);
	$pass=md5(test_input($_POST['pass']));
	$phone=test_input($_POST['phone']);
	$type=test_input($_POST['type']);
	$sql="INSERT INTO users VALUES('','$name','$email','$phone','$pass','','$type')";
    $sql2="SELECT * FROM users WHERE email='".$email."' ";
    $r=mysqli_query($con,$sql2);
    $row=mysqli_fetch_row($r);
    if ($row[0]>0) {
    	echo "exist";
    } else{
    	if (mysqli_query($con,$sql)) {
	    	$uid=mysqli_insert_id($con);
	    	if ($type==2) {
	    		$floor=test_input($_POST['floor']);
	    		$cname=test_input($_POST['cname']);
	    		$sql="INSERT INTO company VALUES('','$cname','$uid','$floor')";
	    		if (mysqli_query($con,$sql)) {
	    			if(@$_POST['pc']==1){
	    				header("Location: view_user.php");
	    			} else{
	    				echo "success";
	    			}
	    		} 

	    	} else{
	    		if(@$_POST['pc']==1){
    				header("Location: view_user.php");
    			} else{
    				echo "success";
    			}
	    	}
	    } 
    }


} 

?>