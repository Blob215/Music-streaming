<?php 

$connection = mysqli_connect("localhost","root","");

mysqli_select_db("blog1")or die(mysqli_error());

$safe_value = mysqli_real_escape_string($_POST['search']);

$result = mysqli_query("SELECT * FROM tblmusic WHERE `songtitle` LIKE %$safe_value%");
 while ($row = mysqli_fetch_assoc($result)) {
echo "<div id='link' onClick='addText(\"".$row['SongTitle']."\");'>" . $row['SongTitle'] . "</div>";  
 }


  ?>