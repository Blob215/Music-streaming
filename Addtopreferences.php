<?php
include_once("connection.php");
try {
    session_start();
//changes the userID to the genre so each user can add a genre
if (isset($_POST['submit']))

{
$stmt=$conn->prepare("DELETE FROM TblPreferences WHERE UserID=:userid");
$stmt->bindParam(':userid', $_SESSION["userid"]);
$stmt->execute();
    $chkbox=$_POST['check'];

    $i=0;

while($i<sizeof($chkbox)) {
$stmt = $conn->prepare("INSERT INTO  tblPreferences (UserID, Genre) VALUES (:userID,:genre)");
$stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
$stmt->bindParam(':genre',$chkbox[$i]);

$stmt->execute();
}
}
$conn=null;
header('Location: GenrePreferences.php');
}
catch(Exception $e)
{
    header('Location: GenrePreferences.php');
}
?>

