<?php
header('url = addtopreferences.php');
include_once("connection.php");
session_start();
if (isset($_POST['submit']))
print_r($_POST);
{

$stmt=$conn->prepare("DELETE FROM TblPreferences WHERE UserID=:userid");
$stmt->bindParam(':userid', $_SESSION["userid"]);
$stmt->execute();
    $chkbox=$_POST['check'];

    $i=0;

    while($i<sizeof($chkbox)) {

        $stmt = $conn->prepare("INSERT INTO TblPrefences (UserID, Preference) VALUES(:userid,:preference)");
        $stmt->bindParam(':userid', $_SESSION["userid"]);
        $stmt->bindParam(':preference',$chkbox[$i]);
        $stmt->execute();

        $i=$i+1;
    }
}
$conn=null;
header('Location: GenrePreferences.php');
?>