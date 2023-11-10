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
    // upload image file
    $stmt->bindParam(':image',$_FILES["image"]["name"]);

    $stmt->execute();

    $target_dir = "image/";
    print_r($_FILES);
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if the file has been uploaded
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
    header("location:addmusic.php");
    }

    catch(PDOException $e)
    {
        $conn=null;
        echo "Some details are incorrect, please try again";
        header("Refresh: 5; url=addmusic.php");
    }
?>