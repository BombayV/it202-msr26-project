<?php
session_start();
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
  header('Location: ../');
  exit;
}
?>

<?php $title = 'Create Items' ?>
<?php $root = '../' ?>
<?php $blackLogo = true ?>

<style>
  <?php include_once './styles/main.css'; ?>
  <?php include_once './styles/shopItem.css'; ?>
</style>

<?php
/*Mauricio Rivera
// IT 202 - 002
// 2/21/2024
// Phase 1
// msr26@njit.edu
 */
$loginPath = $root . 'db/signup.php';
$rawData = include_once $root.'db/getCategories.php';
$categories = $rawData['categories'];

$shopContent = '
<div class="shop-item">
  <img
    id="ch-image"
    src="../static/images/items/backpack1.png"
    alt="Name of the item"
  >
  <div class="item-data">
    <div>
      <div class="item-data__header">
        <div>
          <h3 id="ch-name" class="header__title">Deluxe Golden Binoculars</h3>
          <span id="ch-code" class="header__code">ABC214</span>
        </div>
        <p id="ch-price" class="header__price">
          $99.99
        </p>
      </div>
      <p id="ch-description" class="item-data__description">A beautiful design created by non other than DaVinci</p>
    </div>
    <button class="item__submit">Add to Cart</button>
  </div>
</div>
';

$selectOptions = '';
for ($i = 0; $i < count($categories); $i++) {
  $categoryName = $categories[$i]['categoryName'];
  $categoryName = str_replace('_', '&nbsp;', $categoryName);
  $selectOptions .= '<option value="'.$categories[$i]['categoryId'].'">'.$categoryName.'</option>';
}

$displayMessage = '';
if (isset($_SESSION['create_form']['success'])) {
  $displayMessage = '<span id="resp-msg" class="success-msg">'.$_SESSION['create_form']['success'].'</span>';
  unset($_SESSION['create_form']['success']);
}

if (isset($_SESSION['create_form']['error'])) {
  $displayMessage = '<span id="resp-msg" class="error-msg">'.$_SESSION['create_form']['code_error'].'</span>';
  unset($_SESSION['create_form']['code_error']);
}

$mainContent = '
<main>
  <h1>Item creator</h1>
  <div class="modifier-cont">
    <form action="'.$root.'db/createItem.php" method="POST">
      <div class="form-group">
        <label for="inp-category">Category</label>
        <select id="inp-category" name="inp-category">
          '.$selectOptions.'
        </select>
      </div>
      <div class="form-group">
        <label for="inp-image">Image URL</label>
        <input id="inp-image" name="inp-image" type="text" placeholder="https://myimage.com/IMG_1234.png" required/>
      </div>
      <div class="form-group">
        <label for="inp-code">Code</label>
        <input id="inp-code" name="inp-code" type="text" placeholder="ABC214" required/>
      </div>
      <div class="form-group">
        <label for="inp-name">Name</label>
        <input id="inp-name" name="inp-name" type="text" placeholder="Deluxe Golden Binoculars" required/>
      </div>
      <div class="form-group">
        <label for="inp-description">Description</label>
        <textarea id="inp-description" name="inp-description" placeholder="A beautiful design created by non other than DaVinci" required></textarea>
      </div>
      <div class="form-group">
        <label for="inp-price">Price</label>
        <input id="inp-price" name="inp-price" type="number" min="0" max="2000" placeholder="99.99" required/>
      </div>
      <div>
        <button type="submit">Create Item</button>
      </div>
      '.$displayMessage.'
    </form>
    <div class="display-item-cont">
      '. $shopContent  .'
    </div>
  </div>
</main>
';
$content = $mainContent;
?>

<?php
require_once $root . './layouts/default.php'
?>

<script type="application/javascript" src="<?php echo $root . 'create/scripts/itemUpdater.js'?>"></script>
