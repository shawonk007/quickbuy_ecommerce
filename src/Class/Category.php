<?php

namespace App\Class;

class Category {
  protected $conn;
  protected $table = "categories";

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
    $statement->bind_param("ssssss", $title, $desc, $parent, $slug, $status, $mark);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show() {}

  public function edit() {}

  public function update() {}

  public function destroy() {}
}
?>