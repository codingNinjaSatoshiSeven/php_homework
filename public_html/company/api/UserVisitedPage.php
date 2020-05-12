<?php
  class UserVisitedPage {
    
      // database connection and table name
      private $conn;
      private $table_name = "user_visited_pages";
    
      // object properties
      public $id;
      public $user_id;
      public $url;
      public $visit_time;
    
      // constructor with $db as database connection
      public function __construct($db){
        $this->conn = $db;
      }

      function visit($user_id, $url) {
        // select all query
        $query = "INSERT INTO user_visited_pages (user_id, url) VALUES ('".$user_id."', '".$url."');";

        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function get_most_visited_pages($limit=5) {
        $query = "SELECT count(url) as url_count, url  from user_visited_pages GROUP BY url ORDER BY url_count DESC LIMIT ".$limit.";";
        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function get_user_most_visited_pages($user_id, $limit=5) {
        $query = "SELECT count(url) as url_count, url from user_visited_pages WHERE user_id=".$user_id." GROUP BY url ORDER BY url_count DESC LIMIT ".$limit.";";
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