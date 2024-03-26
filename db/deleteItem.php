<?php
/*Mauricio Rivera
// IT 202 - 002
// 3/25/2024
// Phase 4
// msr26@njit.edu
 */

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = require_once './connection.php';
  if (!$db['success'] || !$db['conn']) {
    $error = 'Failed to connect to the database';
  }

  $conn = $db['conn'];
  $code = $_POST['code'];
  echo json_encode($_POST);
  $sql = 'DELETE FROM gear_items WHERE code = :code';

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':code', $code);
  if ($stmt->execute()) {
    header('Location: ../shop');
    exit;
  } else {
    $error = 'Failed to create user';
  }
}
?>