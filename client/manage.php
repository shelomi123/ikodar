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
		<h1> Manage Profile</h1>
		</center>
		<?php 
			$client=$_SESSION['username'];
			$query="SELECT * FROM client WHERE username=$client";
			$results = $conn->query($query);
			$row = $results->fetch_assoc();
		?>
		<form class="myform" action="index.php" method="post">
		<label>User Name: </label><br>
		<input name="username" type="text" class="input" value="<?php echo $row['username'];?>"><br><br>
	
		<label>Password: </label><br>
		<input name="password" type="password" class="input" value="<?php echo $row['password'];?>"><br><br>
		
		<label>Email: </label><br>
		<input name="email" type="email" class="input" value="<?php echo $row['email'];?>"><br><br>

		<label>Gender</label>
		<select name="gender" id="user_type" >
			<?php if ($row['gender']=="F"){ ?>
				<option value="F" selected="">Female</option>
				<option value="M">Male</option>
			<?php } else{ ?>
				<option value="F"s>Female</option>
				<option value="M" selected="">Male</option>
			<?php } ?>
		</select><br><br>

		<label>Telephone: </label><br>
		<input name="tel" type="int" class="input" value="<?php echo $row['tel'];?>"><br><br>
		
		<input name="update" type="submit" id="update_btn" value="Update"/><br><br>
		
		<input name="delete" type="submit" id="delete_btn" value="Delete"/>
		
		</form>
	
	</div>
	<!--end of content-->
	
	
	
	</body>
	
	</html>