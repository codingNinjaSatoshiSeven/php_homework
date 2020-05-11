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
  if(is_null($product_id)) {
    header("Location:" . "index.php");
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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
  </head>
  <body>
    <div class="container">
      <a href="/company/final_project/logout.php">Log Out</a>

      <div class="row">
      <?php
        $user_id = $_SESSION['yugioh-user-id'];
        $url = "http://" .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $uservisitedpage->visit($user_id, $url);
        $product->visit($product_id);
        $result = $product->get($product_id);
        $row = $result->fetch_assoc();
        $rating_result = $userreviewedproduct->get(intval($user_id), intval($product_id));
        $rating_row = $rating_result->fetch_assoc();
        $rate = $rating_row['rating'];
        echo "rate is ". $rate;
        echo"<div id=\"rateYo\"></div>
        <div class=\"counter\"></div>
        <div>". $row['display_name']."</div>
        <textarea id=\"comment\" rows=\"4\" cols=\"50\">" . $rating_row['comment'] . "</textarea>
        <button id=\"submitRating\" >Submit Rating</button>";
      ?>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        var $rateYo = $("#rateYo").rateYo({
          normalFill: "#A0A0A0",
          rating: parseFloat("<?php echo $rate;?>"),
          onChange: function (rating, rateYoInstance) {
            $(this).next().text(rating);
          }
        });

        $("#submitRating").click(function () {
          /* get rating */
          var rating = $rateYo.rateYo("rating");

          console.log("rating is >>>", rating);
          var user_id= "<?php echo $_SESSION['yugioh-user-id'];?>";
          var product_id = "<?php echo $product_id;?>";
          var comment =  
                document.getElementById("comment").value; 
          console.log("comment is >>>", comment);
          $.ajax({
            type : "POST",  //type of method
            url  : "/company/final_project/api/product-update.php",  //your page
            data : { rating: +rating, product_id: 1, user_id: user_id, comment: comment },// passing the values
            success: function(res){
              console.log("res is >>>", res);
            },
            error: function(err) {
              console.log("err is >>>", err);
            }
          });
        });

      });
    </script>
  </body>
</html>