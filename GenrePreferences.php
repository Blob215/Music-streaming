<?php
session_start(); 
if (!isset($_SESSION['UserID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Favourite genre </title>
</head>
<body>
<nav class="navbar navbar-inverse" style="background-color:#000000; class='font-family: 'Times New Roman', Times, serif;">
    <div class = "container-fluid">
        <ul class="nav navbar-nav">
            <li><h1 class="login">Favourite Genre</h1></li>
        </ul>
    </div>
    </nav>
    <br>
<?php
include_once('connection.php');
?>
<?php
// How the boxes are generated
$stmt = $conn->prepare("SELECT Genre FROM TblGenres  ORDER BY Genre ASC");
$stmt->execute();
while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo'<form action="Addtopreferences.php" method="post">';
    ?><input name="check[]" multiple="multiple" id=".<?php echo $row['Genre'];
    ?>
    " type="checkbox" style='padding: 10px;' value="<?php echo $row['Genre'];?>" 
     >
    <label for="<?php echo $row['Genre']; ?>"> <?php echo $row['Genre'];?><br></label>
    </td></tr>
    <?php
}
?>
<input type="submit" name='submit' value="Confirm Preferences">

    <?php
?>

</table>
</form>
</body>
</html>