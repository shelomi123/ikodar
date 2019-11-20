<?php
session_start();

include ('../connection.php');

function isLoggedIn()
{
	if (isset($_SESSION['username']) && $_SESSION['user_type'] == "IT") {
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