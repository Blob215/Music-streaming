<?php
//print_r($_SESSION);
//header('Location: addmusic.php');
//print_r($_POST);
try{
    include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	//create order if not already created
    $x=1;

    $stmt=$conn->prepare("INSERT INTO
    tblmusic(AlbumTitle,Artist,Genre,SongTitle,TitleNo,Image)
    VAlUES(:albumtitle,:artist,:genre,:songtitle,:titleno,:Pic)");

    $stmt->bindParam(':albumtitle',$_POST["AlbumTitle"]);
    $stmt->bindParam(':artist',$_POST["Artist"]);
    $stmt->bindParam(':genre',$_POST["Genre"]);
    $stmt->bindParam(':songtitle',$_POST["SongTitle"]);
    $stmt->bindParam(':titleno',$_POST["TitleNo"]);
    // upload image file
    $stmt->bindParam(':Pic', $_FILES["piccy"]["name"]);
    $stmt->execute();
    $target_dir = "Images/";
    print_r($_FILES);
    $target_file = $target_dir . basename($_FILES["piccy"]["name"]);
    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["piccy"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["piccy"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    catch(PDOException $e)
    {
        echo "Some details are incorrect, please try again";
        //header("Refresh: 5; url=addmusic.php");
    }
$conn=null;
?>