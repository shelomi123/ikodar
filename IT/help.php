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
	<title>Help</title>
	<link rel="stylesheet" type="text/css" href="../css/IT.css">
</head>
<body>

	<!--navigation bar-->
	<div class="split left">
		<h3 align="center">iකෝඩර්</h3>
		<strong><?php echo "Hello "; echo$_SESSION['username']; ?></strong>
		<small><i  style="color: #888;">(<?php echo $_SESSION['user_type']; ?>)</i></small> 
		<br>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="ongoing.php">Ongoing Projects</a></li>
			<li><a href="new.php">New Projects</a></li>
			<li><a href="profile.php">Edit your Profile</a></li>
			<li><a href="help.php">Help</a></li>
		</ul>
	</div>
	<!--end of navigation bar-->
	
	<!--content-->
	<div class="split right">
		<a href="../index.php" style="color: black; float: right; padding: 10px">Logout</a>
		<h2>Help</h2>
	</div>
	<!--end of content-->	
	
</body>
</html>