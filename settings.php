<!DOCTYPE html>
<html>
<title>Settings</title>

<?php
    require 'navbar.php';
    include_once('connection.php');
session_start();
?>
<!-- Links to other pages-->
<br>
<a class="settings" href="addmusic.php">Adding music</a>
<br>
<br>
<a class="settings" href="GenrePreferences.php">Add to preferences</a>
<br>
<br>
<a class="settings" href="userdetails.php">Change details</a>
<br>
<br>
<a class="settings" href="logout.php">Logout</a>
</div>
<?php
// IF the user is an admin, then display the admin specific pages
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
    <li><a href="addadmin.php">Add Admins</a></li>
    <li><a href="removeusers.php">Remove Users</a></li>
    <?php
}
?>

</head>
<body>
</body>
</html>