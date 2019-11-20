<?php include ('functions.php'); 
		//check if the user is logged in
		if (!isLoggedIn()) {
			$_SESSION['msg'] = "You must log in first.";
			header('location: ../login.php');
		}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Client Home</title>
		<link rel="stylesheet" type="text/css" href="../css/client.css">
	<head>
	
	<body>
	<!--navigation bar-->
	<div class="split left">
		<h3>iකෝඩර්</h3>
		<strong><?php echo "Hello "; echo$_SESSION['username']; ?></strong>
		<small><i  style="color: #888;">(<?php echo $_SESSION['user_type']; ?>)</i></small> 
		<br>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="new.php">New Projects</a></li>
			<li><a href="ongoing.php">Ongoing Projects</a></li>
			<li><a href="add.php">Add Projects</a></li>
			<li><a href="manage.php">Manage Profile</a></li>
			<li><a href="view.php">View IT Individuals' Profiles</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="chat.php">Chat Room<a></li>
		</ul>
	</div>
	<!--end of navigation bar-->
	
	<!--content-->
	<div class="split right">
		<a href="../index.php?logout='1'" style="color: black; float: right;">Logout</a>
		<center>
		<h1> Add Projects</h1>
		</center>
		
		<form class="myform" action="add.php" method="post">
			<label>Name: </label><br>
			<input name="name" type="text" class="input" placeholder="Type project's name" required/><br><br>
			
			<label>Description: </label><br>
			<textarea rows="5" cols="60" name="desc">Enter description here...</textarea>
			
			<label>Deadline(Bidding): </label><br>
			<input name="bidding" type="date" class="input" required/></br></br>
			
			<label>Full Project Deadline: </label><br>
			<input name="fulldeadline" type="date" class="input" required/></br></br>
						
			<button name="post_btn" type="submit" id="post_btn">Post</button><br><br>
		</form>
	</div>
	<!--end of content-->
	
	
	
	</body>
	
	</html>