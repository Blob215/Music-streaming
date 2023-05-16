<?php
try{
	header('Location: users.php');
	array_map("htmlspecialchars", $_POST);
	include_once("connection.php");
	switch($_POST["role"]){
		case "Listener":
			$role=0;
			break;
		case "Admin":
			$role=1;
			break;
        case "Musician":
            $role=2;
		}

	$username=$_POST["surname"].".".$_POST["forename"][0];
	$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$stmt = $conn->prepare("INSERT INTO TblUsers(UserID,Username,Surname,Forename,password,Emailaddress,Phonenumber,Role)VALUES (NULL,:username,:surname,:forename,:password,:year,:balance,:role)");
	$stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':Emailaddress', $_POST["year"]);
    $stmt->bindParam(':Phonenumber', $_POST["balance"]);
    $stmt->bindParam(':role', $role);
	$stmt->execute();
	$conn=null;
	}
catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
	$conn=null;
?>