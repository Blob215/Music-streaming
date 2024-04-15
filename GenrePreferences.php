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
   <title>Genre Preferences</title>
   <link rel="stylesheet" type="text/css" href="stylesheet.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
   <style>
    .container-fluid{ background-color: #000000;
        top: 0;
    width: 100%}
        .navbar navbar-inverse  {background-color: #000000;}
        .navbar-brand a {color:black;}
        .navbar-header a{color:black;}
    </style>
</head>
<body>
<nav class="navbar navbar-inverse" style="background-color:#000000; class='font-family: 'Times New Roman', Times, serif;">
    <div class = "container-fluid">
        <ul class="navbar-nav">
            <li><h1 class="login">Genre Preferences</h1></li>
        </ul>
    </div>
    </nav>
    <br>
<?php
include_once('connection.php');
?>
<p style="color:green;">
    <?php
    // displays a feedback message to signal the user
    if (isset($_SESSION['Preference'])){
    echo($_SESSION['Preference']);
    unset($_SESSION['Preference']);
    } 
    ?>
</p>
<?php
// How the boxes are generated
$stmt = $conn->prepare("SELECT Genre FROM TblGenres  ORDER BY Genre ASC");
$stmt->execute();
while ($row =$stmt->fetch(PDO::FETCH_ASSOC))

{

    echo'<form action="Addtopreferences.php" method="post">';
    // adds space between each album
    echo str_repeat('&nbsp;', 10);
    ?><input name="check[]" multiple="multiple" id=".<?php echo $row['Genre'];
    ?>
    " type="checkbox" style='padding: 10px;' value="<?php echo $row['Genre'];?>" 
     >
    <label for="<?php echo $row['Genre']; ?>"> <?php echo $row['Genre'];?><br></label>
    </td></tr>
    <br>
    <?php
}
echo str_repeat('&nbsp;', 8);
?>

<input type="submit" name='submit' value="Confirm Preferences">

    <?php
?>

</table>
</form>
<div style="position: absolute; bottom: 5px; background-color: black" class="button">
    <a href="menu.php" style="color: #ffffff">Go back to homepage</a>
</body>
</html>