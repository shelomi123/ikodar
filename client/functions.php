<?php 
session_start();

include ('../connection.php');

// variable declaration
$name = $desc  = $biddate = $enddate="";
$errors   = array(); 

// call the register() function if add_btn is clicked
if (isset($_POST['post_btn'])) {
	postproject();
}

// POST PROJECTS
function postproject(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $name, $desc, $biddate, $enddate;

	// receive all input values from the form.
    // defined below to escape form values
	$name     =  $_POST['name'];
	$desc     =  $_POST['desc'];
	$biddate  =  $_POST['bidding'];
	$enddate  =  $_POST['fulldeadline'];
	$client   =  $_SESSION['username'];

	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
		array_push($errors, "Name is required."); 
	}
	if (empty($desc)) { 
		array_push($errors, "Description is required."); 
	}
	if (empty($biddate)) { 
		array_push($errors, "Bid ending date is required."); 
	}
	if (empty($enddate)) {
		array_push($errors, "Project ending date is required.");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		
		$query = "INSERT INTO projects (name, pdesc, p_end,bid_end,client) 
				  VALUES('$name', '$desc', '$enddate','$biddate','$client')";
		if ($conn->query($query) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
	$conn->close();
}

function isLoggedIn()
{
	if (isset($_SESSION['username']) && $_SESSION['user_type'] == "client") {
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

?>