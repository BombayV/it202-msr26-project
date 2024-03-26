<?php
/*Mauricio Rivera
// IT 202 - 002
// 03/25/2024
// Phase 4
// msr26@njit.edu
 */

function add_user_to_db($email, $password, $firstname, $lastname, $isAdmin) {
    global $conn;
    $dateCreated = date('Y:m:d H:i:s');
    $sql = 'INSERT INTO users (email, password, firstname, lastname, dateCreated, isAdmin) VALUES (:email, :password, :firstname, :lastname, :dateCreated, :isAdmin)';

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':dateCreated', $dateCreated);
    $stmt->bindParam(':password', $password);
    $i = $isAdmin ? 1 : 0;
    $stmt->bindParam(':isAdmin', $i);
    $stmt->execute();
}

$db = require_once './connection.php';
if (!$db['success'] || !$db['conn']) {
    $error = 'Failed to connect to the database';
}

$conn = $db['conn'];

add_user_to_db('junior@gmail.com', password_hash('junior123', PASSWORD_DEFAULT), 'Test', 'Junior', true);
add_user_to_db('senior@gmail.com', password_hash('senior123', PASSWORD_DEFAULT), 'Test', 'Senior', false);
add_user_to_db('manager@gmail.com', password_hash('manager123', PASSWORD_DEFAULT), 'Test', 'Manager', true);
?>