<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign-up</title>
</head>
<body>
	<form action="mySignUp.php" method="POST">
		<input type="text" name="fname" placeholder="Enter First Name"><br>
		<input type="text" name="surname" placeholder="Enter Last Name"><br>
		<input type="text" name="username" placeholder="Enter Username"><br>
		<input type="password" name="password" placeholder="Enter Password"><br>
		<input type="submit" name="signup" value="SIGN-UP"><br>
		<br><a href='logout.php'>Back to login page!</a>
	</form>
<?php 
if(isset($_POST['signup']))
{
	$fname = $_POST['fname'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$connection = mysqli_connect('localhost','root','','abhinavprac');
	if(!$connection){die("Connection Error -> ".mysqli_connect_error());}

	$check = "SELECT * FROM `login` WHERE username = '$username'";
	$result = mysqli_query($connection,$check);
	$num = mysqli_num_rows($result);

	if($num==1)
	{
		echo "Username is Taken";
		header("refresh:2; url=mySignUp.php");
	}
	else
	{
		$sql = "INSERT INTO `login`(`fname`,`surname`,`username`,`password`) VALUES('$fname','$surname','$username','$password')";
		$result = mysqli_query($connection,$sql);
		if(!$result){die("Insertion Error -> ".mysqli_connect_error());}
		else{echo("Successfully Inserted"); header("refresh:1; url=myLogin.php");}
	}
}
?>
</body>
</html>