<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title class="login">Add New Music</title>
        <style>
            img{
                width:50%;
            }
        </style>
</head>
<body>
    <h1>Add New Music to catalogue</h1>
<form action='addmusicsql.php' method='POST'>
    AlbumTitle:<input type="text" name="albumtitle"><br>
    Artist:<input type="text" name="artist"><br>
    Genre:<input type="text" name="genre"><br>
    SongTitle:<input type="text" name="songtitle"><br>
    TitleNo:<input type="number" name="titleno"><br>
    Image: <input type="file" id="piccy" name="piccy" accept="image/*"><br>
    <input type="submit" value="Add New Music"><br>
</form>
</body>
</html>