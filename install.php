<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUser;
CREATE TABLE TblUsers 
(UserID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(30) NOT NULL,
Email address VARCHAR(50) NOT NULL,
Phone number INT(11) NOT NULL,
Role TINYINT(2))");
$stmt->execute();
$stmt->closeCursor();
?>

<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblMusic;
CREATE TABLE TblMusic
(AlbumTitle VARCHAR(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Artist VARCHAR(50) NOT NULL,
Genre VARCHAR(50) NOT NULL,
SongTitle VARCHAR(20) NOT NULL,
TitleNo. INT(4) NOT NULL,");
$stmt->execute();
$stmt->closeCursor();
?>

<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblSearch;
(AlbumTitle VARCHAR(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Artist VARCHAR(50) NOT NULL,
Genre VARCHAR(50) NOT NULL,
SongTitle VARCHAR(20) NOT NULL,");
$stmt->execute();
$stmt->closeCursor();
?>