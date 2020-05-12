<?php
  class UserReviewedProduct {
    
      // database connection and table name
      private $conn;
      private $table_name = "user_reviewed_products";
    
      // object properties
      public $id;
      public $user_id;
      public $product_id;
      public $rating;
    
      // constructor with $db as database connection
      public function __construct($db){
        $this->conn = $db;
      }

      function get($user_id, $product_id) {

        $query = "SELECT * from user_reviewed_products WHERE user_id=".$user_id." AND product_id=" .$product_id.";";
        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function rate($user_id, $product_id, $rating, $comment, $liked) {
        // select all query
        $query = "INSERT IGNORE INTO user_reviewed_products (user_id, product_id, rating, comment, liked) VALUES ('".$user_id."', '".$product_id."', '".$rating."', '".$comment."', ".$liked.") ON DUPLICATE KEY UPDATE rating='".$rating."', comment='".$comment."', liked='".$liked."';";

        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function update($user_id, $product_id, $rating, $comment) {
        // both rating and comment is required
        if(is_null($rating) && is_null($comment)) {
          return; // no operation
        }
        $query = "UPDATE user_reviewed_products SET rating='".$rating."', comment='".$comment."' where user_id=".$user_id." AND product_id=".$product_id.";";
      }
  }
?>