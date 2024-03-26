<?php
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = require_once './connection.php';
  if (!$db['success'] || !$db['conn']) {
    $error = 'Failed to connect to the database';
    header('Location: ../auth/login');
    exit;
  }

  $conn = $db['conn'];
  $email = $_POST['email'];
  $emailQuery = 'SELECT password, firstname, lastname, isAdmin FROM users WHERE email = :email';
  $stmt = $conn->prepare($emailQuery);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $password = $_POST['password'];
    if (password_verify($password, $result['password'])) {
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $result['firstname'] . ' ' . $result['lastname'];
      $_SESSION['is_admin'] = $result['isAdmin'];
      header('Location: ../');
      exit;
    } else {
      $error = 'Invalid email or password';
      header('Location: ../auth/login');
      exit;
    }
  }

  $error = 'Invalid email or password';
  header('Location: ../auth/login');
  exit;
}