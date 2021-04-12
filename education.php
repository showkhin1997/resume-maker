<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Education</title>
	<link rel="stylesheet" href="education.css">
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$degreeName1 = $_POST['degreeName1'];
	$majorSubject1 = $_POST['majorSubject1'];
	$instituteName1 = $_POST['instituteName1'];
	$startDate1 = $_POST['startDate1'];
	$endDate1 = $_POST['endDate1'];
    $degreeName2 = $_POST['degreeName2'];
	$subjectName2 = $_POST['subjectName2'];
	$instituteName2 = $_POST['instituteName2'];
	$startDate2 = $_POST['startDate2'];
	$endDate2 = $_POST['endDate2'];
	$userId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($degreeName1) || empty($majorSubject1) || empty($instituteName1) || empty($startDate1) || empty($endDate1) || empty($degreeName2) || empty($subjectName2) || empty($instituteName2) || empty($startDate2) || empty($endDate2)) {
				
		if(empty($degreeName1)) {
			echo "<font color='red'>Degree field is empty.</font><br/>";
		}
		
		if(empty($majorSubject1)) {
			echo "<font color='red'>Subject field is empty.</font><br/>";
		}
		
		if(empty($instituteName1)) {
			echo "<font color='red'>Institute field is empty.</font><br/>";
		}

		if(empty($startDate1)) {
			echo "<font color='red'>Start Date field is empty.</font><br/>";
		}

		if(empty($endDate1)) {
			echo "<font color='red'>End Date field is empty.</font><br/>";
		}

        if(empty($degreeName2)) {
			echo "<font color='red'>Degree field is empty.</font><br/>";
		}
		
		if(empty($subjectName2)) {
			echo "<font color='red'>Subject field is empty.</font><br/>";
		}
		
		if(empty($instituteName2)) {
			echo "<font color='red'>Institute field is empty.</font><br/>";
		}

		if(empty($startDate2)) {
			echo "<font color='red'>Start Date field is empty.</font><br/>";
		}

		if(empty($endDate2)) {
			echo "<font color='red'>End Date field is empty.</font><br/>";
		}

		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO education(degreeName1, majorSubject1, instituteName1, startDate1, endDate1, degreeName2, subjectName2, instituteName2, startDate2, endDate2, user_id) VALUES('$degreeName1','$majorSubject1','$instituteName1', '$startDate1', '$endDate1', '$degreeName2', '$subjectName2', '$instituteName2', '$startDate2', '$endDate2','$userId')");
		
		//display success message
		echo "<br><font color='green'>Data added successfully.<br>";
		echo "<br/><a href='educationView.php'>View Education</a>";
	}
}
?>





	<a href="index.php">Home</a> |  <a href="logout.php">Logout</a>
	<br/><br/>

	<form action="education.php" method="post" name="form1">
		<table width="25%" border="0">
			<br><h2>Add Education</h2><br>
			<tr>
				<td>Degree Name</td>
				<td><input type="text" name="degreeName1"></td>
			</tr>
			<tr>
				<td>Major Subject</td>
				<td><input type="text" name="majorSubject1"></td>
			</tr>
            <tr>
				<td>Institute Name</td>
				<td><textarea type="text" name="instituteName1"></textarea></td>
			</tr>
			<tr>
				<td>Start Date</td>
				<td><input type="date" name="startDate1"></td>
			</tr>
			<tr>
				<td>End Date</td>
				<td><input type="date" name="endDate1"></td>
			</tr>
            <tr>
				<td>Degree Name</td>
				<td><input type="text" name="degreeName2"></td>
			</tr>
			<tr>
				<td>Major Subject</td>
				<td><input type="text" name="subjectName2"></td>
			</tr>
            <tr>
				<td>Institute Name</td>
				<td><textarea type="text" name="instituteName2"></textarea></td>
			</tr>
			<tr>
				<td>Start Date</td>
				<td><input type="date" name="startDate2"></td>
			</tr>
			<tr>
				<td>End Date</td>
				<td><input type="date" name="endDate2"></td>
			</tr>
			<tr> 
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"> <br> <br>  <a href="resume.php">Preview</a></td>
			</tr>
		</table>
	</form>


</body>
</html>
