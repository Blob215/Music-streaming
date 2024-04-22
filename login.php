<!DOCTYPE html>
<html>
<head>
   <title>Login</title>
   <link rel="stylesheet" type="text/css" href="stylesheet.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
   <style>
    .container-fluid{ background-color: #000000;
        top: 0;
    width: 100%}
        .navbar navbar-inverse  {background-color: #000000;}
        .navbar-brand a {color:black;}
        .navbar-header a{color:black;}
    </style>
</head>
<body>
<nav class="navbar navbar-inverse" style="background-color:#000000; class='font-family: 'Times New Roman', Times, serif;">
    <div class = "container-fluid">
        <ul class="navbar-nav">
            <li><h1 class="login">Login</h1></li>
            <p style="color:red;">
                                <?php
                                // displays an error message if necessary
                                session_start(); 
                                if (isset($_SESSION['Message'])){
                                    echo($_SESSION['Message']);
                                    unset($_SESSION['Message']);
                                } 
                                ?>
                            </p>
        </ul>
    </div>
    </nav>
    <br>
<!-- text boxes for login -->
<form action="login_process.php" method= "POST"  class="About">
 User name:<input type="text" name="Username" placeholder="Username"><br>
 Password:<input type="password" name="Pword" placeholder="Password"><br>
  <input type="submit" value="Login">

</form>
<div style="position: absolute; bottom: 5px; background-color: black" class="button">
    <a href="index.php" style="color: #ffffff">Go back to homepage</a>
</div>
</body>
</html>