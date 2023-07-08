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
      $posts = [];
      while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
      }
      return $posts;
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

  public function show($id, $slug) {
    $sql = "SELECT * FROM " . $this->table . " WHERE post_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("is", $id, $slug);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $post = $result->fetch_assoc();
      return $post;
    } else {
      return false;
    }
  }

  public function edit($id) {
    $sql = "SELECT * FROM " . $this->table . " WHERE post_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $post = $result->fetch_assoc();
      return $post;
    } else {
      return false;
    }
  }

  public function update($pid, $uid, $ptl, $pct, $pde, $pth, $psl, $pst) {
    $sql = "UPDATE " . $this->table . " SET
    user_id = ?, post_title = ?, post_cat = ?, post_description = ?, post_thumbnail = ?, post_slug = ?, post_status = ?, updated_at = NOW() WHERE post_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("isssssii", $uid, $ptl, $pct, $pde, $pth, $psl, $pst, $pid);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($id) {
    $sql = "DELETE FROM " . $this->table . " WHERE post_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }
  
  public function athorize($pid, $pst) {
    $sql = "UPDATE " . $this->table . " SET post_status = ? WHERE post_id = ?";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param("ii", $pst, $pid);
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