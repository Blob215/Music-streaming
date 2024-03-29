<?php 
session_start(); 
include_once ("connection.php");

// sanitise  $_POST array
array_map("htmlspecialchars", $_POST);

// selects all columns from the user's row
$stmt = $conn->prepare("UPDATE tblusers SET Username=:username, Password=:password, Emailaddress=:emailaddress, phonenumber=:phonenumber WHERE UserID =:userID ;" );
$stmt->bindParam(':userID', $_SESSION['UserID']);

$hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);

$stmt->bindParam(':username',$_POST["username"]);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':emailaddress',$_POST["emailaddress"]);
$stmt->bindParam(':phonenumber',$_POST["phonenumber"]);
$stmt->execute();

$_SESSION['Change']="Details succesfully changed";
header('Location: userdetails.php');

?>