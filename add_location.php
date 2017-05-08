<?php
	include 'connection.php';
	$data = json_decode(file_get_contents("php://input"));
$place=$data->tour_place;
$plan=$data->tname;
$location=$data->location;
$duration=$data->duration;
$price=$data->price;

$sql="INSERT INTO plans (tour_name, places, duration,price) VALUES ('$plan','$location','$duration',$price)";
if ($conn->query($sql) === TRUE) {
   		echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>