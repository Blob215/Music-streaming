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
$stmt = $conn->prepare("SELECT TblGenres.Genre, TblPreferences.PreferenceID FROM TblGenres LEFT JOIN TblPreferences ON
TblPreferences.Preference = TblGenres.Genre AND UserID = :userif ORDER BY TblGenres.Genre ASC");
$stmt->bindParam(':userid', $_SESSION['userid']);
$stmt->execute();
while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
{
    ?><iput name="check[]" multiple="multiple" id="<?php
    echo $row['Genre'];
    ?>
    " type="checkbox" style='padding: 10px;' value="<?php echo $row['Genre'];?>" <?php if ($row['PreferenceID'] != null) echo 'checked'; ?> >
    <label for="<?php echo $row['Genre']; ?>"> <?php echo $row['Genre'];?></label>
    </td></tr>
    <?php
}
?>
<input type="submit" name='submit' value="Confirm Preferences">
</table>
</form>
</body>
</html>