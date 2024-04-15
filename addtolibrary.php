<?php

include_once("connection.php");

session_start();

array_map("htmlspecialchars", $_POST);

print_r($_POST);

//changes the userID to the piece of music being added to library

$stmt = $conn->prepare("INSERT INTO  tblLibrary (UserID, MusicID) VALUES (:userID,:musicID)");

$stmt->bindParam(':musicID', $_POST['MusicID'], PDO::PARAM_INT);

$stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);

$stmt->execute();


$_SESSION['Library']="Added to library";
header('Location: Library.php');

?>