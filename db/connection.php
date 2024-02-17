<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu
  try {
    $conn = new PDO(getenv('DB_DSN'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
    if ($conn) {
      echo 'Connected to the database';
    }
  } catch(PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>