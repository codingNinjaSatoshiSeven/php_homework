<?php
  session_start();
  require_once "authHelper.php";
  include_once '../api/Database.php';
  include_once '../api/Product.php';
  include_once '../api/UserVisitedPage.php';
  include_once '../api/UserReviewedProduct.php';
  $database = new Database();
  $db = $database->getConnection();

  $product_id = strval(htmlspecialchars($_GET["product_id"]));
  // initialize object
  if (!$isLoggedIn) {
    header("Location:" . "login.php");
    exit;
  }

  // initialize object
  $product = new Product($db);
  $uservisitedpage = new UserVisitedPage($db);
  $userreviewedproduct = new UserReviewedProduct($db);
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
        $user_id = $_SESSION['yugioh-user-id'];
        $url = "http://" .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $uservisitedpage->visit($user_id, $url);
        $result = $product->get_most_visited();
        $result2 = $product->get_highest_rating();
        $result3 = $uservisitedpage->get_most_visited_pages();
        echo"<div><label>Top visited item</label></div>";
        while($row = $result->fetch_assoc()) {
          echo"<div>" .$row['display_name']. " " .$row['visited_times']. "</div>";
        }
        echo"<div><label>To Rated Item</label></div>";
        while($row2 = $result2->fetch_assoc()) {
          echo"<div>" .$row2['display_name']. " " .$row2['avg_rating']. "</div>";
        }
        echo"<div><label>Most Visited Place</label></div>";
        while($row3 = $result3->fetch_assoc()) {
          echo"<div>" .$row3['url']. " " .$row3['url_count']. "</div>";
        }
      ?>
      </div>
    </div>
    
  </body>
</html>