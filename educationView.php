<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result3 = mysqli_query($mysqli, "SELECT * FROM education WHERE user_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>View Education</title>
	<link rel="stylesheet" href="editView.css">
</head>

<body>
	<a href="index.php">Home</a> | <a href="resume.php">Preview</a> | <a href="personalInformationView.php">View Personal Information</a> | <a href="educationView.php">View Education</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Degree Name</td>
			<td>Major Subject</td>
			<td>Institute Name</td>
			<td>Start Date</td>
			<td>End Date</td>
            <td>Degree Name</td>
			<td>Major Subject</td>
			<td>Institute Name</td>
			<td>Start Date</td>
			<td>End Date</td>
		</tr>
		<?php
		while($res3 = mysqli_fetch_array($result3)) {		
			echo "<tr>";
			echo "<td>".$res3['degreeName1']."</td>";
			echo "<td>".$res3['majorSubject1']."</td>";
			echo "<td>".$res3['instituteName1']."</td>";
			echo "<td>".$res3['startDate1']."</td>";
			echo "<td>".$res3['endDate1']."</td>";	
            echo "<td>".$res3['degreeName2']."</td>";
			echo "<td>".$res3['subjectName2']."</td>";
			echo "<td>".$res3['instituteName2']."</td>";
			echo "<td>".$res3['startDate2']."</td>";
			echo "<td>".$res3['endDate2']."</td>";
			echo "<td><a href=\"educationEdit.php?id=$res3[id]\">Edit</a> | <a href=\"educationDelete.php?id=$res3[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
