<?php
//print_r($_SESSION);
try{
    include_once('connection.php');
	  array_map("htmlspecialchars", $_POST);

    $stmt=$conn->prepare("INSERT INTO tblmusic(Artist,Genre,SongTitle,Image)
    VAlUES(:artist,:genre,:songtitle,:Pic)");

    $stmt->bindParam(':artist',$_POST["artist"]);
    $stmt->bindParam(':genre',$_POST["genre"]);
    $stmt->bindParam(':songtitle',$_POST["songtitle"]);
    $stmt->bindParam(':Pic', $_FILES["piccy"]["name"]);
    $stmt->execute();
    $target_dir = "images/";
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
        echo ". Some details are incorrect, please try again";
        header("Refresh: 5; url=addmusic.php");
    }
    $_SESSION['Music']="Added music successfully";
    header('Location: addmusic.php');

$conn=null;
?>