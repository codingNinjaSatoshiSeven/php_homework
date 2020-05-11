<?php
  class UserReviewedProduct {
    
      // database connection and table name
      private $conn;
      private $table_name = "user_reviewed_products;";
    
      // object properties
      public $id;
      public $name;
      public $display_name;
      public $description;
      public $price;
      public $image;
      public $visited_times;
    
      // constructor with $db as database connection
      public function __construct($db){
        $this->conn = $db;
      }

      function rate($user_id, $product_id, $rating) {
        // select all query
        $query = "INSERT INTO user_reviewed_products (user_id, product_id, rating) VALUES ('".$user_id."', '".$product_id."', '".$rating."');";

        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }
  }
?>