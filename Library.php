<?php
session_start(); 
if (!isset($_SESSION['UserID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
</head>
<body>
<?php
    require 'navbar.php';
    include_once('connection.php');
?>
<?php
    $stmt=$conn->prepare("SELECT  tblmusic.artist as art, tblmusic.image as img, tblmusic.SongTitle as st FROM tblLibrary
    INNER JOIN tblmusic on tblmusic.MusicID = tbllibrary.MusicID
    WHERE tbllibrary.UserID = :userID");
    $stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo "<br />";
    
    echo ("<img width='200' length='200' src=images/".$row["img"].">");

    echo "<br />";

    echo ($row["art"]);

    echo "<br />";

    echo ($row["st"]);

    echo "<br />";


}
?>

</body>
</html>
