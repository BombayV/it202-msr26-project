<?php
/*Mauricio Rivera
// IT 202 - 002
// 2/21/2024
// Phase 1
// msr26@njit.edu
 */

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = require_once './connection.php';
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
  $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
  if ($stmt->execute()) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    header('Location: ../');
    exit;
  } else {
    $error = 'Failed to create user';
  }
}
?>