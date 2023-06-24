<?php

namespace App;

class Auth {
  private $conn;

  public function __construct($db) {
    $this->conn = $db;
  }

  public static function isAuthenticated($auth, $pass, $db) {
    $conn = $db->conn;

    $sql = "SELECT * FROM users WHERE username = '$auth' OR email_address = '$auth' OR cell_phone = '$auth'";
    $result = $conn->query($sql);
    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
      if (password_verify($pass, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['user'] = $user['id'];
        $_SESSION['uname'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        return true;
      }
    }
    return false;
  }

  public static function check() {
    if (isset($_SESSION['login']) && $_SESSION['login']) {
      return true;
    } else {
      return false;
    }
  }

  public static function isAdmin() {
    if ($_SESSION['role'] == 1) {
      return true;
    }
    return false;
  }

  public static function isMerchant() {
    if ($_SESSION['role'] == 6) {
      return true;
    }
    return false;
  }

  public static function isCustomer() {
    if ($_SESSION['role'] === 7) {
      return true;
    }
    return false;
  }

  public function user() {
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $sql = "SELECT * FROM users WHERE id = '$user'";
      $result = $this->conn->query($sql);
      if ($result->num_rows === 1) {
        return $result->fetch_assoc();
      }
    }
    return false;
  }

  public function update($data) {
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];

      $uname = $this->conn->escape_string($data['uname']);
      $email = $this->conn->escape_string($data['email']);
      $phone = $this->conn->escape_string($data['phone']);

      $sql = "UPDATE users SET username = '$uname', email_address = '$email', cell_phone = '$phone' WHERE id = '$user'";
      $result = $this->conn->query($sql);
      return $result;
    }
    return false;
  }
}
