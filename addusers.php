<?php
header('Location: Signup.php');
try{

include_once("connection.php");
array_map("htmlspecialchars",$_POST);

$stmt=$conn->prepare("INSERT INTO tblusers(UserID,
Forename,Surname,Username,Password,Emailaddress,Phonenumber,Role)VALUES(NULL,:forename,:surname, :username,:password,:emailaddress,:phonenumber,:role)");
$role=0;

$stmt->binParam(':forename',$_POST["forename"]);
$stmt->binParam(':surname',$_POST["surname"]);
$stmt->binParam(':username',$_POST["username"]);
$stmt->binParam(':password',$_POST["password"]);
$stmt->binParam(':emailaddress',$_POST["emailaddress"]);
$stmt->binParam('phonenumber',$_POST["phonenumber"]);
$stmt->binParam(':role',$_POST[$role]);
$stmt->execute();
}

catch(PDOException $e)
{
$conn=null;
}