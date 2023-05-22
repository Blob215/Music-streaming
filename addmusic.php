<!DOCTYPE html>
<html>
<head>
    <title>Add New Music</title>
</head>
<body>
    <h1>Add New Music to catalogue</h1>
<form action='additems.php' method='POST'>
    AlbumTitle:<input type="text" name="albumtitle"><br>
    Artist:<input type="text" name="artist"><br>
    Genre:<input type="text" name="genre"><br>
    SongTitle:<input type="text" name="songtitle"><br>
    TitleNo:<input type="number" name="titleno"><br>
    Image:<input type="image" name="image"><br>
    <input type="submit" value="Add New Music"><br>
</form>
</body>
</html>