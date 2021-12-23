<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="" method="POST">
		<table>
			<tr>
				<td>
					<input type="text" name="username" placeholder="Enter your username">
				</td>
				<td>
					<input type="password" name="password" placeholder="Enter your password">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="login" value="login">
				</td>
			</tr>
			<tr>	
				<td>
					<br><a href="mySignUp.php">New user? Click here!</a>
				</td>
			</tr>
		</table>
	</form>
	<?php
if(isset($_POST['login']))
{
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$connection = mysqli_connect('localhost','root','','abhinavprac');
	if(!$connection){die("Connection Error -> ".mysqli_connect_error());}

	$sql = "SELECT * FROM `login` WHERE username = '$username' && password = '$password'";
	$result = mysqli_query($connection, $sql);
	$num = mysqli_num_rows($result);
	if($num==1)
	{
		echo "LOGIN SUCCESSFUL";
		header("refresh:1, url=myHome.php");
	}
	else
	{
		echo "<script>alert('incorrect id or password')</script>";
		echo "<script>location.href='myLogin.php'</script>";
	}
}


?>
</body>
</html>

