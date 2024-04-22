<?php
session_start(); 
if (!isset($_SESSION['UserID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Add music</title>
   <link rel="stylesheet" type="text/css" href="stylesheet.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <!-- Styling  to add to the website-->
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
            <li><h1 class="login">Add Music</h1></li>
        </ul>
    </div>
    </nav>
    <br>
    <p style="color:green;">
    <?php
    // displays a feedback message to signal the user
    if (isset($_SESSION['Music'])){
    echo str_repeat('&nbsp;', 8);
    echo($_SESSION['Music']);
    unset($_SESSION['Music']);
    } 
    ?>
</p>
<!-- Way to input field names to be entered into the database -->
<form action='addmusicsql.php' method='POST' enctype="multipart/form-data">
    Artist:<input type="text" name="artist" required><br>
    Genre:<input type="text" name="genre" required><br>
    SongTitle:<input type="text" name="songtitle" required><br>
    Image:<input type="file" id="piccy" name="piccy" accept="image/*" required><br>
    <input type="submit" value="Add New Music"><br>

    <div style="position: absolute; bottom: 5px; background-color: black" class="button">
    <a href="settings.php" style="color: #ffffff">Go back to settings</a>
    </div>
</form>
</body>
</html>