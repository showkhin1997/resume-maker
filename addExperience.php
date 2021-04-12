<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Experiance</title>
	<link rel="stylesheet" href="experience.css">
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$company_name = $_POST['company_name'];
	$end_date = $_POST['end_date'];
	$position = $_POST['position'];
	$address = $_POST['address'];
	$description = $_POST['description'];
	$userId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($company_name) || empty($end_date) || empty($position) || empty($address) || empty($description)) {
				
		if(empty($company_name)) {
			echo "<font color='red'>Company Name field is empty.</font><br/>";
		}
		
		if(empty($end_date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}
		
		if(empty($position)) {
			echo "<font color='red'>Position field is empty.</font><br/>";
		}

		if(empty($address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}

		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}

		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO experience(company_name, end_date, position, address, description, user_id) VALUES('$company_name','$end_date','$position', '$address', '$description','$userId')");
		
		//display success message
		echo "<br><font color='green'>Data added successfully.<br>";
		echo "<br/><a href='viewExperience.php'>View Experience</a>";
	}
}
?>





	<a href="index.php">Home</a> | <a href="education.php">Add Education</a> | <a href="logout.php">Logout</a>
	<br/><br/>

	<form action="addExperience.php" method="post" name="form1">
		<table width="25%" border="0">
			<br><h2>Add Experiance</h2><br>
			
			<tr>
				<td>Company Name</td>
				<td><input type="text" name="company_name"></td>
			</tr>
			<tr>
				<td>Position</td>
				<td><input type="text" name="position"></td>
			</tr>
			<tr>
				<td>End Date</td>
				<td><input type="date" name="end_date"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><textarea type="text" name="address"></textarea></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea type="text" name="description"></textarea></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"> <br> <br><br> <a href="education.php">Add Education</a></td>
			</tr>
		</table>
	</form>


</body>
</html>
