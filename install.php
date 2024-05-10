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
(UserID INT(7) NOT NULL,
Genre VARCHAR(50) NOT NULL,
PRIMARY KEY(UserID,Genre))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblGenres;
CREATE TABLE TblGenres
(Genre VARCHAR(50) PRIMARY KEY)");
$stmt->execute();
$stmt->closeCursor();
// 2d array of Genres
$Genres = [
    ['Hip hop'],
    ['R&B'],
    ['Jazz'],
    ['Blues'],
    ['Electronic'],
    ['Rock'],
    ['EDM'],
    ['Pop'],
    ];
  // inputs Genre array into table row by row
  $stmt = $conn->prepare("INSERT INTO tblGenres (Genre) VALUES (?)");
  try {
      $conn->beginTransaction();
      foreach ($Genres as $row)
      {
          $stmt->execute($row);
      }
      $conn->commit();
  }catch (Exception $e){
      $conn->rollback();
      throw $e;
  }
$users = [
    ['2', 'Alex', 'Flanders', 'Flander212', password_hash("fLanDy21@", PASSWORD_DEFAULT), '0456654336', 'Alexflander2@gmail.com', '0'],
    ['3', 'Rosa', 'Carlsson', 'ROSY', password_hash("Carlsssto326", PASSWORD_DEFAULT), '0478887222', 'Rosacarlsson@gmail.com', '0'],
    ['4', 'Brian', 'Collins', 'BRAINzz', password_hash("Kesssens:;7829", PASSWORD_DEFAULT), '0455112344', 'briancollinss@gmail.com', '0'],
    ['1', 'Julian', 'Gregory', 'j.gregory', password_hash("JiDFORever7&8*", PASSWORD_DEFAULT), '01883423234', 'JulianGregory@gmail.com', '1'],
    ['6', 'Brandon', 'Traner', 'Blrod353', password_hash("Hii1b23oz2o3b4", PASSWORD_DEFAULT), '08566381824', 'Brandon.traner@gmail.com', '1'],
    ['7', 'Frey', 'Simpson', 'Fryfly789', password_hash("HUI£kjbkjdi13IF", PASSWORD_DEFAULT), '04574123242', 'Freysimpson@gmail.com', '1'],
    ['5', 'Borway', 'Gray', 'oLght629', password_hash("TpaB91", PASSWORD_DEFAULT), '04667923140', 'Gray.bray@gmail.com', '1'],
];
// inputs Users array into table row by row
$stmt = $conn->prepare("INSERT INTO tblUsers (UserID, Forename, Surname, Username, password, Phonenumber, Emailaddress, Role) VALUES (?,?,?,?,?,?,?,?)");
  try {
      $conn->beginTransaction();
      foreach ($users as $row)
      {
          $stmt->execute($row);
      }
      $conn->commit();
  }catch (Exception $e){
      $conn->rollback();
      throw $e;
  }

$items = [
    ['1', 'SOMAS', 'Hip hop', 'NY', 'black.jpg'],
    ['2', 'Iron legion', 'R&B', 'I Want You', 'black.jpg'],
    ['3', 'Bill Evans', 'Jazz', 'Blue in Green', 'black.jpg'],
    ['4', 'Nina', 'Blues', 'Four fingers', 'black.jpg'],
    ['5', 'John', 'Electronic', 'Mirror', 'black.jpg'],
    ['6', 'Hooba', 'Rock', 'Kesen', 'black.jpg'],
    ['7', 'Forrest', 'EDM', 'Frosts', 'black.jpg'],
];
$stmt = $conn->prepare("INSERT INTO tblMusic (MusicID, Artist, Genre, SongTitle, Image) VALUES (?,?,?,?,?)");
  try {
      $conn->beginTransaction();
      foreach ($items as $row)
      {
          $stmt->execute($row);
      }
      $conn->commit();
  }catch (Exception $e){
      $conn->rollback();
      throw $e;
  }

?>
