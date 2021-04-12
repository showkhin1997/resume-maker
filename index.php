<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="index.css">
</head>

<body>
	<div id="header">
		<h1>Welcome to RESUME maker!</h1> <br>
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		<h4>Welcome <h2> <?php echo $_SESSION['name'] ?> !</h2> <br> <a href='logout.php'>Logout</a></h4><br/><br><br>
		<br/>
		<a href='resume.html'><h4><b>"View Sample resume here"</b></h4></a>
		<br/><br/>
	<?php	
	} else {
		echo "<h4>Login Here... <b><a href='login.php'>Login</a></b></h4><br/><br/>";
		echo "<h4>If you have no Account?Then..  <b><a href='register.php'>Register</a></b></h4>";
	}
	?>
	<br>
	<div id="footer">
		
		
	</div>
</body>
</html>
