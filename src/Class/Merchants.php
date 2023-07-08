<?php

namespace App\Class;

class Merchants {
  protected $conn;
  protected $table = "vendors";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function index() {
    $sql = "SELECT * FROM " . $this->table;
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      $merchants = [];
      while ($row = $result->fetch_assoc()) {
        $merchants[] = $row;
      }
      return $merchants;
    } else {
      return [];
    }
  }

  public function create($name, $desc, $logo, $banner, $cat, $slug, $status, $verified, $featured) {
    $sql = "INSERT INTO " . $this->table . "
    (store_name, store_description, store_logo, store_banner, store_category, store_slug, store_status, is_verified, is_featured, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssssisiii", $name, $desc, $logo, $banner, $cat, $slug, $status, $verified, $featured);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show($slug) {
    $sql = "SELECT * FROM " . $this->table . " WHERE store_slug = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("s", $slug);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $store = $result->fetch_assoc();
      return $store;
    } else {
      return false;
    }
  }

  public function edit($id) {
    $sql = "SELECT * FROM " . $this->table . " WHERE store_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $store = $result->fetch_assoc();
      return $store;
    } else {
      return false;
    }
  }

  public function update($id, $name, $desc, $logo, $banner, $cat, $slug, $status, $verified, $featured) {
    $sql = "UPDATE " . $this->table . " SET store_name = ?, store_description = ?, store_logo = ?, store_banner = ?, store_category = ?, store_slug = ?, store_status = ?, is_verified = ?, is_featured = ?, updated_at = NOW() WHERE store_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssssisiiii", $name, $desc, $logo, $banner, $cat, $slug, $status, $verified, $featured, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($id) {
    $sql = "DELETE FROM " . $this->table . " WHERE store_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function authorize($id, $cat, $status, $verified, $featured) {
    $sql = "UPDATE " . $this->table . " SET store_category = ?, store_status = ?, is_verified = ?, is_featured = ?, updated_at = NOW() WHERE store_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("iiiii", $cat, $status, $verified, $featured, $id);
    if ($statement->affected_rows === 1) {
      return true;
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