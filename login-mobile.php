<?php

session_start();
include 'inc/config.php';
if (isset($_POST['email'])&&isset($_POST['pass'])) {
    if (!empty($_POST['email'])&&!empty($_POST['pass'])) {
        $email=test_input($_POST['email']);
        $password=test_input($_POST['pass']);
        $sql="SELECT * FROM users WHERE email='".$email."'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $pass=$row['pass'];
        if (md5($password)==$pass) {
            $utoken=md5(time());
            $sql="UPDATE users  SET utoken = '$utoken' WHERE uid= '".$row['uid']."'";
            mysqli_query($con,$sql);
            $sql2="SELECT * FROM users WHERE uid= '".$row['uid']."'";
            $result2=mysqli_query($con,$sql2);
            $row2=mysqli_fetch_assoc($result2);
            if(@$_POST['pc']==1){
                $_SESSION['uid']=$row2['uid'];
                $_SESSION['utoken']=$row2['utoken'];
                header("Location: index.php");
            } else{
                echo json_encode($row2);
            }
        } else{
            echo "pass";
        }
    }else{
        echo "post";
    }
} else{
    echo "set";
}

?>