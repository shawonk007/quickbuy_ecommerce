<?php

namespace App\Class;

class ProductImages {
  protected $conn, $table = "product_images";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function index() {}

  public function create($product, $images) {}

  public function show($id) {}

  public function edit($id) {}

  public function update($id) {}
  
  public function destroy($id) {}
}
?>