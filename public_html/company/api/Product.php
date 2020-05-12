<?php
  class Product {
    
      // database connection and table name
      private $conn;
      private $table_name = "company_products";
    
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
        $tablename = $this->table_name;
        $query = "SELECT * from ".$tablename. ";";

        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function get($id) {
        // select one user by username
        $tablename = $this->table_name;
        $query = "SELECT * from ".$tablename." WHERE id='".$id."';";
        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function visit($product_id) {
        // select all query
        $tablename = $this->table_name;
        $query = "update " .$tablename. " set visited_times = visited_times+1 where id='".$product_id."';";

        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function get_most_visited($limit=5) {
        $tablename = $this->table_name;
        $query = "SELECT * FROM " .$tablename. " ORDER BY visited_times DESC LIMIT ".$limit.";";
        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function get_highest_rating($limit=5) {
        $query = "SELECT AVG(rating) as avg_rating,display_name, product_id  from user_reviewed_products INNER JOIN company_products on user_reviewed_products.product_id = company_products.id GROUP BY product_id ORDER BY avg_rating DESC LIMIT ".$limit.";";
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }
      
      function get_user_highest_rating($user_id, $limit=5) {
        $query = "SELECT AVG(rating) as avg_rating,display_name, product_id from user_reviewed_products INNER JOIN company_products on user_reviewed_products.product_id = company_products.id WHERE user_id=".$user_id." GROUP BY product_id ORDER BY avg_rating DESC LIMIT ".$limit.";";
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