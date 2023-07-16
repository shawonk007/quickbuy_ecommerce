<?php

namespace App\Class;

class Products {
  protected $conn;
  protected $table = "products";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function index() {
    $sql = "SELECT * FROM " . $this->table . " ORDER BY product_id DESC";
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

  public function create($title, $sku, $brand, $rPrice, $oPrice, $slug, $img, $status, $featured) {
    $sql = "INSERT INTO " . $this->table . "
    (product_title, product_sku, product_brand, regular_price, offer_price, product_slug, product_thumbnail, product_status, is_featured, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssiiissii", $title, $sku, $brand, $rPrice, $oPrice, $slug, $img, $status, $featured);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show($column, $value) {
    $sql = "SELECT * FROM ". $this->table . " WHERE {$column} = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("s", $value);
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

  public function update($id, $title, $sku, $brand, $rPrice, $oPrice, $slug, $img, $status, $featured) {
    $sql = "UPDATE " . $this->table . " SET product_title = ?, product_sku = ?, product_brand = ?, regular_price = ?, offer_price = ?, product_slug = ?, product_thumbnail = ?, product_status = ?, is_featured = ?, created_at = ?, updated_at = NOW() WHERE product_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ssiiissiii", $title, $sku, $brand, $rPrice, $oPrice, $slug, $img, $status, $featured, $id);
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

  public function category($product, $main, $sub, $type) {
    $sql = "INSERT INTO product_category (product_id, main_category, sub_category, product_type) VALUES (?, ?, ?, ?)";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("iiii", $product, $main, $sub, $type);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
?>