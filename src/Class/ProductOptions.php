<?php

namespace App\Class;

class ProductOptions
{
    private static $conn;
    private static $table = 'product_options';

    public static function initialize($db)
    {
        self::$conn = $db;
    }

    public static function addProductOption($productId, $optionName, $optionType, $optionValue)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, option_name, option_type, option_value) VALUES (?, ?, ?, ?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("issss", $productId, $optionName, $optionType, $optionValue);
        $stmt->execute();
        $productOptionId = $stmt->insert_id;
        $stmt->close();

        return $productOptionId;
    }

    public static function updateProductOption($productOptionId, $optionName, $optionType, $optionValue)
    {
        $sql = "UPDATE " . self::$table . " SET option_name = ?, option_type = ?, option_value = ? WHERE option_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("sssi", $optionName, $optionType, $optionValue, $productOptionId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getProductOption($productOptionId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE option_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productOptionId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productOption = $result->fetch_assoc();
        $stmt->close();

        return $productOption;
    }

    public static function getProductOptionsByProduct($productId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE product_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productOptions = [];

        while ($row = $result->fetch_assoc()) {
            $productOptions[] = $row;
        }

        $stmt->close();

        return $productOptions;
    }
    
    public static function getProductOptions($productIds)
    {
        $ids = implode(',', $productIds);
        $sql = "SELECT * FROM " . self::$table . " WHERE product_id IN ($ids)";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $productOptions = [];

        while ($row = $result->fetch_assoc()) {
            $productOptions[$row['product_id']][] = $row;
        }

        $stmt->close();

        return $productOptions;
    }
}

?>