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
$itemsSql = "
    SELECT categoryId, code, name, description, price, image, stock, onSale, salePrice
    FROM `gear_items`
";
$categories = $conn->prepare($categoriesSql);
$categories->execute();
$categories = $categories->fetchAll(PDO::FETCH_ASSOC);

$items = $conn->prepare($itemsSql);
$items->execute();
$items = $items->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($items); $i++) {
  $items[$i]['categoryName'] = $categories[$items[$i]['categoryId'] - 1]['categoryName'];
}

return array(
  'categories' => $categories,
  'items' => $items
)
?>