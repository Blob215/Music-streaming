<?php
header('url = addtopreferences.php');
include_once("connection.php");
session_start();
if (isset($_POST['submit']))
print_r($_POST);
print_r($_FILES);
{

$stmt=$conn->prepare("DELETE FROM TblPreferences WHERE UserID=:userid");
$stmt->bindParam(':userid', $_SESSION["userid"]);
$stmt->execute();
    $chkbox=$_POST['check'];

    $i=0;

    while($i<sizeof($chkbox)) {

        $stmt = $conn->prepare("INSERT INTO TblPreferences (UserID, Genre) VALUES(:userid,:preference)");
        $stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
        $stmt->bindParam(':preference',$chkbox[$i]);
        $stmt->execute();

        $i=$i+1;
    }
}
$conn=null;
header('Location: GenrePreferences.php');
?>