<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Personal Information</title>
	<link rel="stylesheet" href="personalInformation.css">
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
	$designation = $_POST['designation'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$home = $_POST['home'];
    $profile = $_POST['profile'];
    $image = $_POST['image'];
	$userId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($firstName) || empty($lastName) || empty($designation) || empty($phone) || empty($email) || empty($home) || empty($profile) || empty($image)) {
				
		if(empty($firstName)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}

        if(empty($lastName)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($designation)) {
			echo "<font color='red'>Designation field is empty.</font><br/>";
		}
		
		if(empty($phone)) {
			echo "<font color='red'>Phone field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($home)) {
			echo "<font color='red'>Home Adress field is empty.</font><br/>";
		}

        if(empty($profile)) {
			echo "<font color='red'>Home Adress field is empty.</font><br/>";
		}

        if(empty($image)) {
			echo "<font color='red'>Image field is empty.</font><br/>";
		}

		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO personal_information(firstName, lastName, designation, phone, email, home, profile, image, user_id) VALUES('$firstName', '$lastName','$designation','$phone', '$email', '$home', '$profile', '$image','$userId')");
		
		//display success message
		echo "<br><font color='green'>Data added successfully.<br>";
		echo "<br/><a href='personalInformationView.php'>View Personal Information</a>";
	}
}
?>



	| <a href="index.php">Home</a> |  <a href="addExperience.php">Add Experience</a> |  <a href="logout.php">Logout</a>
	<br/><br/>

	<form action="personalInformation.php" method="post" name="form1">
		<table width="25%" border="0">
			<br><h2>Add Personal Information</h2><br>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="firstName"></td>
			</tr>
            <tr>
				<td>Last Name</td>
				<td><input type="text" name="lastName"></td>
			</tr>
            <tr>
				<td>Designation</td>
				<td><input type="text" name="designation"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phone"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Adress</td>
				<td><textarea type="text" name="home"></textarea></td>
			</tr>
            <tr>
				<td>Profile</td>
				<td><textarea type="text" name="profile"></textarea></td>
			</tr>
            <tr>
				<td>Image Link</td>
				<td><textarea type="text" name="image"></textarea></td>
			</tr>
            <tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add">  <a href="addExperience.php"> Add Experience</a></td>
			</tr>
			
		</table>
        
	</form>



</body>
</html>
