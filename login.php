<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login</title>
      
      <style type = "text/css">
         body {
            font-family: Helvetica, sans-serif;
            font-size:14px;
            color: white;
            background-color: #444;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
            width: 100%;
            padding: 10px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; margin-top: 50px; text-align: center;" align = "left">
         <h1>Login</h1>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username: </label><br/><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password: </label><br/><input type = "password" name = "password" class = "box" /><br/><br />
                  <input style="border: 0; background-color: #888; padding: 10px; width: 100%; margin: 0 auto; text-align: center; border-radius: 10px; color: white;" type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:12px; letter-spacing: 1px; background-color: #bbb; padding: 10px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>