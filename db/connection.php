<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu
$DB_DSN = 'mysql:host=localhost;dbname=trailblazers;';
try {
    $conn = new PDO($DB_DSN, 'root',  'root');
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