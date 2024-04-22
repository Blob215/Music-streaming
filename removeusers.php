<!DOCTYPE html>
<html>
<head>
   <title>Delete users</title>
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
<?php

include_once("connection.php");

session_start();

if (!isset($_SESSION['UserID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}

// fetch all users
$stmt = $conn->prepare("SELECT * FROM tblUsers ORDER BY username");
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userData) {
    $users = 1;
}
else {
    $users = 0;
}
if ($users == 1) {
    do {
        echo ('</div>');
        echo ('<div class="User-ID">');
            if ($userData['Role'] == 1) {
                echo ('<h3>Admin</h3>');
                echo ($userData["Username"]);
            }
            else {
                echo ('<h3>User</h3>');
                echo ('</div>');
                echo ($userData["Username"]);
                echo ('<div class="remove">');
                echo ('<a class="link" href="removeusersql.php?UserID=' . $userData["UserID"] .'">X</a>');
                echo ('</div>');
                echo('</div>');
            }
        
    } while ($userData = $stmt->fetch(PDO::FETCH_ASSOC));
} else {
    // error message if there are no users
    echo('<br>No users to display');
}
?>
<div style="position: absolute; bottom: 5px; background-color: black" class="button">
    <a href="settings.php" style="color: #ffffff">Go back to settings</a>
</div>
</html>