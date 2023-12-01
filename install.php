<?php
try {
include_once("connection.php");


$stmt = $conn->prepare("DROP TABLE IF EXISTS tblUsers;
CREATE TABLE tblUsers 
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

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblMusic;
CREATE TABLE tblMusic
(AlbumTitle VARCHAR(50) PRIMARY KEY,
Artist VARCHAR(50) NOT NULL,
Genre VARCHAR(50) NOT NULL,
SongTitle VARCHAR(20) NOT NULL,
TitleNo INT(1) NOT NULL,
Image VARCHAR(255) NOT NULL)");
$stmt->execute();
$stmt->closeCursor(); 



$stmt = $conn->prepare("DROP TABLE IF EXISTS tblSearch;
CREATE TABLE tblSearch
(AlbumTitle VARCHAR(50) PRIMARY KEY,
Artist VARCHAR(50) NOT NULL,
Genre VARCHAR(50) NOT NULL,
SongTitle VARCHAR(20) NOT NULL)");
$stmt->execute();
$stmt->closeCursor(); 

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblPreferences;
CREATE TABLE tblPreferences
(PreferenceID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UserID INT(6) NOT NULL,
PreferenceType CHAR(1) NOT NULL,
Prefernce VARCHAR(20))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblGenres;
CREATE TABLE TblGenres
(Genre VARCHAR(20))");
$stmt->execute();
$stmt->closeCursor();

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;
?>
