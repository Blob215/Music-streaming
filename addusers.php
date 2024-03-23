<?php

try{

include_once("connection.php");
array_map("htmlspecialchars",$_POST);
/*Insert into the database*/
$stmt=$conn->prepare("INSERT INTO 
tblusers (Username,Surname,Forename,Password,Emailaddress,Phonenumber,Role) 
VALUES(:username,:surname,:forename,:password,:emailaddress,:phonenumber,0)");

$hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);

$stmt->bindParam(':surname',$_POST["surname"]);
$stmt->bindParam(':forename',$_POST["forename"]);
$stmt->bindParam(':username',$_POST["username"]);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':emailaddress',$_POST["emailaddress"]);
$stmt->bindParam('phonenumber',$_POST["phonenumber"]);
$stmt->execute();
}

catch(PDOException $e)
{
$conn=null;
}

