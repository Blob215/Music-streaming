<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
CREATE TABLE TblUsers 
(UserID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(20) NOT NULL,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(30) NOT NULL,
Emailaddress VARCHAR(50) NOT NULL,
Phonenumber INT(11) NOT NULL,
Role TINYINT(1))");
$stmt->execute();
$stmt->closeCursor();

include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblMusic;
CREATE TABLE TblMusic
(AlbumTitle VARCHAR(50) PRIMARY KEY,
Artist VARCHAR(50) NOT NULL,
Genre VARCHAR(50) NOT NULL,
SongTitle VARCHAR(20) NOT NULL,
TitleNo INT(4) NOT NULL,
Image VARCHAR(100)");
$stmt->execute();
$stmt->closeCursor();

include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblSearch;
CREATE TABLE TblSearch
(AlbumTitle VARCHAR(50),
Artist VARCHAR(50) NOT NULL,
Genre VARCHAR(50) NOT NULL,
SongTitle VARCHAR(20) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();
