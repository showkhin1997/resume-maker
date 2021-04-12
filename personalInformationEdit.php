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
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$designation = $_POST['designation'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
    $home = $_POST['home'];
    $profile = $_POST['profile'];
    $image = $_POST['image'];
	
	
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


		
	} else {	
		//updating the table
		$result2 = mysqli_query($mysqli, "UPDATE personal_information SET firstName='$firstName', lastName='$lastName', designation='$designation', phone='$phone', email='$email', home='$home', profile='$profile', image='$image' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: personalInformationView.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result2 = mysqli_query($mysqli, "SELECT * FROM personal_information WHERE id=$id");

while($res2 = mysqli_fetch_array($result2))
{
	$firstName = $res2['firstName'];
	$lastName = $res2['lastName'];
	$designation = $res2['designation'];
	$phone = $res2['phone'];
	$email = $res2['email'];
    $home = $res2['home'];
    $profile = $res2['profile'];
    $image = $res2['image'];
	
}
?>
<html>
<head>	
	<title>Edit Personal Information</title>
	<link rel="stylesheet" href="personalInformation.css">
</head>

<body>
	<a href="index.php">Home</a> | <a href="personalInformationView.php">View Perssonal Information</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	<br><h2>Edit Your Personal Information</h2><br>
	<form name="form1" method="post" action="personalInformationEdit.php">
		<table border="0">
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="firstName" value="<?php echo $firstName;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lastName" value="<?php echo $lastName;?>"></td>
			</tr>
			<tr> 
				<td>Designation</td>
				<td><input type="text" name="designation" value="<?php echo $designation;?>"></td>
			</tr>
			<tr> 
				<td>Phone</td>
				<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
            <tr> 
				<td>Home Adress</td>
				<td><textarea type="text" name="home" value="<?php echo $home;?>"></textarea></td>
			</tr>
            <tr> 
				<td>Profile</td>
				<td><textarea type="text" name="profile" value="<?php echo $profile;?>"></textarea></td>
			</tr>
            <tr> 
				<td>Image Link</td>
				<td><textarea type="text" name="image" value="<?php echo $image;?>"></textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
