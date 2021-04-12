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
$result = mysqli_query($mysqli, "SELECT * FROM experience WHERE user_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>View Experience</title>
	<link rel="stylesheet" href="editView.css">
</head>

<body>
	<b><h2><a href="index.php">Home</a> | <a href="resume.php">Preview</a>  | <a href="education.php">Add Education</a> | <a href="personalInformationView.php">View Personal Information</a> | <a href="educationView.php">View Education</a> | <a href="logout.php">Logout</a></h2></b>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr>
			<td>Company Name</td>
			<td>Posotion</td>
			<td>End date</td>
			<td>Address</td>
			<td>Description</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['company_name']."</td>";
			echo "<td>".$res['position']."</td>";
			echo "<td>".$res['end_date']."</td>";
			echo "<td>".$res['address']."</td>";
			echo "<td>".$res['description']."</td>";	
			echo "<td><a href=\"editExperience.php?id=$res[id]\">Edit</a> | <a href=\"deleteExperience.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
