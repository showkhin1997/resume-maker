<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
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

		
	} else {	
		//updating the table
		$result3 = mysqli_query($mysqli, "UPDATE education SET degreeName1='$degreeName1', majorSubject1='$majorSubject1', instituteName1='$instituteName1', startDate1='$startDate1', endDate1='$endDate1', degreeName2='$degreeName2', subjectName2='$subjectName2', instituteName2='$instituteName2', startDate2='$startDate2', endDate2='$endDate2' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: educationView.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result3 = mysqli_query($mysqli, "SELECT * FROM education WHERE id=$id");

while($res3 = mysqli_fetch_array($result3))
{
	$degreeName1 = $res3['degreeName1'];
	$majorSubject1 = $res3['majorSubject1'];
	$instituteName1 = $res3['instituteName1'];
	$startDate1 = $res3['startDate1'];
	$endDate1 = $res3['endDate1'];
    $degreeName2 = $res3['degreeName2'];
	$subjectName2 = $res3['subjectName2'];
	$instituteName2 = $res3['instituteName2'];
	$startDate2 = $res3['startDate2'];
	$endDate2 = $res3['endDate2'];
	
}
?>
<html>
<head>	
	<title>Update Education</title>
	<link rel="stylesheet" href="education.css">
</head>

<body>
	<a href="index.php">Home</a> | <a href="resume.php">Preview</a> | <a href="viewExperience.php">Update Experience</a> | <a href="educationView.php">Update Education</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	<br><h2>Edit Your Education</h2><br>
	<form name="form1" method="post" action="educationEdit.php">
		<table border="0">
			<h3>Update Education</h3>
			<tr> 
				<td>Degree Name</td>
				<td><input type="text" name="degreeName1" value="<?php echo $degreeName1;?>"></td>
			</tr>
			<tr> 
				<td>Major Subject</td>
				<td><input type="text" name="majorSubject1" value="<?php echo $majorSubject1;?>"></td>
			</tr>
			<tr> 
				<td>Institute Name</td>
				<td><textarea type="text" name="instituteName1" value="<?php echo $instituteName1;?>"></textarea></td>
			</tr>
			<tr> 
				<td>Start Date</td>
				<td><input type="date" name="startDate1" value="<?php echo $startDate1;?>"></td>
			</tr>
			<tr> 
				<td>End Date</td>
				<td><input type="date" name="endDate1" value="<?php echo $endDate1;?>"></td>
			</tr>
            <tr> 
				<td>Degree Name</td>
				<td><input type="text" name="degreeName2" value="<?php echo $degreeName2;?>"></td>
			</tr>
			<tr> 
				<td>Major Subject</td>
				<td><input type="text" name="subjectName2" value="<?php echo $subjectName2;?>"></td>
			</tr>
			<tr> 
				<td>Institute Name</td>
				<td><textarea type="text" name="instituteName2" value="<?php echo $instituteName2;?>"></textarea></td>
			</tr>
			<tr> 
				<td>Start Date</td>
				<td><input type="date" name="startDate2" value="<?php echo $startDate2;?>"></td>
			</tr>
			<tr> 
				<td>End Date</td>
				<td><input type="date" name="endDate2" value="<?php echo $endDate2;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
