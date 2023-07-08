<?php

namespace App\Class;

class Wishlist
{
    private static $conn;
    private static $table = 'wishlist';

    public static function setConnection($db)
    {
        self::$conn = $db;
    }

    public static function addToWishlist($userId, $productId)
    {
      if (self::isProductInWishlist($userId, $productId)) {
        // Product already exists in the wishlist
        return false;
    }
        $sql = "INSERT INTO " . self::$table . " (user_id, product_id) VALUES (?, ?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $productId);
        $stmt->execute();
        $stmt->close();

        return true;
    }

    public static function removeFromWishlist($userId, $productId)
    {
        $sql = "DELETE FROM " . self::$table . " WHERE user_id = ? AND product_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $productId);
        $stmt->execute();
        $stmt->close();

        return true;
    }

    public static function getWishlistByUser($userId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE user_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $wishlist = [];

        while ($row = $result->fetch_assoc()) {
            $wishlist[] = $row;
        }

        $stmt->close();

        return $wishlist;
    }

    public static function isProductInWishlist($userId, $productId)
    {
        $sql = "SELECT COUNT(*) FROM " . self::$table . " WHERE user_id = ? AND product_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $productId);
        $stmt->execute();
        $result = null;
        $stmt->bind_result($result);
        $stmt->fetch();
        $stmt->close();

        return $result > 0;
    }
}

?>