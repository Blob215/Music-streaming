<?php
try{

include_once("connection.php");
array_map("htmlspecialchars",$_POST);

$stmt=$conn->prepare("INSERT INTO tblsearch(AlbumTitle, Artist, Genre, SongTitle)VALUES(:albumtitle,:artist,:genre,:songtitle)");



catch(PDOException $e)
{
    echo "Search failed:".$e->getMessage();
    $conn=null;
}

SELECT * FROM TblSearch WHERE AlbumTitle='albumtitle' AND Artist='artist' AND Genre='genre' AND SongTitle='songtitle';

}
?>