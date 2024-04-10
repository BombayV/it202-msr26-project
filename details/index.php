<?php $root = '../' ?>
<?php $blackLogo = true ?>

<style>
  <?php include_once './styles/main.css'; ?>
</style>

<?php
/*Mauricio Rivera
// IT 202 - 002
// 04/09/2024
// Phase 5
// msr26@njit.edu
 */
session_start();
$rawData = include_once $root.'db/getItem.php';
$item = $rawData ? $rawData['item'] : null;
$mainContent = '';

if (!$item) {
    $title = 'Item not found';
    $mainContent = '
    <main class="not-found">
      <h1>Item not found</h1>
      <p>The item you are looking for does not exist</p>
      <a href="'.$root.'shop">Return to shop</a>
    </main>
    ';
} else {
  $title = $item['name'];
  $isRootImage = strpos($item['image'], 'http') === false;
  $imgSrc = $isRootImage ? $root.'static/images/items/'.$item['image'] : $item['image'];
  $mainContent = '
    <main>
      <div class="holder">
        <h1 class="title">'.$item['name'].'</h1>
        <p class="description">'.$item['description'].'</p>
        <hr style="width: 100%; margin: 1rem 0;">
        <div class="price-holder">
          <span class="price">$'.$item['price'].'</span>
          <button class="add-to-cart" data-code="'.$item['code'].'">Add to cart</button>
        </div> 
      </div>
      <img src="'.$imgSrc.'" alt="'.$item['name'].'" class="image">
    </main>
  ';
}

$content = $mainContent;
?>

<?php
require_once '../layouts/default.php';
?>

<script src="<?php echo $root . 'details/scripts/main.js'?>"></script>
