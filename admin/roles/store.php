<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $slug = $_POST['slug'];
    $status = $_POST['status'];
  
    if (empty($title)) {
      $errors[] = "Role title is required.";
    }
  
    if (empty($slug)) {
      $errors[] = "Role slug is required.";
    }
  
    if (empty($errors)) {
      try {
        if ($roles->create($title, $desc, $slug, $status)) {
          $response = [
            'success' => true,
            'message' => 'Role created successfully.'
          ];
        } else {
          $response = [
            'success' => false,
            'message' => 'Failed to create role.'
          ];
        }
      } catch (\Throwable $e) {
        $errorMessage = $e->getMessage();
        logError($errorMessage);
        $response = [
          'success' => false,
          'message' => 'An error occurred: ' . $e->getMessage()
        ];
      }
    } else {
      $response = [
        'success' => false,
        'message' => 'Validation error',
        'errors' => $errors
      ];
    }
    // Send the AJAX response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}