<?php 
  session_start();

  require_once "authHelper.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <div id="content" style="color: white">
      <div><h1>Your recent 5 visited item</h1></div>
      <?php
        $historical_data;
        if(isset($_COOKIE['latest_visit'])) {
          $historical_data = json_decode($_COOKIE['latest_visit'], true);
        }
        if(!isset($historical_data)) {
          $historical_data = array();
        }
        $length = count($historical_data);
        for ($counter = count($historical_data)-1; $counter>=0; $counter--) {
          echo "<div> #".($length-$counter).": ".$historical_data[$counter]."</div>";
        }
      ?>
    </div>
  </div>
  </body>
</html>