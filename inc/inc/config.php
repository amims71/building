<?php
$token=@test_input($_POST['token']);
if ($token=='123') {
	$con=mysqli_connect("localhost","digicondevhub_building_user","id}hmOt(qLr=","digicondevhub_building");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>