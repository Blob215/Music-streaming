<?php
session_start(); 
if (!isset($_SESSION['loggedinID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
</head>
<body>
<?php
    require 'navbar.php';
    include_once('connection.php');
?>
<?php
    $stmt=$conn->prepare("SELECT * FROM tblMusic WHERE userID = :userID");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo ($row["Artist"]);
    echo "<br />";
    echo ($row["SongTitle"]);
    echo "<br />";
    echo ("<img width='200' length='200' src=images/".$row["Image"].">");
    echo "<br />";
}
?>

</body>
</html>
