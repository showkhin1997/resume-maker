<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="register.css">
</head>

<body>
<a href="index.php">Home</a>  <a href="login.php">Log In</a><br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "<br/> <br/><h1>All fields should be filled. Either one or many fields are empty.</h1><br/> <br/>";
		echo "<br/>";
		echo "<a href='register.php'> <br/> <br/> <br/><h1>Go back</h1><br/> <br/> <br/></a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO user(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("<br><h2>Could not use the same username !.</h2><br>");
			
		echo "<br/> <br/> <br/> <h1>Registration successfully</h1> <br/> <br/> <br/>";
		echo "<br/> <br/> <br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
<br><br>
	<p><font size="10">Register Please</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Full Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input  type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
