<!DOCTYPE html>
<html>
<head>
    <title>Add a new admin</title>
<!-- Link to stylesheets and bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <style>
        body {
            background-color:#000000
        }
    </style>
</head>
<body>
<!-- Basic form to fill in field names to add admins-->
    <h1 class="admin">Add administrators</h1>
<form class="admin" action='addadminsql.php' method="POST">
    UserID:<input type="text" name="userid"><br>
    Forename:<input type="text" name="forename"><br>
    Surname:<input type="text" name="surname"><br>
    Username:<input type="text" name="username"><br>
    Password:<input type="text" name="password"><br>
    Emailaddress:<input type="text" name="emailaddress"><br>
    Phone Number:<input type="text" name="phonenumber"><br>
    <input type="submit" value="Sign Up an admin"><br>
</body>
</html>