<?php

namespace App\Class;

class ProductShipping
{
    private static $conn;
    private static $table = 'product_shippings';

    public static function initialize($db)
    {
        self::$conn = $db;
    }

    public static function addProductShipping($productId, $weight, $length, $width, $height)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, product_weight, product_length, product_width, product_height) VALUES (?, ?, ?, ?, ?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("idddd", $productId, $weight, $length, $width, $height);
        $stmt->execute();
        $productShippingId = $stmt->insert_id;
        $stmt->close();

        return $productShippingId;
    }


    public static function updateProductShipping($productShippingId, $weight, $length, $width, $height)
    {
        $sql = "UPDATE " . self::$table . " SET product_weight = ?, product_length = ?, product_width = ?, product_height = ? WHERE product_shipping_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("ddddi", $weight, $length, $width, $height, $productShippingId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getProductShipping($productShippingId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE pship_id = ?";
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