<?php
$token=@test_input($_POST['token']);
if ($token=='123') {
	if (!isset($_SESSION)) {
		session_start();
		// echo "started";
	}
	$con=mysqli_connect("localhost","digicondevhub_building_user","id}hmOt(qLr=","digicondevhub_building");
} else{
	session_start();
	echo "error1";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>