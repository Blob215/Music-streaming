<?php
include_once("connection.php");
session_start(); 
array_map("htmlspecialchars", $_GET);

// removes the user from the database
$stmt = $conn->prepare("DELETE FROM tblusers WHERE UserID = :userID");
$stmt->bindParam(':userID', $_GET['UserID'], PDO::PARAM_INT);
$stmt->execute();

// sends the user to the change users page
header('Location: changeusers.php');
?>