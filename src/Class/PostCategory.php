<?php

namespace App\Class;

class PostCategory {
  protected $conn;
  protected $table = "post_categories";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function index() {
    $sql = "SELECT * FROM " . $this->table;
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      $pcats = [];
      while ($row = $result->fetch_assoc()) {
        $pcats[] = $row;
      }
      return $pcats;
    } else {
      return [];
    }
  }

  public function create($title, $desc, $parent, $slug, $status) {
    $sql = "INSERT INTO " . $this->table . "
    (pcat_title, pcat_description, pcat_parent, pcat__slug, pcat__status, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssisi", $title, $desc, $parent, $slug, $status);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show($slug) {
    $sql = "SELECT * FROM ". $this->table . " WHERE pcat_slug = ?";
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
    $sql = "SELECT * FROM ". $this->table . " WHERE pcat_id = ?";
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

  public function update($id, $title, $desc, $parent, $slug, $status) {
    $sql = "UPDATE " . $this->table . " SET pcat_title = ?, pcat_description = ?, pcat_parent = ?, pcat_slug = ?, pcat_status = ?, updated_at = NOW() WHERE pcat_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssisii", $title, $desc, $parent, $slug, $status, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($id) {
    $sql = "DELETE FROM " . $this->table . " WHERE pcat_id = ?";
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
    $sql = "SELECT * FROM post_categories WHERE pcat__id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $parent);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $pcat = $result->fetch_assoc();
      return $pcat['pcat__title'];
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