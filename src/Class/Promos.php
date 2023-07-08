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
      $promos = [];
      while ($row = $result->fetch_assoc()) {
        $promos[] = $row;
      }
      return $promos;
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
    if ($statement->execute()) {
      return true;
    } else {
        return false;
    }
  }

  public function show($id) {
    $sql = "SELECT * FROM " . $this->table . " WHERE promo_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $promo = $result->fetch_assoc();
      return $promo;
    } else {
      return false;
    }
  }

  public function edit($id) {
    $sql = "SELECT * FROM " . $this->table . " WHERE promo_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $promo = $result->fetch_assoc();
      return $promo;
    } else {
      return false;
    }
  }

  public function update($id, $me, $ti, $co, $de, $pt, $dt, $dv, $gn, $ex, $st, $ur) {
    $sql = "UPDATE " . $this->table . " SET
    vendor_id = ?, promo_title = ?, promo_code = ?, promo_description = ?, promo_type = ?, discount_type = ?, discount_value = ?, starting_date = ?, expiration_date = ?, promo_status = ?, usage_restriction = ?, updated_at = NOW() WHERE promo_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("isssiisssisi", $me, $ti, $co, $de, $pt, $dt, $dv, $gn, $ex, $st, $ur, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($id) {
    $sql = "DELETE FROM " . $this->table . " WHERE promo_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
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