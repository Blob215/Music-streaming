<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <!-- Link to stylesheets and bootstrap -->
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
        <ul class="nav navbar-nav">
            <li><h1 class="login">Sign Up</h1></li>
        </ul>
    </div>
    </nav>
    <br>
<form class="About" action='addusers.php' method="POST">
    UserID:<input type="text" name="userid"><br>
    Forename:<input type="text" name="forename"><br>
    Surname:<input type="text" name="surname"><br>
    Username:<input type="text" name="username"><br>
    Password:<input type="text" name="password"><br>
    Emailaddress:<input type="text" name="emailaddress"><br>
    Phone Number:<input type="text" name="phonenumber"><br>
    <input type="submit" value="Sign Up"><br>

    <div style="position: absolute; bottom: 5px; background-color: black">
    <li><a href="menu.php">Go back to homepage</a></li>
    </div>
</form>
</body>
</html>