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
<br>
<p style="color:green;">
    <?php
    // displays a feedback message to signal the user
    if (isset($_SESSION['Library'])){
    echo str_repeat('&nbsp;', 8);
    echo($_SESSION['Library']);
    unset($_SESSION['Library']);
    } 
    ?>
</p>
<?php
    $stmt=$conn->prepare("SELECT  tblmusic.artist as art, tblmusic.image as img, tblmusic.SongTitle as st FROM tblLibrary
    INNER JOIN tblmusic on tblmusic.MusicID = tbllibrary.MusicID
    WHERE tbllibrary.UserID = :userID");
    $stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
    $stmt->execute();
    ?>
    <div class='music'>
<br>
<br>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))

        {
            echo'<form action="addtolibrary.php" method="post">';
            echo ("<img width='200' length='200' src=images/".$row["img"].">");
            echo "<br />";
            echo $row["st"].  "<br />" .' By '.$row["art"]. "<br />" .
            "<br></form>";
            // adds space between each album
            echo str_repeat('&nbsp;', 15);

        }
$conn=null;
?>
</div>

</body>
</html>
