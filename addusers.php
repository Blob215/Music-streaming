<?php

try{

include_once("connection.php");
array_map("htmlspecialchars",$_POST);
/*Insert into the database*/
$stmt=$conn->prepare("INSERT INTO tblusers (UserID,Username,Surname,Forename,Password,Emailaddress,Phonenumber,Role) 
VALUES(:UserID,:username,:surname,:forename,:password,:emailaddress,:phonenumber,0)");

$stmt->bindParam(':UserID',$_POST["userid"]);
$stmt->bindParam(':surname',$_POST["surname"]);
$stmt->bindParam(':forename',$_POST["forename"]);
$stmt->bindParam(':username',$_POST["username"]);
$stmt->bindParam(':password',$_POST["password"]);
$stmt->bindParam(':emailaddress',$_POST["emailaddress"]);
$stmt->bindParam('phonenumber',$_POST["phonenumber"]);
$stmt->execute();
}

catch(PDOException $e)
{
$conn=null;
}