<?php
session_start();

function validateInput($input) {
  $input = trim($input);
  $input = stripslashes($input);
  return htmlspecialchars($input);
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = require_once './connection.php';
  if (!$db['success'] || !$db['conn']) {
    $error = 'Failed to connect to the database';
    header('Location: ../');
    exit;
  }

  $conn = $db['conn'];
  $code = validateInput(filter_input(INPUT_POST, 'inp-code', FILTER_SANITIZE_STRING));

	if ($code === '' || strlen($code) < 4 || strlen($code) > 10) {
		$error = 'Invalid code';
		$_SESSION['create_form']['error'] = $error;
		header('Location: ../create');
		exit;
	}

	$findCodeQuery = 'SELECT * FROM gear_items WHERE code = :code';
  $stmt = $conn->prepare($findCodeQuery);
  $stmt->bindParam(':code', $code);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $error = 'Code already exists';
    $_SESSION['create_form']['error'] = $error;
    header('Location: ../create');
    exit;
  }

  $categoryId = validateInput(filter_input(INPUT_POST, 'inp-category', FILTER_SANITIZE_NUMBER_INT));
  $image = validateInput(filter_input(INPUT_POST, 'inp-image', FILTER_SANITIZE_STRING));
  $name = validateInput(filter_input(INPUT_POST, 'inp-name', FILTER_SANITIZE_STRING));
  $description = validateInput(filter_input(INPUT_POST, 'inp-description', FILTER_SANITIZE_STRING));
  $price = validateInput(filter_input(INPUT_POST, 'inp-price', FILTER_SANITIZE_NUMBER_FLOAT));
  $price = number_format($price, 2, '.', '');

	if ($name === '' || strlen($name) < 10 || strlen($name) > 100) {
		$error = 'Invalid name';
		$_SESSION['create_form']['error'] = $error;
		header('Location: ../create');
		exit;
	}

	if ($description === '' || strlen($description) < 10 || strlen($description) > 255) {
		$error = 'Invalid description';
		$_SESSION['create_form']['error'] = $error;
		header('Location: ../create');
		exit;
	}

  if ($price <= 0 || $price > 100000) {
    $error = 'Invalid price';
    $_SESSION['create_form']['error'] = $error;
    header('Location: ../create');
    exit;
  }

  $query = 'INSERT INTO gear_items (categoryId, image, code, name, description, price) VALUES (:categoryId, :image, :code, :name, :description, :price)';
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':categoryId', $categoryId);
  $stmt->bindParam(':image', $image);
  $stmt->bindParam(':code', $code);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':price', $price);
  $stmt->execute();

  $_SESSION['create_form']['success'] = 'Item created successfully';
  header('Location: ../create');
  exit;
}