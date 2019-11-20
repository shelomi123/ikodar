<?php 
session_start();

include ('../connection.php');

// variable declaration
$username = $email  = $user_type = $password= "";
$errors   = array(); 

// call the register() function if add_btn is clicked
if (isset($_POST['add_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $username, $email, $user_type, $password;

	// receive all input values from the form.
    
	$username    =  $_POST['username'];
	$email       =  $_POST['email'];
	$user_type  =  $_POST['user_type'];
	$password  =  $_POST['password'];

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required."); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required."); 
	}
	if (empty($user_type)) { 
		array_push($errors, "User type is required."); 
	}
	if (empty($password)) {
		array_push($errors, "The passwords is required.");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		if ($user_type=="admin") {
			$query = "INSERT INTO admin (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			if ($conn->query($query) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $query . "<br>" . $conn->error;
			}
			
		}elseif ($user_type=="client"){
			$query = "INSERT INTO client (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			if ($conn->query($query) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $query . "<br>" . $conn->error;
			}
			
		}elseif ($user_type=="IT"){
			$query = "INSERT INTO it (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			if ($conn->query($query) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $query . "<br>" . $conn->error;
			}
			
		} 
	}
	$conn->close();
}

function isLoggedIn()
{
	if (isset($_SESSION['username']) && $_SESSION['user_type'] == "admin") {
		return true;
	}else{
		return false;
	}
}

// log user out if LOGOUT BUTTON clicked
if (isset($_GET['logout'])) {
	// remove all session variables
	session_unset();
	unset($_SESSION['username']);
	// destroy the session
	session_destroy();
	header("location: ../index.php");
}

//delete function
	if (isset($_GET['del'])) {
		$username = $_GET['del'];
		mysqli_query($db, "DELETE FROM client WHERE username=$username");
		$_SESSION['message'] = "Record deleted!"; 
		header('location: manage.php');
	}

?>



