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
<nav class="navbar navbar-inverse" style="background-color:#000000; class='font-family: 'Times New Roman', Times, serif;">
    <div class = "container-fluid">
        <ul class="nav navbar-nav">
            <li><h1 class="login">Search for music</h1></li>
        </ul>
    </div>
    </nav>
    <br>

<br>
<?php
include_once "connection.php";
$stmt=$conn->prepare("SELECT * FROM Tblmusic");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))

        {//uses a hidden input which contains the ID of the tuck selected

            echo'<form action="addtolibrary.php" method="post">';
            echo ("<img width='200' length='200' src=images/".$row["Image"].">");
            echo "<br />";
            echo $row["Artist"].' '.$row["SongTitle"]. "<br />" .
 

            "<input type='submit' value='Add to library'><input type='hidden' name='MusicID'
            value=".$row['MusicID']."><br></form>";

        }
?>
</form>
</body>
</html>
