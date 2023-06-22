<?php

namespace App;

class Register {
  protected $conn;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function create($fname, $lname, $uname, $email, $phone, $pass, $role) {
    // $fname = $this->conn->escape_string($data['fname']);
    // $lname = $this->conn->escape_string($data['lname']);
    // $uname = $this->conn->escape_string($data['uname']);
    // $email = $this->conn->escape_string($data['email']);
    // $phone = $this->conn->escape_string($data['phone']);
    // $pass = $this->conn->$data['pass'];
    // $role = $this->conn->$data['role'];

    $sql = "INSERT INTO users 
            (first_name, last_name, username, email_address, cell_phone, password, role, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssssssi", $fname, $lname, $uname, $email, $phone, $pass, $role);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
?>