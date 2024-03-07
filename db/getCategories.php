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

$conn = $db['conn'];
$categoriesSql = "
SELECT categoryId, categoryName
FROM `gear_categories`
";
$categories = $conn->prepare($categoriesSql);
$categories->execute();
$categories = $categories->fetchAll(PDO::FETCH_ASSOC);

return array(
  'categories' => $categories
)
?>