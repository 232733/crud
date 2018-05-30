<?php 
	session_start();
	$db = mysqli_connect('localhost', 'a232733', 'shakopeesabers1', 'crud');

	// initialize variables
	$name = "";
	$gender = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$gender = $_POST['gender'];

		mysqli_query($db, "INSERT INTO info (name, gender) VALUES ('$name', '$gender')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}
	
	
	
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$gender = $_POST['gender'];
	$gender = $_POST['gender'];

	mysqli_query($db, "UPDATE info SET name='$name', gender='$gender' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
    }

	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
    }
	
	
?>