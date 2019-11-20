<?php include ('functions.php'); 
	  include ('../connection.php');
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
	<title>Manage Users</title>
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
		<h2>Manage Users</h2>
		
		<!--Creating a table to display all users-->
		<table>
			<thead>
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>User Type</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					//retrieve data from admin table
    				$query = "SELECT * FROM admin";
    				$results = $conn->query($query);
    				$user_type="admin";
    				if ($results->num_rows > 0) {
    				// output data of each row
						while ($row = $results->fetch_assoc()) { 	?>			
						    <tr>
						        <td><?php echo $row['username']; ?></td>
						        <td><?php echo $row['email']; ?></td>
						        <td><?php echo $user_type; ?></td>
						        <td>
						        	<div class="input-group">
										<a href="view.php"><button type="submit" class="btn" name="view_btn">View</button></a>
									</div>
						        </td>
						        <td>
						            <div class="input-group">
										<button type="button" class="btn" name="delete_btn">Delete</button>
									</div>
						        </td>
						    </tr>
					<?php	}

					}else{
						echo "0 results";
					}

			    	//retrieve data from IT individuals table-->
	    			$query = "SELECT * FROM it";
	    			$results = $conn->query($query);
	    			$user_type="IT";
	    			if ($results->num_rows > 0) {
	    			// output data of each row
						while ($row = $results->fetch_assoc()) { ?>				
						    <tr>
						        <td><?php echo $row['username']; ?></td>
						        <td><?php echo $row['email']; ?></td>
						        <td><?php echo $user_type; ?></td>
						        <td>
						        	<div class="input-group">
						        		<a href="view.php"><button type="submit" class="btn" name="view_btn">View</button></a>
									</div>
							    </td>
							    <td>
							        <div class="input-group">
										<button type="button" class="btn" name="delete_btn">Delete</button>
									</div>
							    </td>
							</tr>
					<?php	}

					}else{
						echo "0 results";
					}

			    	//retrieve data from client table-->
	    			$query = "SELECT * FROM client";
	    			$results = $conn->query($query);
	    			$user_type="client";
	    			if ($results->num_rows > 0) {
	    			// output data of each row
						while ($row = $results->fetch_assoc()) { ?>			
						    <tr>
						        <td><?php echo $row['username']; ?></td>
						        <td><?php echo $row['email']; ?></td>
						        <td><?php echo $user_type; ?></td>
						        <td>
						        	<div class="input-group">
										<a href="view.php?edit=<?php echo $row['username'], $user_type; ?>"><button type="submit" class="btn" name="view_btn">Edit</button></a>
									</div>
						        </td>
						        <td>
						            <div class="input-group">
										<a href= "functions.php?del=<?php echo $row['username']; ?>"><button type="button" class="btn" name="view_btn">Delete</button></a>
									</div>
						        </td>
						    </tr>
					<?php	}

					}else{
						echo "0 results";
					}
			    ?>
			</tbody>
		</table>

	</div>
	<!--end of content-->	
<?php $conn->close(); ?>	
</body>
</html>