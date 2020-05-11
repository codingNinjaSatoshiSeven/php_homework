<?php
  class Database {
    
      // specify your own database credentials
      private $host = "mysql";
      private $db_name = "cmpe_272";
      private $username = "root";
      private $password = "password";

      public $conn = null;
    
      // get the database connection
      public function getConnection(){
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);
        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
        }
  
        return $this->conn;
      }
  }
?>