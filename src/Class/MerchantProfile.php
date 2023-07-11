<?php

namespace App\Class;

class MerchantProfile {
  private static $conn;
  private static $table = "vendor_contact";

  public static function initialize($db) {
    self::$conn = $db;
  }

  public static function hasProfile($user) {
    $sql = "SELECT * FROM " . self::$table . " WHERE user_id = ?";
    $statement = self::$conn->prepare($sql);
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

  public static function makeStore($store, $email, $phone, $line1, $line2, $division, $district, $postal, $website, $facebook, $whatsapp) {
    $sql = "INSERT INTO " . self::$table . " 
    (store_id, store_email, store_phone, store_address_one, store_address_two, store_division, store_district, store_postal_code, store_website, store_facebook, store_whatsapp) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param("issssssisss", $store, $email, $phone, $line1, $line2, $division, $district, $postal, $website, $facebook, $whatsapp);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public static function updateStore($id, $store, $email, $phone, $line1, $line2, $division, $district, $postal, $website, $facebook, $whatsapp) {
    $sql = "UPDATE " . self::$table . " SET store_id = ?, store_email = ?, store_phone = ?, store_address_one = ?, store_address_two = ?, store_division = ?, store_district = ?, store_postal_code = ?, store_website = ?, store_facebook = ?, store_whatsapp = ? WHERE contact_id = ?";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param("issssssisssi", $store, $email, $phone, $line1, $line2, $division, $district, $postal, $website, $facebook, $whatsapp, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }

  public static function exists($column, $value) {
    $sql = "SELECT COUNT(*) FROM " . self::$table . " WHERE {$column} = ?";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param('s', $value);
    $statement->execute();
    $result = null;
    $statement->bind_result($result);
    $statement->fetch();
    $statement->close();
    if ($result !== null) {
        return $result > 0;
    } else {
        return false;
    }
  }
}
?>