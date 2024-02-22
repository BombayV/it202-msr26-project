<?php
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = require_once '../connection.php';
  if (!$db['success'] || !$db['conn']) {
    $error = 'Failed to connect to the database';
  }

  $conn = $db['conn'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $sql = 'INSERT INTO users (email, password, username) VALUES (:email, :password, :username)';

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  if ($stmt->execute()) {

  } else {
    $error = 'Failed to create user';

  }
}
?>