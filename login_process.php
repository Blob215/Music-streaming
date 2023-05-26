<?php
session_start();
include_once ("connection.php");

$stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Username =:username;");
$stmt->bindParam(':username', $_POST['Username']);

$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    if ($_POST['password']==$row['Password']){
        $_SESSION['name']=$row["Username"];
        echo("<script> document.location.href='http://localhost/Library%20System/menu.php';
        </script>");
    }
    else{
        echo("<script> document.location.href='http://localhost/Library%20System/Login.php';
        </script>");
}
}
$conn=null;
;
?>