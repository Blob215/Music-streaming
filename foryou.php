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
<a class="settings" href="GenrePreferences.php">Add to preferences</a>
<br>
<?php
/*Select music genres based on the UserID that chose it*/
    $stmt=$conn->prepare("SELECT  tblmusic.artist as art, tblmusic.image as img, tblmusic.SongTitle as st, tblmusic.MusicID as id FROM tblPreferences
    INNER JOIN tblmusic on tblmusic.Genre = tblPreferences.Genre
    WHERE tblPreferences.UserID = :userID");
    $stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
    $stmt->execute();
    ?>
<br>
<br>
<?php
$pos = 1;
    echo("<table>");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))

        {
            


            if($pos==1){

                echo("<tr>");

            }
            
            echo("<td>");
            echo '<div class="music">';

            echo'<form action="addtolibrary.php" method="post">';
            echo ("<img width='200' length='200' src=images/".$row["img"].">");
            echo "<br />";
            echo $row["st"].  "<br />" .' By '.$row["art"]. "<br />";
            

            echo "<br />" .
            "<input type='submit' value='Add to library'><input type='hidden' name='MusicID'
            value=".$row['id']."><br></form>";
            echo '</div>';
            echo("</td>");

            $pos=$pos+1;

            if($pos==6){

                echo("</tr>");

                $pos=1;

            }
            
            
            }
$conn=null;
echo("</table>");
?>
</div>
</form>
</body>
</html>
