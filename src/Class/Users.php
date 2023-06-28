<?php

namespace App\Class;

class Users {
  protected $conn;
  protected $table = "users";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function index() {
    $sql = "SELECT * FROM " . $this->table;
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      $roles = [];
      while ($row = $result->fetch_assoc()) {
        $roles[] = $row;
      }
      return $roles;
    } else {
      return [];
    }
  }

  public function create($fname, $lname, $uname, $email, $phone, $pass, $role, $status) {
    $sql = "INSERT INTO " .$this->table . "
    (first_name, last_name, username, email_address, email_verified_at, cell_phone, password, role, user_status, created_at, updated_at)
    VALUES (?, ?, ?, ?, NULL, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    // Bind Parameters
    $statement->bind_param("ssssssii", $fname, $lname, $uname, $email, $phone, $pass, $role, $status);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show() {}

  public function edit($id) {
    $sql = "SELECT * FROM " . $this->table . " WHERE id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
      return $user;
    } else {
      return false;
    }
  }

  public function update($id, $fname, $lname, $uname, $email, $phone, $pass, $role, $status) {
    $sql = "UPDATE " . $this->table . " SET first_name = ?, last_name = ?, username = ?, email_address = ?, cell_phone = ?, password = ?, role = ?, user_status = ? WHERE id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssssssiii", $fname, $lname, $uname, $email, $phone, $pass, $role, $status, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function authorize($id, $role, $status) {
    $sql = "UPDATE " . $this->table . " SET role = ?, user_status = ? WHERE id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("iii", $role, $status, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($id) {
    $sql = "DELETE FROM " . $this->table . " WHERE id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }
}
?>