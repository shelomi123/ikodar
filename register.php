<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/general/register.css">
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
        
        <form action="register.php" method="post">
            <div class="container">
                <h1><center>Register Form</center></h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="person"><b>Who are you?</b></label><br>
                <input type="radio" name="person" value="client" checked>Client
                <input type="radio" name="person" value="IT">IT individual<br><br>


                <label for="username"><b>User Name</b></label>
                <input type="text" placeholder="Enter User Name" name="username"><br>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email"><br>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password_1"><br>

                <label for="confirmpassword"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" name="password_2"><br><br>

                <p>By creating an account you agree to our <a href="#">Terms & Privacy.</a></p><br>

                <button type="submit" class="registerbtn" name="register_btn"><b>REGISTER</b></button>

                <a href="index.php"><button type="button" class="homebtn"><b>HOME</b></button></a>
            </div>
  
            <div class="container signin">
                <p>Already have an account? <a href="login.php">Sign in</a></p>
            </div>
        </form>       
    
            

         
    </div> 
      
    

	
</body>
</html>