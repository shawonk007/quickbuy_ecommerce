<?php

namespace App\Class;

class Brands {
  protected $conn, $table = "brands";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function index() {
    $sql = "SELECT * FROM " . $this->table;
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      $brands = [];
      while ($row = $result->fetch_assoc()) {
        $brands[] = $row;
      }
      return $brands;
    } else {
        return [];
    }
  }

  public function create($title, $desc, $logo, $slug, $status, $mark) {
    $sql = "INSERT INTO " . $this->table . "
    (brand_title, brand_description, brand_logo, brand_slug, brand_status, is_featured, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssssii", $title, $desc, $logo, $slug, $status, $mark);
    if ($statement->execute()) {
      return true;
    } else {
        return false;
    }
  }

  public function show($id, $slug) {
    $sql = "SELECT * FROM ". $this->table . " WHERE brand_id = ? OR brand_slug = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("is", $id, $slug);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $brand = $result->fetch_assoc();
      return $brand;
    } else {
      return false;
    }
  }

  public function edit($id) {
    $sql = "SELECT * FROM ". $this->table . " WHERE brand_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $brand = $result->fetch_assoc();
      return $brand;
    } else {
      return false;
    }
  }

  public function update($id, $title, $desc, $logo, $slug, $status, $mark) {
    $sql = "UPDATE " . $this->table . " SET brand_title = ?, brand_description = ?, brand_logo = ?, brand_slug = ?, brand_status = ?, is_featured =?, updated_at = NOW() WHERE brand_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssssiii", $title, $desc, $logo, $slug, $status, $mark, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($id) {
    $sql = "DELETE FROM " . $this->table . " WHERE brand_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public static function match($item, $db) {
    $conn = $db->conn;
    $sql = "SELECT * FROM brands WHERE brand_id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $item);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $brand = $result->fetch_assoc();
      return $brand['brand_title'];
    } else {
      return false;
    }
  }
}
?>