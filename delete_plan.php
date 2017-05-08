<?php
include 'connection.php';
$data = json_decode(file_get_contents("php://input"));
$id=$data->plan_id;
$tour_name=$data->tour_name;
$sql="Delete FROM tours where tour_id=$id";
if($conn->query($sql)===true){
	$sql2="Delete FROM plans where tour_name='$tour_name'";
	if ($conn->query($sql2)) {
		echo "success";
	}
}
else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>