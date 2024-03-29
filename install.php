<?php

include_once("connection.php");


$stmt = $conn->prepare("DROP TABLE IF EXISTS tblUsers;
CREATE TABLE tblUsers 
(UserID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(20) NOT NULL,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
password VARCHAR(300) NOT NULL,
Emailaddress VARCHAR(50) NOT NULL,
Phonenumber INT(11) NOT NULL,
Role TINYINT(1))");
$stmt->execute();
$stmt->closeCursor(); 

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblMusic;
CREATE TABLE tblMusic
(MusicID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Artist VARCHAR(50) NOT NULL,
Genre VARCHAR(50) NOT NULL,
SongTitle VARCHAR(20) NOT NULL,
TitleNo INT(1) NOT NULL,
Image VARCHAR(255) NOT NULL)");
$stmt->execute();
$stmt->closeCursor(); 

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblLibrary;
CREATE TABLE tblLibrary(
MusicID INT(7),
UserID INT(7),
PRIMARY KEY(MusicID,UserID))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblPreferences;
CREATE TABLE tblPreferences
(UserID INT(6) NOT NULL,
Genre VARCHAR(50) NOT NULL,
PRIMARY KEY(UserID,Genre))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblGenres;
CREATE TABLE TblGenres
(Genre VARCHAR(20) PRIMARY KEY)");
$stmt->execute();
$stmt->closeCursor();
?>
