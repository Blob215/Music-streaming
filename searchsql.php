<?php
    require 'navbar.php';
    echo '<br>';
?>
<?php
include_once("connection.php");
array_map("htmlspecialchars",$_POST);
// Selecting the piece of music by the user based on what they searched for
$stmt=$conn->prepare("SELECT * FROM tblmusic WHERE SongTitle=:title");
$stmt->bindParam(':title',$_POST["SongTitle"]);
$stmt->execute();
?>
<form action="searchsql.php" method="post">
    <input type="text" placeholder="Search for song titles" name="SongTitle">
    <button type="submit" name="save" class="btn btn-primary">Search</button>
</form>
<?php
//Display song that is searched for
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))

        {
            echo'<form action="addtolibrary.php" method="post">';
            echo ("<img width='200' length='200' src=images/".$row["Image"].">");
            echo "<br />";
            echo $row["SongTitle"].  "<br />" .' By '.$row["Artist"]. "<br />" .
 

            "<input type='submit' value='Add to library'><input type='hidden' name='MusicID'
            value=".$row['MusicID']."><br></form>";

        }
$conn=null;
?>
