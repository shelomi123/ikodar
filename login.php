<?php include ('functions.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/general/login.css">
</head>

<body>
		
    <!--Header-->
    <header> 
        <div class="head1">
        	<img src="images/logo.png" height="30%" width="15%" >
        </div> 
    </header> 
      
    <!-- Menu Navigation Bar -->
    
      
    <!--content-->
    <div class = "body"> 
        
        <form action="login.php" method="post">
            <div class="container">
                <h1><center>Sign In</center></h1>
                
                <hr>

                <label for="person"><b>Who are you?</b></label><br>

                <input type="radio" name="person" value="client" checked>Client
                <input type="radio" name="person" value="IT">IT individual
                <input type="radio" name="person" value="admin">Admin<br><br>


                <label for="username"><b>User Name</b></label>
                <input type="text" placeholder="Enter User Name" name="username" ><br>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password_1" ><br><br>

                <button type="submit" class="loginbtn" name="login_btn"><b>LOGIN</b></button>

                <a href="index.php"><button type="button" class="homebtn"><b>HOME</b></button></a>
            </div>
  
            <div class="container signin">
                <p>Not a member yet? <a href="register.php">Sign Up</a></p>
            </div>
        </form>       
    
            

         
    </div> 
      
    

	
</body>
</html>