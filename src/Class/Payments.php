<?php

namespace App\Class;

class Payment
{
    private static $conn;
    private static $table = 'payments';

    public static function setConnection($db)
    {
        self::$conn = $db;
    }

    public static function createPayment($orderId, $amount, $paymentMethod)
    {
        $sql = "INSERT INTO " . self::$table . " (order_id, amount, payment_method, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("ids", $orderId, $amount, $paymentMethod);
        $stmt->execute();
        $paymentId = $stmt->insert_id;
        $stmt->close();

        return $paymentId;
    }

    public static function getPayment($paymentId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE payment_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $paymentId);
        $stmt->execute();
        $result = $stmt->get_result();
        $payment = $result->fetch_assoc();
        $stmt->close();

        return $payment;
    }

    public static function updatePaymentStatus($paymentId, $status)
    {
        $sql = "UPDATE " . self::$table . " SET status = ? WHERE payment_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("si", $status, $paymentId);
        $stmt->execute();
        $stmt->close();
    }
}

?>