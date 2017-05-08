<?php
include 'connection.php';
$email=$_POST['email'];
$password=$_POST['password'];
$sql="SELECT * from user where email='$email' and password='$password'";
$result=$conn->query($sql);
$numrow=mysqli_num_rows($result);
	if ($numrow==1) {
		session_start();
		while ($row=$result->fetch_assoc()) {
			$_SESSION['Name']=$row['Name'];
			$_SESSION['Email']=$email;
		}
		
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
	else
	{
		header('location:'.$_SERVER['HTTP_REFERER'].'?&pop=2&msg=Invalid Credentials');
	}



/*
<?php
include 'connection.php';
 $return_arr = array();
$data = json_decode(file_get_contents("php://input"));
$email=$data->email;
$password=$data->password;
$sql="SELECT * from user where email='$email' and password='$password'";
$result=$conn->query($sql);
$numrow=mysqli_num_rows($result);
	if ($numrow==1) {
		session_start();
		while ($row=$result->fetch_assoc()) {
			$_SESSION['Name']=$row['Name'];
			$_SESSION['Email']=$row['Email'];
		}
			$return_arr="Success";	
	}
	else
	{
		$return_arr="Invalid Email or Password";
	}
echo json_encode($return_arr);

?>*/
?>
