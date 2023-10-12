<?php
try{
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);
    $stmt=$conn->prepare("INSERT INTO
    tblmusic(AlbumTitle,Artist,Genre,SongTitle,TitleNo,image)
    VAlUES(:albumtitle,:artist,:genre,:songtitle,:titleno,:image)");

    $stmt->bindParam(':albumtitle',$_POST["AlbumTitle"]);
    $stmt->bindParam(':artist',$_POST["Artist"]);
    $stmt->bindParam(':genre',$_POST["Genre"]);
    $stmt->bindParam(':songtitle',$_POST["SongTitle"]);
    $stmt->bindParam(':titleno',$_POST["TitleNo"]);
    $stmt->bindParam(':image',$_post['image']);
    $stmt->execute();
    header("location:addmusic.php");
}

catch(PDOException $e)
{
    $conn=null;
    echo "Some details are incorrect, please try again";
    header("Refresh: 5; url=addmusic.php");
}