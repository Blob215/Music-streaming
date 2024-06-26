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
<title>Search for music</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta http-equip="Content-Type" content="text/html; charset=iso-8859-1">
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
    echo($_SESSION['Library']);
    unset($_SESSION['Library']);
    } 
    ?>
</p>
<?php
// Select albums that the user has added based on their User ID
    $stmt=$conn->prepare("SELECT  tblmusic.artist as art, tblmusic.image as img, tblmusic.SongTitle as st FROM tblLibrary
    INNER JOIN tblmusic on tblmusic.MusicID = tbllibrary.MusicID
    WHERE tbllibrary.UserID = :userID");
    $stmt->bindParam(':userID', $_SESSION['UserID'], PDO::PARAM_INT);
    $stmt->execute();
    ?>
<br>
<br>

<?php
$pos = 1;
    echo("<table>");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
// Displaying all the albums chosen
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
            "<br></form>";
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
