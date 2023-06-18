<?php

namespace App;

class Database {
  private $conn;

  // Constructor
  public function __construct($hostname, $username, $password, $database) {
    try {
      // Create Database Connection
      $this->conn = new \mysqli($hostname, $username, $password, $database);
      
      // Check the connection
      if ($this->conn->connect_error) {
        throw new \Exception("Connection Failed: ". $this->conn->connect_error);  
      }
      
      // Set the character encoding
      mysqli_set_charset($this->conn, "UT8");
    } catch (\Exception $e) {
      // Handle the connection error
      die("Database Connection Error: ". $e->getMessage());
    }
  }
  
  // Define method
  public function connection() {
    return $this->conn;
  }
}
// Create an instance of the Database class
$connect = new \App\Database("localhost", "root", "", "test_quickbuy");

// Get the connection object
$conn = $connect->connection();

// Check if the connection was successful
// if ($conn->connect_errno) {
//   die("Database Connection Error: " . $conn->connect_error);
// } else {
//   echo "Database Connected Successfully!";
// }

?>