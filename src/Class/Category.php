<?php

namespace App\Class;

class Category {
  protected $conn, $table = "categories";

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

  public function create($title, $desc, $parent, $slug, $status, $mark) {
    $sql = "INSERT INTO " . $this->table . "
    (cat_title, cat_description, parent_id, cat_slug, cat_status, is_featured, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssissi", $title, $desc, $parent, $slug, $status, $mark);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show($slug) {
    $sql = "SELECT * FROM ". $this->table . " WHERE cat_slug = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("s", $slug);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $category = $result->fetch_assoc();
      return $category;
    } else {
      return false;
    }
  }

  public function edit($id) {
    $sql = "SELECT * FROM ". $this->table . " WHERE cat_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $category = $result->fetch_assoc();
      return $category;
    } else {
      return false;
    }
  }

  public function update($id, $title, $desc, $parent, $slug, $status, $mark) {
    $sql = "UPDATE " . $this->table . " SET cat_title = ?, cat_description = ?, parent_id = ?, cat_slug = ?, cat_status = ?, is_featured =?, updated_at = NOW() WHERE cat_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssisiii", $title, $desc, $parent, $slug, $status, $mark, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($id) {
    $sql = "DELETE FROM " . $this->table . " WHERE cat_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public static function parent($parent, $db) {
    $conn = $db->conn;
    $sql = "SELECT * FROM categories WHERE cat_id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $parent);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $category = $result->fetch_assoc();
      return $category['cat_title'];
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
    $statement->close(); // Close the statement
    if ($result !== null) {
        return $result > 0;
    } else {
        return false;
    }
  }
}
?>