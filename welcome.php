<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Home</title>
   
    <style>
    body {
        background-color: #444;
        color: white;
        letter-spacing: 1px;
    }
        h1 {
            font-family: Helvetica;
            text-transform: uppercase;
            text-align: center;
            margin-top: 20%;
        }
        h2 {
            font-family: Helvetica;
            text-transform: uppercase;
            text-align: center;
        }
        a {
            color: blue;
        }
    </style>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>
