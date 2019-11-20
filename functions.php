<?php 
session_start();

include ('connection.php');

//variable declaration
$user_type = $username =  $email = 	$password_1 =	$password_2 ="";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

//call login() function if login_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $username, $email, $user_type, $password_1, $password_2;

	// receive all input values from the form.
    // defined below to escape form values
    $user_type   =  $_POST['person'];
	$username    =  $_POST['username'];
	$email       =  $_POST['email'];
	$password_1  =  $_POST['password_1'];
	$password_2  =  $_POST['password_2'];

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
	if (empty($password_1)) { 
		array_push($errors, "Password is required."); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match.");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if ($user_type=="client"){
			$query = "INSERT INTO client (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			if ($conn->query($query) === TRUE) {
				// get id of the created user
				$last_id = $conn->insert_id;
				$_SESSION['username'] = $last_id; // put logged in user in session
				$_SESSION['user_type'] = "client";
				$_SESSION['success']  = "You are now logged in.";
				header('location: client/home.php');	
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $query . "<br>" . $conn->error;
			}
			
		}elseif ($user_type=="IT"){
			$query = "INSERT INTO it (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			if ($conn->query($query) === TRUE) {
				// get id of the created user
				$last_id = $conn->insert_id;
				$_SESSION['username'] = $last_id; // put logged in user in session
				$_SESSION['user_type'] = "IT";
				$_SESSION['success']  = "You are now logged in.";
				header('location: IT/home.php');
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $query . "<br>" . $conn->error;
			}
			
		} 
	}
}

// LOGIN USER
function login(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $username, $user_type, $password_1;

	// receive all input values from the form.
    // defined below to escape form values
    $user_type   =  $_POST['person'];
	$username    =  $_POST['username'];
	$password_1  =  $_POST['password_1'];
	
	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required."); 
	}
	if (empty($user_type)) { 
		array_push($errors, "User type is required."); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required."); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if ($user_type=="admin"){

			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
			$results=$conn->query($query);
			if ($results->num_rows == 1) { //user found
    			// login the user (put user in session and direct to relavant homepage.)
    			$_SESSION['username'] = $username; // put logged in user in session
				$_SESSION['user_type'] = "admin";
				$_SESSION['success']  = "You are now logged in.";
				header('location: admin/home.php');
			} else { //user not found
 			   echo "Wrong username/password combination.";
			}

		}elseif ($user_type=="client"){

			$query = "SELECT * FROM client WHERE username='$username' AND password='$password' LIMIT 1";
			$results=$conn->query($query);
			if ($results->num_rows == 1) { //user found
    			// login the user (put user in session and direct to relavant homepage.)
    			$_SESSION['username'] = $username; // put logged in user in session
				$_SESSION['user_type'] = "client";
				$_SESSION['success']  = "You are now logged in.";
				header('location: client/home.php');
			} else { //user not found
 			   echo "Wrong username/password combination.";
			}

		}elseif ($user_type=="IT"){
			$query = "SELECT * FROM it WHERE username='$username' AND password='$password' LIMIT 1";
			$results=$conn->query($query);
			if ($results->num_rows == 1) { //user found
    			// login the user (put user in session and direct to relavant homepage.)
    			$_SESSION['username'] = $username; // put logged in user in session
				$_SESSION['user_type'] = "IT";
				$_SESSION['success']  = "You are now logged in.";
				header('location: IT/home.php');
			} else { //user not found
 			   echo "Wrong username/password combination.";
			}
		}

		
	}
}

$conn->close();

?>
