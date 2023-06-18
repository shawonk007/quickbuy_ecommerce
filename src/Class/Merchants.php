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
      $roles = [];
      while ($row = $result->fetch_assoc()) {
        $roles[] = $row;
      }
      return $roles;
    } else {
      return [];
    }
  }

  public function create() {}

  public function show() {}

  public function edit() {}

  public function update() {}

  public function destroy() {}
}
?>