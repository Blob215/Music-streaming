<html>
<title>About page</title>
<?php
    session_start();
    ?>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<!-- sets the width to the length of a device-->
<meta name="metaport" content="width=device-width, initial-scale=1">
<!-- Link to the stylesheets and bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .container-fluid{ background-color: #000000;
        top: 0;
    width: 100%}
        .navbar navbar-inverse  {background-color: #000000;}
        .navbar-brand a {color:black;}
        .navbar-header a{color:black;}
    </style>
</head>
<nav class="navbar navbar-inverse" style="background-color:#000000; class='font-family: 'Times New Roman', Times, serif;">
    <div class = "container-fluid">
        <ul class="nav navbar-nav">
            <li><h1 class="login">About Page</h1></li>
        </ul>
    </div>
    </nav>
    <br>
<!-- Text explaining what the website is-->
<h7 class="about"> This is a website that hosts music, that is built for user-friendly interactions while also providing artists a platform to upload their music. <br></h4>
<h7 class="about">At the bottom of this page, you will find a button that takes you back to the homepage. If you click this you will see multiple options, if you already have an account,<br></h4>
<h7 class="about">please click the login button and enter your username and password in order to access your library. So what's the scenario<br></h4>   

<!-- Button to redirect back to homepage-->
<div style="position: absolute; bottom: 5px; background-color: black" class="button">
    <a href="index.php" style="color: #ffffff">Go back to homepage</a>
    </div>
</body>
</html>