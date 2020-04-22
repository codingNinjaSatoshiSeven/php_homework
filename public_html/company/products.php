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
  <div id="card-container" style="color: white; text-align: center;">
    <a href='/company/product-last-visit-history.php' style="background-color: white;">See your last Visited Products</a>
    <a href='/company/product-most-visited.php' style="background-color: white;">See your most Visited Products</a>
  <?php
    $hostname = "mysql";
    $username = "root";
    $password = "password";
    $dbname = "cmpe_272";
    $conn = mysqli_connect($hostname,$username,$password,$dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {
      queryProducts();
    }

    function queryProducts() {
      global $conn;
      $productsQuery = "SELECT * FROM Products;";

      if(!($result = mysqli_query($conn, $productsQuery))) {
        echo "Could not execute query!<br>";
        echo("Error description: " . mysqli_error($conn));
        die(mysqli_error($conn));
      } else {
        for ($counter = 0; $row = mysqli_fetch_assoc($result); $counter++) {
          if($counter % 5 == 0) {
            echo '<ul style="margin-top: 110px">';
          }
          echo "
            <li>
              <a href='/company/product-detail.php?card=". $row['name'] ."'>
              <div class='details'>
                <h2>". $row['display_name'] ."</h2>
                <p>$". $row['price'] ."</p>
                <img src='". $row['image'] ."' style='width: 85%; height: 88%; top: 6%; left: 6%'>
              </div>
              </a>
            </li>
          ";
          if($counter % 5 == 4) {
            echo '</ul>';
          }
        }
      }
    }
  ?>
  </div>
  </body>
</html>