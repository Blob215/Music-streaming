<html>
<?php
    session_start();
    ?>
<!-- sets the width to the length of a device-->
<meta name="metaport" content="width=device-width, initial-scale=1">
<!-- Link to the stylesheets and bootstrap-->
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
<nav class="navbar navbar-inverse" style="background-color:#000000; class='font-family: 'Times New Roman', Times, serif;">
    <div class = "container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="library.php">Library</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="foryou.php">For you</a></li>
        </ul>
    </div>
    </nav>

