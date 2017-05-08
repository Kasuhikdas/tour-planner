<?php

	include 'connection.php';
	$name=$_POST['name'];
	echo $_POST['name'];
	$email=$_POST['email'];
	echo $_POST['email'];
	$password=$_POST['password'];
	$confirm=$_POST['confirm_password'];
	if ($password==$confirm) {
			$sql="SELECT * from user where email='$email'";
			$result=$conn->query($sql);
			$numrow=mysqli_num_rows($result);
			if ($numrow==0) {
				$sql2="INSERT INTO `user`(`email`, `Name`, `password`)  values('$email','$name','password')";
				if ($conn->query($sql2)=== true) {
					session_start();
					$_SESSION['Name']=$name;
					$_SESSION['Email']=$email;
					header('location:'.$_SERVER['HTTP_REFERER']);
				}
				else
				{
					header('location:'.$_SERVER['HTTP_REFERER'].'&pop=1&msg=some error has occured please try again');
				}
			}
			else{
				header('location:'.$_SERVER['HTTP_REFERER'].'?msg=User already exist&pop=1');
			}

	}	
	else
	{
		header('Location:'.$_SERVER['HTTP_REFERER'].'?msg=Password did not matched&pop=1');
	}
?>