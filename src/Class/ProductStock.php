<?php

namespace App\Class;

class ProductStock {
  protected $conn, $table = "product_stock";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function index() {}

  public static function create($product, $qty, $db) {
    $conn = $db->conn;
    $sql = "INSERT INTO product_stock (product_id, stock_quantity) VALUES (?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param("ii", $product, $qty);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }

  }

  public function show($id) {}

  public function edit($id) {}

  public function update($id) {}
  
  public function destroy($id) {}
}
?>