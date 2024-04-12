<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu
// skill issue tbh
$USERNAME = 'msr26';
$PASSWORD = 'jInka1-bebwyp-jijnuj';
$DB_DSN = 'mysql:host=sql1.njit.edu;dbname=msr26;';
try {
    $conn = new PDO($DB_DSN, $USERNAME, $PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return [
    'success' => true,
    'message' => 'Connection successful',
    'conn' => $conn
  ];
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  return [
    'success' => false,
    'message' => 'Connection failed: ' . $e->getMessage(),
  ];
}
?>