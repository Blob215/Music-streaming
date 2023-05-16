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
    
    <title>Add Users</title>
    
</head>
<body>
       
    <form action="addusers.php" method = "post">
        Username:<input type="text" name="username"><br>
        First name:<input type="text" name="forename"><br>
        Last name:<input type="text" name="surname"><br>
        Password:<input type="password" name="password"><br>
        Emailaddress:<input type="text" name="Emailaddress"><br>
        Phonenumber:<input type="text" name="Phonenumber"><br>
        Role:<br>   
        <input type="radio" name="role" value="Listener" checked> Listener<br>
        <input type="radio" name="role" value="Admin"> Admin<br>
        <input type="submit" value="Add User">
        <br>
      </form>      

<a href="menu.php">Menu</a><br>
<a href="logout.php">Log Out</a>
</body>
</html>

<?php
include_once('connection.php');

$stmt = $conn->prepare("SELECT * FROM TblUsers");
$stmt->execute();
echo("<br>"."<br>");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{echo($row["Forename"].' '.$row["Surname"]."<br>");}
?>