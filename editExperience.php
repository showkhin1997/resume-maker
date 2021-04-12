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
	
	$company_name = $_POST['company_name'];
	$end_date = $_POST['end_date'];
	$position = $_POST['position'];
	$address = $_POST['address'];
	$description = $_POST['description'];
	
	
	// checking empty fields
	if(empty($company_name) || empty($end_date) || empty($position) || empty($address) || empty($description) ) {
				
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

		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE experience SET company_name='$company_name', end_date='$end_date', position='$position', address='$address', description='$description' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: viewExperience.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM experience WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$company_name = $res['company_name'];
	$end_date = $res['end_date'];
	$position = $res['position'];
	$address = $res['address'];
	$description = $res['description'];
	
}
?>
<html>
<head>	
	<title>Update Experience</title>
	<link rel="stylesheet" href="experience.css">
</head>

<body>
	<a href="index.php">Home</a> | <a href="resume.php">Preview</a> | <a href="viewExperience.php">Update Experience</a> | <a href="educationView.php">Update Education</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	<br><h2>Edit Your Experience</h2><br>
	<form name="form1" method="post" action="editExperience.php">
		<table border="0">
			<h3>Update Experiance</h3>
			<tr> 
				<td>Company Name</td>
				<td><input type="text" name="company_name" value="<?php echo $company_name;?>"></td>
			</tr>
			<tr> 
				<td>End date</td>
				<td><input type="text" name="end_date" value="<?php echo $end_date;?>"></td>
			</tr>
			<tr> 
				<td>Position</td>
				<td><input type="text" name="position" value="<?php echo $position;?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $address;?>"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
