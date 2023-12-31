<?php

namespace App\Class;

class ProductStock
{
    private static $conn;
    private static $table = 'product_stock';

    public static function initialize($db)
    {
        self::$conn = $db;
    }

    public static function addProductStock($productId, $quantity, $status)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, stock_quantity, stock_status, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iii", $productId, $quantity, $status);
        $stmt->execute();
        $productStockId = $stmt->insert_id;
        $stmt->close();

        return $productStockId;
    }

    public static function updateProductStock($productStockId, $quantity, $status)
    {
        $sql = "UPDATE " . self::$table . " SET stock_quantity = ?, stock_status = ? WHERE stock_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $status, $productStockId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getProductStock($productStockId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE stock_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productStockId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productStock = $result->fetch_assoc();
        $stmt->close();

        return $productStock;
    }

    public static function checkStockAvailability($productStockId)
    {
        $productStock = self::getProductStock($productStockId);
        if ($productStock && $productStock['stock_quantity'] > 0) {
            return true; // Stock is available
        }
        return false; // Stock is not available
    }

    public static function sendStockNotification($productStockId)
{
    $productStock = self::getProductStock($productStockId);
    if ($productStock && $productStock['stock_quantity'] == 0) {
        // Send notification that the product is out of stock
        $productId = $productStock['product_id'];
        $productName = self::getProductName($productId);
        $notificationMessage = "The product '{$productName}' is currently out of stock.";

        // Logic for sending notification (e.g., email, SMS, push notification)
        // You would need to implement the actual notification sending code here

        return true; // Notification sent
    } elseif ($productStock && $productStock['stock_quantity'] < 10) {
        // Send notification that the product stock is running low
        $productId = $productStock['product_id'];
        $productName = self::getProductName($productId);
        $remainingStock = $productStock['stock_quantity'];
        $notificationMessage = "The stock for product '{$productName}' is running low. Remaining stock: {$remainingStock}.";

        // Logic for sending notification (e.g., email, SMS, push notification)
        // You would need to implement the actual notification sending code here

        return true; // Notification sent
    }

    return false; // No notification sent
}

private static function getProductName($productId)
{
    // This is a placeholder method to retrieve the product name from the products table
    // You would need to implement your own logic to fetch the product name based on the product ID
    // Replace this method with your actual implementation

    // Example implementation:
    $sql = "SELECT product_name FROM products WHERE product_id = ?";
    $stmt = self::$conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();

    return $product['product_name'];
}

}

?>