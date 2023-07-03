<?php

namespace App\Class;

class Promos {
  protected $conn;
  protected $table = "promos";

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

  public function create($me, $ti, $co, $de, $pt, $dt, $dv, $gn, $ex, $st, $ur) {
    $sql = "INSERT INTO " . $this->table . "
    (vendor_id, promo_title, promo_code, promo_description, promo_type, discount_type, discount_value, starting_date, expiration_date, promo_status, usage_restriction, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("isssiisssis", $me, $ti, $co, $de, $pt, $dt, $dv, $gn, $ex, $st, $ur);

  }

  public function show() {}

  public function edit() {}

  public function update() {}

  public function destroy() {}
}
?>