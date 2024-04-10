<?php $title = 'Shop' ?>
<?php $root = '../' ?>
<?php $blackLogo = true ?>

<style>
  <?php include_once './styles/main.css'; ?>
</style>

<?php
/*Mauricio Rivera
// IT 202 - 002
// 2/21/2024
// Phase 1
// msr26@njit.edu
 */
session_start();
$rawData = include_once $root.'db/getItems.php';
$categories = $rawData['categories'];
$items = $rawData['items'];

$shopContent = '';
for ($i = 0; $i < count($items); $i++) {
  if ($items[$i]['stock'] == 0) {
    continue;
  }

  $saleContent = $items[$i]['onSale'] == 1 ? '
      <span class="price__discount">$'.$items[$i]['salePrice'].'</span>
      <span class="price__original">$'.$items[$i]['price'].'</span>
    ' : '
      $'.$items[$i]['price'].'
    ';

  $formPath = $root . 'db/deleteItem.php';
  $buttonContent = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ? '
    <form action="'.$formPath.'" class="delete-form" method="POST">
      <button type="button" data-code="'.$items[$i]['code'].'" class="item__submit">Add to Cart</button>
      <button 
        name="code" 
        value="'.$items[$i]['code'].'" 
        class="item__delete"
        onclick="return confirm(`Are you sure you want to delete this item?`)"
      >
        Delete</button>
    </form>
  ' : '
    <button data-code="'.$items[$i]['code'].'" class="item__submit">Add to Cart</button>
  ';

  $useImage = strpos($items[$i]['image'], 'http') === 0;
  $shopContent .= '
  <div class="shop-item" data-category="'.$items[$i]['categoryId'].'">
    <img 
      src="'.($useImage ? $items[$i]['image'] : $root.'static/images/items/'.$items[$i]['image']).'"
      alt="'.$items[$i]['name'].'"
    >
    <div class="item-data">
      <div>
        <div class="item-data__header">
          <div>
            <h3 class="header__title">'.$items[$i]['name'].'</h3>
            <a 
                href="'.$root.'details/index.php?code='.$items[$i]['code'].'"
                class="header__code">'.$items[$i]['code'].'</a>
          </div>
          <p class="header__price">
            '.$saleContent.'
          </p>
        </div>
        <p class="item-data__description">'.$items[$i]['description'].'</p>
      </div>
      '.$buttonContent.'
    </div>
  </div>
  ';
}

$selectOptions = '';
for ($i = 0; $i < count($categories); $i++) {
  $categoryName = $categories[$i]['categoryName'];
  $categoryName = str_replace('_', '&nbsp;', $categoryName);
  $selectOptions .= '<option value="'.$categories[$i]['categoryId'].'">'.$categoryName.'</option>';
}

$mainContent = '
<main>
  <h1>Trailshop</h1>
  <select id="category-select">
    <option value="0">All</option>
    '.$selectOptions.'
  </select>
  <div class="shop-cont">
    '.$shopContent.'
  </div>
</main>
';
$content = $mainContent;
?>

<?php
require_once '../layouts/default.php';
?>

<script src="<?php echo $root . '/shop/scripts/main.js'?>"></script>
