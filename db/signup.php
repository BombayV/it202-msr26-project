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
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $dateCreated = date('Y:m:d H:i:s');
  $sql = 'INSERT INTO users (email, password, firstname, lastname, dateCreated) VALUES (:email, :password, :firstname, :lastname, :dateCreated)';

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':dateCreated', $dateCreated);
  $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
  if ($stmt->execute()) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $firstname . ' ' . $lastname;
    header('Location: ../');
    exit;
  } else {
    $error = 'Failed to create user';
  }
}
?>