<?php


include 'inc/config.php';

$postToken = test_input($_POST['utoken']);

$uid=test_input($_POST['uid']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];

if ($postToken == $utoken) {
    $title = test_input($_POST['title']);
    $description = test_input($_POST['description']);
    //$assignTime = ;
    $curTime=time();
    $type = test_input($_POST['type']);
    $image= test_input($_POST['damageImage']);
	$target_dir = "uploads/";
    $imgName=$curTime.$uid.".png";
    $target_file = $target_dir . $imgName;
/*    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["damageImage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["damageImage"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    $uploadOk = 1;

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {*/
        if (file_put_contents($target_file, base64_decode($image))) {
            $sql = "INSERT INTO ticket  VALUES('','$title','$description','$type','$imgName','','','$uid','Not Assigned','','$curTime')";
            if (mysqli_query($con, $sql)) {
                echo 'success';
            } else {
                echo "error";
            }
/*            echo "Success";
        }*/ }else{
            echo "not uploaded1";
        }/*
    }
*/

} else{
    echo "wrong user";
}


?>