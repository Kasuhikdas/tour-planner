<?php
include 'connection.php';
	$id='';
	$type='';
	$numperson= '' ;
	$jdate='';
	$source= '' ;
	$total=''; 
	$date= date("Y-m-d");
	$name='';
	$email='';
session_start();
if (!isset($_SESSION['Name'])) {
	echo  $_SERVER['HTTP_REFERER'];
	header('location:'.$_SERVER['HTTP_REFERER'].'&pop=2&msg=Need to login before book');

}
else if ($_GET['id']=='' && $_GET['type']=='' && $_GET['numperson']=='' && $_GET['date']='' && $_GET['source'] && $_GET['total'] ) {
	# code...
}
else
{
	$id=$_GET['id'];
	$type=$_GET['type'];
	$numperson= $_GET['numperson'] ;
	$jdate=$_GET['date'];
	$source= $_GET['source'] ;
	$total=$_GET['total']; 
	
	$name=$_SESSION['Name'];
	$email=$_SESSION['Email'];
	
	$sql="INSERT INTO `booking`(`plan_id`, `amount`, `date_of_booking`, `date_of_journey`, `source`, `email`, `name`, `no_of_person`, `type`) VALUES ($id,$total,'$date','$jdate','$source','$email','$name','$numperson','$type')" ;
	if ($conn->query($sql)===true) {
		header('Location:printTicket.php?email='.$email.'');
	}
	else
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>