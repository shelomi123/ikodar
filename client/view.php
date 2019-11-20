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
		<h1> View IT individuals' Profiles</h1>
		</center>
		
		<!--Creating a table to display all IT individuals-->
		<table>
			<thead>
				<tr>
					<th>Username</th>
					<th>Education Qualification</th>
					<th>Ratings</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					//retrieve data from IT individual's table
    				$query = "SELECT * FROM client";
    				$results = $conn->query($query);

    				if ($results->num_rows > 0) {
    				// output data of each row
						while ($row = $results->fetch_assoc()) { ?>
							<tr>
							    <td><?php echo $row['username']; ?></td>
							    <td><?php echo $row['edu_quali']; ?></td>
							    <td><?php echo $row['rating']; ?></td>
							</tr>     
					<?php  }

					}else{
						echo "0 results";
					}

			    	?>
			</tbody>
		</table>
	
	</div>
	<!--end of content-->
	
	
	
	</body>
	
	</html>