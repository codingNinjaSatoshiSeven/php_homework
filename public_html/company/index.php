<?php 
  session_start();

  require_once "authHelper.php";
?>
<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/company/">Yu-Gi-Oh Cards</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/company/">Home</a></li>
            <li><a href="/company/about.php">About</a></li>
            <li><a href="/company/products.php">Products</a></li>
            <li><a href="/company/news.php">News</a></li>
            <li><a href="/company/contacts.php">Contacts</a></li>
            <li><a href="/company/secure.php">Secure</a></li>
            <li><a href="/company/user-query.php">User Query</a></li>
            <li><a href="/company/all-companies-users.php">All Companies Users</a></li>
            <li><a href='/company/yugioh-company-users.php'>Yi-gi-oh Card Company Users</a></li>
            <li><a href='/company/pc314-company-users.php'>PC314 Company Users</a></li>
            <?php if($isLoggedIn): ?>
                <li><a href="/company/logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
        <h1 style="color: white;">
        <?php

        echo("Home page:");

        ?>
        </h1>
        <br/>
        <div style="color: white">
            This is home page.
            <?php if($isLoggedIn): ?>
                <a href="/company/logout.php">Logout</a>
            <?php endif; ?>
        </div>
        </div>
    </div>
  </body>
</html>