<?php

namespace App\Class;

class Messages
{
    private static $conn;
    private static $table = 'messages';

    public static function setConnection($db)
    {
        self::$conn = $db;
    }

    public static function sendMessage($conversationId, $senderId, $message)
    {
        $sql = "INSERT INTO " . self::$table . " (conversation_id, sender_id, message, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iis", $conversationId, $senderId, $message);
        $stmt->execute();
        $messageId = $stmt->insert_id;
        $stmt->close();

        return $messageId;
    }

    public static function getConversationMessages($conversationId)
{
    $sql = "SELECT * FROM " . self::$table . " WHERE conversation_id = ? ORDER BY created_at ASC";
    $stmt = self::$conn->prepare($sql);
    $stmt->bind_param("i", $conversationId);
    $stmt->execute();
    $result = $stmt->get_result();
    $messages = [];

    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    $stmt->close();

    return $messages;
}


    public static function markMessageAsRead($messageId)
    {
        $sql = "UPDATE " . self::$table . " SET is_read = 1 WHERE message_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $messageId);
        $stmt->execute();
        $stmt->close();
    }

    public static function deleteMessage($messageId)
    {
        $sql = "DELETE FROM " . self::$table . " WHERE message_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $messageId);
        $stmt->execute();
        $stmt->close();
    }
}

?>