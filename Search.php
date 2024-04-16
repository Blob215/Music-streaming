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
    <style>
    .container-fluid{ background-color: #000000;
        top: 0;
    width: 100%}
        .navbar navbar-inverse  {background-color: #000000;}
        .navbar-brand a {color:black;}
        .navbar-header a{color:black;}
    </style>
</head>
<body>
<?php
    require 'navbar.php';
    
?>
<br>
<form action="searchsql.php" method="post">
    <input type="text" placeholder="Search for song titles" name="SongTitle">
    <button type="submit" name="save" class="btn btn-primary">Search</button>
</form>
<?php
include_once "connection.php";
$stmt=$conn->prepare("SELECT * FROM Tblmusic");
$stmt->execute();
?>
<br>
<br>
<?php
$pos = 1;
echo("<table>");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))

        {
            
            echo '<div class="music">';

            if($pos==1){

                echo("<tr>");

            }
            
            echo("<td>");
            

            echo'<form action="addtolibrary.php" method="post">';
            echo ("<img width='200' length='200' src=images/".$row["Image"].">");
            echo "<br />";
            echo $row["SongTitle"].  "<br />" .' By '.$row["Artist"]. "<br />";
            

            echo "<br />" .
            "<input type='submit' value='Add to library'><input type='hidden' name='MusicID'
            value=".$row['MusicID']."><br></form>";
            
            echo("</td>");

            $pos=$pos+1;

            if($pos==8){

                echo("</tr>");

                $pos=1;

            }
            echo '</div>';
            
            }
$conn=null;
echo("</table>");
?>
</div>
</form>
</body>
</html>
