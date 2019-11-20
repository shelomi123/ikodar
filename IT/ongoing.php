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
	<title>Ongoing Projects</title>
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
		<h2>Ongoing Projects</h2>

		<!--Creating a table to display all new projects-->
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Project end date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					//retrieve data from project table
    				$query = "SELECT * FROM projects";
    				$results = $conn->query($query);

    				if ($results->num_rows > 0) {
    				// output data of each row
						while ($row = $results->fetch_assoc()) { 
							$date=date("Y-m-d");	
							if ($row['bid_end']<$date && $date<$row['p_end'] && ($row['IT_1']==$_SESSION['username'] || $row['IT_2']==$_SESSION['username'])){ ?>			
							    <tr>
							        <td><?php echo $row['pid']; ?></td>
							        <td><?php echo $row['name']; ?></td>
							        <td><?php echo $row['pdesc']; ?></td>
							        <td><?php echo $row['p_end']; ?></td>
							        <td>
							        	<div class="input-group">
											<button type="button" class="btn" name="view_btn">View</button>
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