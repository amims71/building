<?php

//session_start();
include 'inc/config.php';


	function sendMessage($uid,$title){
		
		$fields = array(
			'app_id' => "d90bd06e-42d3-4151-8dcb-e816eb505772",
			'filters' => array(array("field" => "tag", "key" => "uid", "relation" => "=", "value" => $uid)),
			'contents' => array("en" => $title),
			'headings' => array("en" => 'New Job Assigned')
		);
		
		$fields = json_encode($fields);
    // 	print("\nJSON sent:\n");
    // 	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic MDZjM2I0NjctMmNjNC00N2Y4LTkwYTQtZDY0NzZiYmEwNTQ1'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	$response = sendMessage();
	$return["allresponses"] = $response;
	$return = json_encode( $return);
	
// 	print("\n\nJSON received:\n");
// 	print($return);
// 	print("\n");




$postToken = test_input($_POST['utoken']);

$uid=test_input($_POST['uid']);
$sql="SELECT utoken FROM users WHERE uid='".$uid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$utoken=$row['utoken'];

if ($postToken == $utoken) {
    $assignedToUid = test_input($_POST['assignedToUid']);
    //$assignTime = ;
    $tid=test_input($_POST['tid']);
    if($_POST['pc']==1){
        $query="SELECT name FROM users WHERE uid='".$assignedToUid."' ";
        $res=mysqli_query($con,$query);
        $assignName=mysqli_fetch_assoc($res);
        $assignedToName=$assignName['name'];
        }else{
            $assignedToName = test_input($_POST['assignedToName']);

        }
    $sql="UPDATE ticket  SET assignedToUid = '$assignedToUid', assignedToName ='$assignedToName', status = 'Assigned' WHERE tid= '$tid'";

    if (mysqli_query($con, $sql)) {
        sendMessage($assignedToUid,"You are asigned to a job");
        if($_POST['pc']==1){
            header("Location: view_ticket.php");
        }else{
            echo "success";
        }
    } else {
        echo "error";
    }

} else{
    echo "wrong user";
}

?>