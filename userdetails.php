<!DOCTYPE html>
<html>
<title>Change user details</title>
<?php
include_once("connection.php");
require 'navbar.php';
session_start();
if (!isset($_SESSION['UserID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>
<body>
<div style="position: absolute; bottom: 5px; background-color: black">
<li><a href="settings.php">Go back to Settings</a></li>
</div>
<?php
$stmt = $conn->prepare("SELECT * FROM tblUsers WHERE UserID=:userID");
$stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<form action="changedetailsql.php" method="post" class="About">
User name:<input type="text" name="Username"><br>
Password:<input type="password" name="passwd"><br>
Email Address:<input type="text" name="emailaddress"><br>
Phone Number:<input type="text" name="phonenumber"><br>
<input type='submit' value='Change details'>

<p style="color:green;">
    <?php
    // displays a feedback message to signal the user
    if (isset($_SESSION['Change'])){
    echo($_SESSION['Change']);
    unset($_SESSION['Change']);
    } 
    ?>
</p>
</body>
</html>