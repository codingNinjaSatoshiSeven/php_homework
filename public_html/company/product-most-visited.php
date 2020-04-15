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
        <?php if($isLoggedIn): ?>
            <li><a href="/company/logout.php">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div id="content" style="color: white">
      <?php 
        $most_visit;
        if(isset($_COOKIE['most_visit'])) {
          $most_visit = json_decode($_COOKIE['most_visit'], true);
        }
        if(!isset($most_visit)) {
          $most_visit = array();
        }
        arsort($most_visit);
        $length = sizeof($most_visit) > 5 ? 5: sizeof($most_visit);
        $counter = 0;
        foreach ($most_visit as $key => $value) {
          if($counter < $length) {
            echo "<div>" .$key. " has been visited " .$value. " times</div>";
          }
          $counter++;
        }
      ?>
    </div>
  </div>
  </body>
</html>