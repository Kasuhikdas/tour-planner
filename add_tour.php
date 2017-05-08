<?php
include 'connection.php';
$data = json_decode(file_get_contents("php://input"));
$place=$data->tname;
$image=$data->image;

$tourname=$data->tourname;


$sql2="SELECT * from tours where Name='$place'";
$result = $conn->query($sql2);
$numrow=mysqli_num_rows($result);
if ($numrow <= 0) {

	$sql = "INSERT INTO tours (location,tour_name,image)
	VALUES ('$place','$tourname','$image')";

	

	if ($conn->query($sql) === TRUE) {
   		echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else
{
	echo "Place Exist";
}
$conn->close();
?>
