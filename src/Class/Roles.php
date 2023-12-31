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
    $sql = "SELECT * FROM " . $this->table . " WHERE role_id = ?";
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
    $sql = "SELECT * FROM " . $this->table . " WHERE role_id = ?";
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
    $sql = "UPDATE " . $this->table . " SET role_title = ?, role_description = ?, role_slug = ?, role_status = ?, updated_at = NOW() WHERE role_id = ?";
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
    $sql = "DELETE FROM " . $this->table . " WHERE role_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public static function match($user, $db) {
    $conn = $db->conn;
    $sql = "SELECT * FROM roles WHERE role_id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $user);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $role = $result->fetch_assoc();
      return $role['role_title'];
    } else {
      return false;
    }
  }

  public function exists($column, $value) {
    $sql = "SELECT COUNT(*) FROM " . $this->table . " WHERE {$column} = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param('s', $value);
    $statement->execute();
    $result = null;
    $statement->bind_result($result);
    $statement->fetch();
    $statement->close();
    if ($result !== null) {
        return $result > 0;
    } else {
        return false;
    }
  }
}
?>