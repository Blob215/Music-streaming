<!DOCTYPE html>
<html>
<title>Settings</title>

<?php
    require 'navbar.php';
    include_once('connection.php');
session_start();
?>
<li><a href="addmusic.php">Adding music</a></li>
<li><a href="GenrePreferences.php">Add to preferences</a></li>
<div style="position: absolute; bottom: 5px; background-color: black">
<li><a href="menu.php">Go back to homepage</a></li>
</div>
<?php

if (!isset($_SESSION['UserID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
if ($_SESSION["Role"]==1){
    echo("<br>");
    echo("<br>");
    echo("Admin Functions <br>");
    ?>
    <li><a href="addadmin.php">Add Admins</a>
    <?php
}
?>

</head>
<body>
</body>
</html>