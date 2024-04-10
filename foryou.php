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
    <title>For you</title>
<title>Settings</title>

</head>
<body>
<?php
    require 'navbar.php';
    include_once('connection.php');
?>
<br>
<a class="settings" ref="GenrePreferences.php">Add to preferences</a>
<?php
    
    $stmt=$conn->prepare("SELECT  tblmusic.artist as art, tblmusic.image as img, tblmusic.SongTitle as st, tblmusic.MusicID as id FROM tblPreferences
    INNER JOIN tblmusic on tblmusic.Genre = tblPreferences.Genre
    WHERE tblPreferences.UserID = :userID");
    $stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "<br />";
        echo'<form action="addtolibrary.php" method="post">';
        echo ("<img width='200' length='200' src=images/".$row["img"].">");
        echo "<br />";
        echo $row["st"].  "<br />" .' By '.$row["art"]. "<br />" .


        "<input type='submit' value='Add to library'><input type='hidden' name='MusicID'
        value=".$row['id']."><br></form>";

}
?>

</body>
</html>