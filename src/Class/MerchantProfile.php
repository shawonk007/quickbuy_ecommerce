<?php

namespace App\Class;

class MerchantProfile {
  protected $conn;

  public function __construct($db) {
    $this->conn = $db;
  }

  public static function hasProfile($user, $db) {
    $sql = "SELECT * FROM vendors_contact WHERE user_id = ?";
    $statement = $db->conn->prepare($sql);
    $statement->bind_param("i", $user);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $store = $result->fetch_assoc();
      return $store;
    } else {
      return false;
    }
  }

  public static function makeStore($store, $email, $phone, $line1, $line2, $division, $district, $postal, $website, $facebook, $whatsapp, $db) {
    $sql = "INSERT INTO vendors_contact 
    (store_id, store_email, store_phone, store_address_one, store_address_two, store_division, store_district, store_postal_code, store_website, store_facebook, store_whatsapp) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $db->conn->prepare($sql);
    $statement->bind_param("issssssisss", $store, $email, $phone, $line1, $line2, $division, $district, $postal, $website, $facebook, $whatsapp);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public static function updateStore($id, $store, $email, $phone, $line1, $line2, $division, $district, $postal, $website, $facebook, $whatsapp, $db) {
    $sql = "UPDATE vendors_contact SET store_id = ?, store_email = ?, store_phone = ?, store_address_one = ?, store_address_two = ?, store_division = ?, store_district = ?, store_postal_code = ?, store_website = ?, store_facebook = ?, store_whatsapp = ? WHERE contact_id = ?";
    $statement = $db->conn->prepare($sql);
    $statement->bind_param("issssssisss", $store, $email, $phone, $line1, $line2, $division, $district, $postal, $website, $facebook, $whatsapp, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public static function exists($column, $value, $db) {
    $sql = "SELECT COUNT(*) FROM vendors_contact WHERE {$column} = ?";
    $statement = $db->conn->prepare($sql);
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