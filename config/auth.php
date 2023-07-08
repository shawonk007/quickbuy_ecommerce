<?php 

namespace App;

class Auth {
  private static $conn, $user;

  public static function initialize() {
    $db = new Database();
    self::$conn = $db->conn;
  }

  public static function isAuthenticated($auth, $pass) {
    $conn = self::$conn;
    $sql = "SELECT * FROM users WHERE username = ? OR email_address = ? OR cell_phone = ?";
    $statement = $conn->prepare($sql);
    if (!$statement) {
      throw new \Exception("Failed to prepare statement: " . $conn->error);
    }
    $statement->bind_param("sss", $auth, $auth, $auth);
    $statement->execute();
    $result = $statement->get_result();
    
    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
      if (password_verify($pass, $user['password'])) {
        self::$user = $user;
        return true;
      }
    }
    
    return false;
  }

  public static function check() {
    return !empty(self::$user);
  }

  public static function isAdmin() {
    return self::$user['role'] == 1;
  }

  public static function isMerchant() {
    return self::$user['role'] == 6;
  }

  public static function isCustomer() {
    return self::$user['role'] == 7;
  }

  public static function getUser() {
    return self::$user;
  }

  public static function getUserById($userId) {
    $conn = self::$conn;
    $sql = "SELECT * FROM users WHERE id = '$userId'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows === 1) {
      return $result->fetch_assoc();
    }
    
    return false;
  }

  public static function getProfile($userId) {
    $conn = self::$conn;
    $sql = "SELECT * FROM users_details WHERE user_id = '$userId'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows === 1) {
      return $result->fetch_assoc();
    }
    
    return false;
  }

  public static function update($data) {
    $conn = self::$conn;
    $user = self::$user['id'];

    $uname = $conn->escape_string($data['uname']);
    $email = $conn->escape_string($data['email']);
    $phone = $conn->escape_string($data['phone']);

    $sql = "UPDATE users SET username = '$uname', email_address = '$email', cell_phone = '$phone' WHERE id = '$user'";
    $result = $conn->query($sql);
    return $result;
  }
}