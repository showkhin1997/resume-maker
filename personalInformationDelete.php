<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table

$result2=mysqli_query($mysqli, "DELETE FROM personal_information WHERE id=$id");


//redirecting to the display page (view.php in our case)
header("Location:personalInformationView.php");
?>

