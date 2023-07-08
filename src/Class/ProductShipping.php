<?php

namespace App\Class;

class ProductShipping
{
    private static $conn;
    private static $table = 'product_shipping';

    public static function setConnection($db)
    {
        self::$conn = $db;
    }

    public static function addProductShipping($productId, $weight, $length, $width, $height, $shippingClass)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, weight, length, width, height, shipping_class, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iddddd", $productId, $weight, $length, $width, $height, $shippingClass);
        $stmt->execute();
        $productShippingId = $stmt->insert_id;
        $stmt->close();

        return $productShippingId;
    }

    public static function updateProductShipping($productShippingId, $weight, $length, $width, $height, $shippingClass)
    {
        $sql = "UPDATE " . self::$table . " SET weight = ?, length = ?, width = ?, height = ?, shipping_class = ? WHERE product_shipping_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("dddds", $weight, $length, $width, $height, $shippingClass, $productShippingId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getProductShipping($productShippingId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE product_shipping_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productShippingId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productShipping = $result->fetch_assoc();
        $stmt->close();

        return $productShipping;
    }
}
?>