<?php

namespace App\Class;

class Cart {
  private static $conn, $table = 'cart';

  public static function initialize($db) {
    self::$conn = $db;
  }

  public static function addItem($userId, $productId, $quantity = 1) {
    $existingItem = self::getItem($userId, $productId);
    if ($existingItem) {
      $newQuantity = $existingItem['quantity'] + $quantity;
      self::updateQuantity($userId, $productId, $newQuantity);
    } else {
      $sql = "INSERT INTO " . self::$table . " (user_id, product_id, quantity) VALUES (?, ?, ?)";
      $statement = self::$conn->prepare($sql);
      $statement->bind_param("iii", $userId, $productId, $quantity);
      $statement->execute();
      $statement->close();
    }
  }

  public static function updateQuantity($userId, $productId, $quantity) {
    $sql = "UPDATE " . self::$table . " SET quantity = ? WHERE user_id = ? AND product_id = ?";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param("iii", $quantity, $userId, $productId);
    $statement->execute();
    $statement->close();
  }

  public static function removeItem($userId, $productId) {
    $sql = "DELETE FROM " . self::$table . " WHERE user_id = ? AND product_id = ?";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param("ii", $userId, $productId);
    $statement->execute();
    $statement->close();
  }

  public static function getItem($userId, $productId) {
    $sql = "SELECT * FROM " . self::$table . " WHERE user_id = ? AND product_id = ?";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param("ii", $userId, $productId);
    $statement->execute();
    $result = $statement->get_result();
    $item = $result->fetch_assoc();
    $statement->close();
    return $item;
  }

  public static function getItems($userId) {
    $sql = "SELECT * FROM " . self::$table . " WHERE user_id = ?";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param("i", $userId);
    $statement->execute();
    $result = $statement->get_result();
    $items = [];
    while ($row = $result->fetch_assoc()) {
      $items[] = $row;
    }
    $statement->close();
    return $items;
  }

  public static function getTotalPrice($userId) {
    $items = self::getItems($userId);
    $totalPrice = 0;
    foreach ($items as $item) {
      $productPrice = self::getProductPrice($item['product_id']);
      $totalPrice += $productPrice * $item['quantity'];
    }
    return $totalPrice;
  }

  public static function clear($userId) {
    $sql = "DELETE FROM " . self::$table . " WHERE user_id = ?";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param("i", $userId);
    $statement->execute();
    $statement->close();
  }

  private static function getProductPrice($productId) {
    $sql = "SELECT price FROM products WHERE product_id = ?";
    $statement = self::$conn->prepare($sql);
    $statement->bind_param("i", $productId);
    $statement->execute();
    $result = $statement->get_result();
    $productPrice = 0;
    if ($row = $result->fetch_assoc()) {
      $productPrice = $row['price'];
    }
    $statement->close();
    return $productPrice;
  }
}
?>