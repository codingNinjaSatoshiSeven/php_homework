<?php
  session_start();
  require_once "authHelper.php";
  include_once '../api/Database.php';
  include_once '../api/Product.php';
  $database = new Database();
  $db = $database->getConnection();
    
  // initialize object
  if (!$isLoggedIn) {
    header("Location:" . "login.php");
    exit;
  }

  // initialize object
  $product = new Product($db);
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
    <div class="container">
      <a href="/company/final_project/logout.php">Log Out</a>

      <div class="row">
      <?php
        $result = $product->read();
        while($row = $result->fetch_assoc()) {
          echo"<div><a href='/company/final_project/product-detail.php?product_id=". $row['id']."'>" .$row['display_name']. "</div>";
        }
      ?>
      </div>
    </div>
  </body>
</html>