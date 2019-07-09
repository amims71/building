<?php

//session_start();
include 'inc/config.php';

$postToken = test_input($_POST['utoken']);

$uid=test_input($_POST['uid']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];

if ($postToken == $utoken) {
    $completeTime = time();
    //$assignTime = ;
    $tid=test_input($_POST['tid']);

    $sql="UPDATE ticket  SET completeTime = '$completeTime', status = 'Completed' WHERE tid= '$tid'";

    if (mysqli_query($con, $sql)) {
        echo 'success';
    } else {
        echo "error";
    }

} else{
    echo "wrong user";
}

?>