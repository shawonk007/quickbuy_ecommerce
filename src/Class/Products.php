<?php

namespace App\Class;

class Products {
  protected $conn;
  protected $table = "products";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function index() {
    $sql = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
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

  public function create($title, $desc, $cat, $sku, $brand, $rPrice, $oPrice, $shorts, $slug, $status, $featured) {
    $sql = "INSERT INTO " . $this->table . "
    (product_title, product_description, product_category, product_sku, product_brand, regular_price, offer_price, product_highlights, product_slug, product_status, is_featured, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssisiiissii", $title, $desc, $cat, $sku, $brand, $rPrice, $oPrice, $shorts, $slug, $status, $featured);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show($slug) {
    $sql = "SELECT * FROM ". $this->table . " WHERE product_slug = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("s", $slug);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $product = $result->fetch_assoc();
      return $product;
    } else {
      return false;
    }
  }

  public function edit() {}

  public function update($id, $title, $desc, $cat, $sku, $brand, $rPrice, $oPrice, $shorts, $slug, $status, $featured) {
    $sql = "UPDATE " . $this->table . " SET product_title = ?, product_description = ?, product_category = ?, product_sku = ?, product_brand = ?, regular_price = ?, offer_price = ?, product_highlights = ?, product_slug = ?, product_status = ?, is_featured = ?, created_at = ?, updated_at = NOW() WHERE product_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssisiiissii", $title, $desc, $cat, $sku, $brand, $rPrice, $oPrice, $shorts, $slug, $status, $featured, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy() {}

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