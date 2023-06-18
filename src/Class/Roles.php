<?php

namespace App\Class;

class Roles {
  protected $conn;
  protected $table = "roles";

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

  public function create($title, $desc, $slug, $status) {
    $sql = "INSERT INTO " . $this->table . "
    (role_title, role_description, role_slug, role_status, created_at, updated_at)
    VALUES (?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    // Bind parameters
    $statement->bind_param("ssss", $title, $desc, $slug, $status);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show($id) {
    $sql = "SELECT * FROM roles WHERE role_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $role = $result->fetch_assoc();
      return $role;
    } else {
      return false;
    }
  }

  public function edit($id) {
    $sql = "SELECT * FROM roles WHERE role_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $role = $result->fetch_assoc();
      return $role;
    } else {
      return false;
    }
  }

  public function update($id, $title, $desc, $slug, $status) {
    $sql = "UPDATE roles SET role_title = ?, role_description = ?, role_slug = ?, role_status = ? WHERE role_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssssi", $title, $desc, $slug, $status, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($id) {
    $sql = "DELETE FROM roles WHERE role_id = ?";
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