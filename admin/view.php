<?php include ('functions.php'); 
	//check if the user is logged in
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first.";
		header('location: ../login.php');
	}

//editing command
if (isset($_GET['edit'])) {
	$username = $_GET['edit'];
	$user_type = $_GET['edit'];
	$update = true;

	//retrieving details from admin
	if($user_type=="admin"){ 

		$query="SELECT * FROM admin WHERE username=$username";

	} elseif ($user_type=="client"){

		$query="SELECT * FROM client WHERE username=$username";

	} else {

		$query="SELECT * FROM it WHERE username=$username";
	}
	$result = $conn->query($query);
	
	$row       = $result->fetch_assoc();
	$username  = $row['username'];
	$email     = $row['email'];
	$password  = $row['password'];
	$gender    = $row['gender'];
	$tel       = $row['tel'];
	
}
//end of editing command
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ongoing</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>

	<!--navigation bar-->
	<div class="split left">
	<center>
		<h3>iකෝඩර්</h3>
		<strong><?php echo "Hello "; echo$_SESSION['username']; ?></strong>
		<small><i  style="color: #888;">(<?php echo $_SESSION['user_type']; ?>)</i></small> 
		<br>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="ongoing.php">Ongoing Projects</a></li>
			<li><a href="new.php">New Projects</a></li>
			<li><a href="add.php">Add User</a></li>
			<li><a href="manage.php">Manage Profiles</a></li>
			<li><a href="messages.php">View Messages</a></li>
		</ul>
		</center>
	</div>
	<!--end of navigation bar-->
	

	
	<!--content-->
	<div class="split right">
		<a href="../index.php?logout='1'" style="color: black; float:right;">Logout</a>
		<h2>User Profile</h2>
		
		<!--Creating a form to display user profle-->
		<div class="form">
			<form method="post" action="manage.php" >

				<div class="input-group">
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $username; ?>">
				</div>
				<div class="input-group">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $email; ?>">
				</div>
				<div class="input-group">
					<label>User type</label>
					<select name="user_type" id="user_type" value="<?php echo $user_type; ?>">
						<option value="admin">Admin</option>
						<option value="client">Client</option>
						<option value="IT">IT Individual</option>
					</select>
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password" value="<?php echo $password; ?>">
				</div>
				<div class="input-group">
					<label>Gender</label>
					<select name="gender" id="user_type" >
						<?php if ($gender=="F"){ ?>
							<option value="F" selected="">Female</option>
							<option value="M">Male</option>
						<?php } else{ ?>
							<option value="F">Female</option>
							<option value="M" selected="">Male</option>
						<?php } ?>
					</select><br><br>
				</div>
				<div class="input-group">
					<label>Telephone</label>
					<input type="int" name="tel" value="<?php echo $tel; ?>">
				</div>
				<div class="input-group">
					<button type="submit" class="btn" name="update_btn">Update user</button>
					<button type="submit" class="btn" name="del_btn">Delete user</button>
				</div>
			</form>
		</div>
		<!--end of form-->
	</div>
	<!--end of content-->
</body>
</html>