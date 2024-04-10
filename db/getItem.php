<?php
/*Mauricio Rivera
// IT 202 - 002
// 2/21/2024
// Phase 1
// msr26@njit.edu
 */
global $root;
$db = include_once $root . 'db/connection.php';
if (!$db['success'] || !$db['conn']) {
  return array();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $code = $_GET ? $_GET['code'] : null;
	if (!$code) {
		return array();
	}

  $conn = $db['conn'];
  $itemSql = "
  SELECT * 
  FROM `gear_items`
  WHERE `code` = :code
  ";
  $item = $conn->prepare($itemSql);
  $item->bindParam(':code', $code);
  $item->execute();
  $item = $item->fetch(PDO::FETCH_ASSOC);
  if (!$item) {
    return array();
  }

  return array(
    'item' => $item
  );
}
?>