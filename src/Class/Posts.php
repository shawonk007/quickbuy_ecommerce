<?php

namespace App\Class;

class Posts {
  protected $conn;
  protected $table = "posts";

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

  public function create($uid, $ptl, $pct, $pde, $pth, $psl, $pst) {
    $sql = "INSERT INTO " . $this->table . "
    (user_id, post_title, post_cat, post_description, post_thumbnail, post_slug, post_status, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $this->conn->prepare($sql);
    // Bind parameters
    $statement->bind_param("isssssi", $uid, $ptl, $pct, $pde, $pth, $psl, $pst);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function show($id, $slug) {}

  public function edit($id) {}

  public function update($id) {}

  public function destroy($id) {}
  
  public function athorize($id) {}
}
?>