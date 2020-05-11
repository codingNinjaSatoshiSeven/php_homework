<?php
    session_start();
    // include database and object files
    //include '../vendor/autoload.php';

    //Import Hybridauth's namespace
    //use Hybridauth\Hybridauth; 

    require_once "authHelper.php";
    include_once './api/Database.php';
    include_once './api/Product.php';

    echo "session is ". $_SESSION["member_id"];
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
      
    // initialize object
    $product = new Product($db);
    //$product->visit(1);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
      }
      .rating > span {
        display: inline-block;
        position: relative;
        width: 1.1em;
      }
      .rating > span:hover:before,
      .rating > span:hover ~ span:before {
        content: "\2605";
        position: absolute;
      }
    </style>
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
      <div id="rateYo"></div>
      <div class="counter"></div>
      <button id="getRating" >Get Rating</button>
    </div>
    <script>
      $(function () {
      
        var $rateYo = $("#rateYo").rateYo({
          normalFill: "#A0A0A0",
          onChange: function (rating, rateYoInstance) {
            $(this).next().text(rating);
          }
        });

        $("#getRating").click(function () {
          /* get rating */
          var rating = $rateYo.rateYo("rating");

          $.ajax({
            type : "POST",  //type of method
            url  : "/company/testy.php",  //your page
            data : { rating: +rating, product_id: 1 },// passing the values
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