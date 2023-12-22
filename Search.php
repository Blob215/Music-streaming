<!DOCTYPE html>
<html>
<head>
    <title>Search for music</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta http-equip="Content-Type" content="text/html; charset=iso-8859-1">
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
        <ul class="nav navbar-nav">
            <li><h1 class="login">Search for music</h1></li>
        </ul>
    </div>
    </nav>
    <br>
<!-- Search bar -->
<form action="addmusic.php" method="GET">
<input id="search" type="text" placeholder="Type here">
<input id="submit" type="submit" value="Search">

<?php
session_start(); 
include_once ("connection.php");
mysqli_connect("localhost","root","");
mysqli_select_db("tblmusic", $conn);
$res=mysqli_query("SELECT * FROM tblmusic");
echo "<table>";

while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>";?><img src="<?php echo $row["Image"]; ?>" height="100" width ="100"><?php echo "</td>";
echo "<td>"; echo $row["SongTitle"]; echo "</td>";


}
echo "</table>";
?>



</form>
</body>
</html>
    