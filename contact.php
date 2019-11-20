<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="css/general/contact.css">
</head>

<body>
		
    <!--Header-->
    <header> 
        <div class="head1">
        	<img src="images/logo.png" height="30%" width="15%" >
            
            <a href="register.php" style="color: white; float:right; font-size:30px"><b>Sign up</b></a></t>
    
            <a href="login.php" style="color: black; float:right; font-size:30px; "><b>Sign in</b></a>
        </div> 
    </header> 
      
    <!-- Menu Navigation Bar -->
    
      
    <!--content-->
    <div class = "body"> 
        
        <form action="action_page.php">
            <div class="container">
                <h1><center>Contact Us</center></h1>
                
                <hr>

                <label for="person"><b>Status</b></label><br>

                <input type="radio" name="person" value="client" checked>Client
                <input type="radio" name="person" value="IT">IT individual
                <input type="radio" name="person" value="unregistered">Unregistered<br><br>


                <label for="username"><b>Name</b></label>
                <input type="text" placeholder="Enter User Name" name="username"><br>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email"><br>

                <label for="email"><b>Message</b></label><br>
                <textarea name="message" rows="10" cols="100">Type your messege</textarea>
                <br>

                

                <a href="#"><button type="submit" class="registerbtn"><b>SUBMIT</b></button></a>
                <a href="index.php"><button type="button" class="homebtn"><b>HOME</b></button></a>
                
  
            <div class="container signin">
                <p>All rights reserved</p>
            </div>
        </form>       
    
            

         
    </div> 
      
    

	
</body>
</html>