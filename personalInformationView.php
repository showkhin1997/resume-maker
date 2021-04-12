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
$result2 = mysqli_query($mysqli, "SELECT * FROM personal_information WHERE user_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Edit Personal Information </title>
	<link rel="stylesheet" href="editView.css">
</head>

<body>
	<a href="index.php">Home</a> | <a href="resume.php">Preview</a> | <a href="addExperience.php">Add Experience</a> | <a href="viewExperience.php">View Experience</a> | <a href="educationView.php">View Education</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Designation</td>
			<td>Phone Number</td>
			<td>Email</td>
            <td>Home Adress</td>
            <td>Profile</td>
            <td>Image Link</td>
		</tr>
		<?php
		while($res2 = mysqli_fetch_array($result2)) {		
			echo "<tr>";
			echo "<td>".$res2['firstName']."</td>";
			echo "<td>".$res2['lastName']."</td>";
			echo "<td>".$res2['designation']."</td>";
			echo "<td>".$res2['phone']."</td>";
			echo "<td>".$res2['email']."</td>";	
            echo "<td>".$res2['home']."</td>";
            echo "<td>".$res2['profile']."</td>";
            echo "<td>".$res2['image']."</td>";
			echo "<td><a href=\"personalInformationEdit.php?id=$res2[id]\">Edit</a> | <a href=\"personalInformationDelete.php?id=$res2[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
