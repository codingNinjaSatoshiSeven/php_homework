<?php
  class User {
    
      // database connection and table name
      private $conn;
      private $table_name = "Users";
    
      // object properties
      public $id;
      public $firstname;
      public $lastname;
      public $email;
      public $address;
      public $homephone;
      public $cellphone;
    
      // constructor with $db as database connection
      public function __construct($db){
        $this->conn = $db;
      }

      // read products
      function read(){
        
        // select all query
        $query = "SELECT * from Users;";

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