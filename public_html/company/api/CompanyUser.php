<?php
  class CompanyUser {
    
      // database connection and table name
      private $conn;
      private $table_name = "company_users";
    
      // object properties
      public $id;
      public $username;
      public $password;
    
      // constructor with $db as database connection
      public function __construct($db){
        $this->conn = $db;
      }

      // read users
      function read(){
        
        // select all query
        $tablename = $this->table_name;
        $query = "SELECT * from ".$tablename.";";
        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function get($user_name) {
        // select one user by username
        $tablename = $this->table_name;
        $query = "SELECT * from ".$tablename." WHERE username='".$user_name."';";
        // prepare query statement
        if(!($result = mysqli_query($this->conn, $query))) {
          echo "Could not execute query!<br>";
          echo("Error description: " . mysqli_error($this->conn));
          die(mysqli_error($this->conn));
        } else {
          return $result;
        }
      }

      function create($user_name, $pass_word) {
        // Create User
        $tablename = $this->table_name;
        $query = "INSERT INTO ".$tablename." (username, password) VALUES ('".$user_name."', '".$pass_word."') ON DUPLICATE KEY UPDATE username='".$user_name."', password='".$pass_word."';";
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