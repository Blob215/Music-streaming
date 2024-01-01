<?php
include_once("connection.php")
session_start(); 
array_map("htmlspecialchars", $_POST);

//changes the userID to the piece of music being added to library
$stmt = $conn->prepare("UPDATE tblLibrary SET UserID = :UserID, WHERE SongTitle = :songtitle");
$stmt->bindParam(':songtitle', $_GET['SongTitle'], PDO::PARAM_INT);
$stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
$stmt->execute();
if (isset($_SESSION['backURL'])){
    header('Location: ' . $_SESSION['backURL']);
}  
else {
    header('Location: Search.php');
}
?>