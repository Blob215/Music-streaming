<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title class="login">Add New Music</title>
        <style>
            img{
                width:50%;
            }
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
            <li><h1 class="login">Add Music</h1></li>
        </ul>
    </div>
    </nav>
    <br>
<form action='addmusicsql.php' method='POST' enctype="multipart/form-data">
    MusicID:<input type="number" name="musicID"><br>
    Artist:<input type="text" name="artist"><br>
    Genre:<input type="text" name="genre"><br>
    SongTitle:<input type="text" name="songtitle"><br>
    TitleNo:<input type="number" name="titleno"><br>
    Image:<input type="file" id="piccy" name="piccy" accept="image/*"><br>
    <input type="submit" value="Add New Music"><br>

    <div style="position: absolute; bottom: 5px; background-color: black">
    <li><a href="menu.php">Go back to homepage</a></li>
    </div>
</form>
</body>
</html>