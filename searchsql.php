<?php
include_once 'connection.php';
if(count($_POST)>0) {
$SongTitle=$_POST['SongTitle'];
$result = mysqli_query($conn,"SELECT * FROM TblMusic where SongTitle='$SongTitle' ");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<table>
<tr>
<td>SongTitle</td>
<td>Artist</td>
<td>Genre</td>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["SongTitle"]; ?></td>
<td><?php echo $row["Artist"]; ?></td>
<td><?php echo $row["Genre"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>