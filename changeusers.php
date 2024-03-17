<?php

include_once("connection.php");

session_start();

if (!isset($_SESSION['UserID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}

// fetch all users
$stmt = $conn->prepare("SELECT * FROM tblUsers ORDER BY username");
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // row to fill the width of the page
    echo('<div class="custom-row" style="height:10vh">');
        echo ('<div class="left-content">'); // image on left of page
            echo ('<h3>'.$userData['UserID'].'</h3>');
        echo ('</div>');
        echo ('<div class="User-ID">');
            if ($userData['Role'] == 1) {
                echo ('<h3>Admin</h3>');
            }
            else {
                echo ('<h3>User</h3>');
            }
        echo ('</div>');
        echo ('<div class="remove">');
            echo ('<a class="link" href="removeusers.php?UserID=' . $userData["UserID"] .'">X</a>');
        echo ('</div>');
    echo('</div>');
?>