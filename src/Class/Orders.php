<?php

namespace App\Class;

class Orders
{
    private static $conn;
    private static $table = 'orders';

    public static function setConnection($db)
    {
        self::$conn = $db;
    }

    public static function createOrder($userId, $items)
    {
        $totalPrice = self::calculateTotalPrice($items);

        $sql = "INSERT INTO " . self::$table . " (user_id, total_price, created_at) VALUES (?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("id", $userId, $totalPrice);
        $stmt->execute();
        $orderId = $stmt->insert_id;
        $stmt->close();

        self::insertOrderItems($orderId, $items);

        self::clearCart($userId);

        return $orderId;
    }

    private static function calculateTotalPrice($items)
    {
        $totalPrice = 0;

        foreach ($items as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];

            $productPrice = self::getProductPrice($productId);
            $totalPrice += $productPrice * $quantity;
        }

        return $totalPrice;
    }

    private static function insertOrderItems($orderId, $items)
    {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = self::$conn->prepare($sql);

        foreach ($items as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];

            $stmt->bind_param("iii", $orderId, $productId, $quantity);
            $stmt->execute();
        }

        $stmt->close();
    }

    private static function getProductPrice($productId)
    {
        $sql = "SELECT price FROM products WHERE product_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productPrice = 0;

        if ($row = $result->fetch_assoc()) {
            $productPrice = $row['price'];
        }

        $stmt->close();

        return $productPrice;
    }

    private static function clearCart($userId)
    {
        $sql = "DELETE FROM cart WHERE user_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
    }
}


?>