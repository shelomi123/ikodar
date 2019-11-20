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
		<h1> New Projects</h1>
		</center>
		
		<!--Creating a table to display all new projects-->
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Project end date</th>
					<th>Bid end date</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					//retrieve data from project table
    				$query = "SELECT * FROM projects";
    				$results = $conn->query($query);
    				$client=$_SESSION['username'];
    				if ($results->num_rows > 0) {
    				// output data of each row
						while ($row = $results->fetch_assoc()) { 
							$date=date("Y-m-d");	
							if ($date<$row['bid_end'] && $row['client']==$client){ ?>			
							    <tr>
							        <td><?php echo $row['pid']; ?></td>
							        <td><?php echo $row['name']; ?></td>
							        <td><?php echo $row['pdesc']; ?></td>
							        <td><?php echo $row['p_end']; ?></td>
							        <td><?php echo $row['bid_end']; ?></td>
							        <td>
							        	<div class="input-group">
											<button type="button" class="btn" name="view_btn">View</button>
										</div>
							        </td>
							        <td>
							            <div class="input-group">
											<button type="button" class="btn" name="delete_btn">Delete</button>
										</div>
							        </td>
							    </tr>
					<?php   }
						}

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