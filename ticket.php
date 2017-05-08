<?php
include 'connection.php';
$email=$_GET['email'];
$id='';
$row='';
$row2='';
$return_arr2 = array();
$sql2="SELECT * FROM `booking` WHERE email='$email' Order by booking_id desc limit 1";
		$result2=$conn->query($sql2);
		$numrow=mysqli_num_rows($result2);
		if ($numrow) {
			while ($row=$result2->fetch_assoc()) {
					$id=$row['plan_id'];
					$sql3="SELECT tour_name,location From tours where tour_id=$id";
					$result3=$conn->query($sql3);
					$numrow2=mysqli_num_rows($result3);
					if ($numrow2) {
						$row2=$result3->fetch_assoc();
						$return_arr=array($row+$row2);
						
					}
			}
			
			//$return_arr=$row2;
			echo json_encode($return_arr);
		}
?>