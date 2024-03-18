<!DOCTYPE html>
<html>
<title>Change user details</html>
<?php
include_once("connection.php");
require 'navbar.php';

if (!isset($_SESSION['UserID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>
</html>