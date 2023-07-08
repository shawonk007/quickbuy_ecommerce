<?php

namespace App\Class;

class ProductImages
{
    private static $conn;
    private static $table = 'product_images';

    public static function setConnection($db)
    {
        self::$conn = $db;
    }

    public static function addProductImage($productId, $imagePath)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, image_path) VALUES (?, ?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("is", $productId, $imagePath);
        $stmt->execute();
        $productImageId = $stmt->insert_id;
        $stmt->close();

        return $productImageId;
    }

    public static function updateProductImage($productImageId, $imagePath)
    {
        $sql = "UPDATE " . self::$table . " SET image_path = ? WHERE product_image_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("si", $imagePath, $productImageId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function deleteProductImage($productImageId)
    {
        $sql = "DELETE FROM " . self::$table . " WHERE product_image_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productImageId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getProductImages($productId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE product_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productImages = [];

        while ($row = $result->fetch_assoc()) {
            $productImages[] = $row;
        }

        $stmt->close();

        return $productImages;
    }

    public static function getProductImage($productImageId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE product_image_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productImageId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productImage = $result->fetch_assoc();
        $stmt->close();

        return $productImage;
    }
}

?>