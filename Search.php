<!DOCTYPE html>
<html>
<head>
    <title>Search for music</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
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
<!-- Search bar -->
<form action="addmusic.php" method="GET">
<input id="search" type="text" placeholder="Type here">
<input id="submit" type="submit" value="Search">

<?php
session_start(); 
include_once ("connection.php");
$stmt = $conn->prepare('SELECT * FROM tblMusic');
$stmt->execute();
$results = $stmt->fetchAll();
foreach ($results as $row): ?>
    
    <option value="<?=$row["Artist"]?>"><?=$row["Artist"]?></option>
    <option value="<?=$row["Genre"]?>"><?=$row["Genre"]?></option>
    <option value="<?=$row["SongTitle"]?>"><?=$row["SongTitle"]?></option>
    <option value="<?=$row["TitleNo"]?>"><?=$row["TitleNo"]?></option>
    <option value="<?=$row["Image"]?>"><?=$row["Image"]?></option>

<?php endforeach ?>
</form>
</body>
</html>
    