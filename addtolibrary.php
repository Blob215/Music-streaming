<?php
include_once("connection.php");
session_start();
array_map("htmlspecialchars", $_POST);

//changes the userID to the piece of music being added to library
$stmt = $conn->prepare("UPDATE tblLibrary SET UserID = :userID WHERE SongTitle = :songtitle");
$stmt->bindParam(':songtitle', $_GET['SongTitle'], PDO::PARAM_INT);
$stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);

$stmt->execute();

$stmt->execute();

?>