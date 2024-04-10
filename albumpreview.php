<!DOCTYPE html>
<html>
<head>
<title>Album preview</title>
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

<nav class="navbar navbar-inverse" style="background-color:#000000; class='font-family: 'Times New Roman', Times, serif;">
    <div class = "container-fluid">
        <ul class="navbar-nav">
            <li><h1 class="login">Album preview</h1></li>
            <li class="nav">Click_<a href="menu.php" class="menu"> here </a>_to go back to the homepage</li>
    </ul>
    </nav>
<br>
<form action="searchsql.php" method="post">
    <input type="text" placeholder="Search for song titles" name="SongTitle">
    <button type="submit" name="save" class="btn btn-primary">Search</button>
</form>
<?php
include_once "connection.php";
$stmt=$conn->prepare("SELECT * FROM Tblmusic");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))

        {
            echo "<br />";
            echo ("<img width='200' length='200' src=images/".$row["Image"].">");
            echo "<br />";
            echo $row["SongTitle"].  "<br />" .' By '.$row["Artist"]. "<br />" ;

        }
$conn=null;
?>
</form>
</body>
</html>
