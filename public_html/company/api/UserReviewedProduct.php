<?php
  class UserReviewedProduct {
    
      // database connection and table name
      private $conn;
      private $table_name = "UserReviewedProducts";
    
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

      // read products
      function read(){
        
        // select all query
        $query = "SELECT * from '".$this.$table_name."';";

        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function rate($user_id, $product_id, $rating) {
        // select all query
        $query = "INSERT INTO UserReviewedProducts (user_id, product_id, rating) VALUES ('".$user_id."', '".$product_id."', '".$rating."');";

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