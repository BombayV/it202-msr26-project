<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu
session_start();
$title = 'Shipping' ?>
<?php $root = '../' ?>

<style>
  <?php include './styles/main.css'; ?>
  <?php include './styles/form.css'; ?>
</style>

<?php
$mainContent = '
<main>
  <h1>Ready to buy?</h1>
  <span class="main__separator"></span>
  <p>Fill out the form below to complete your purchase.</p>
';
if (isset($error_message)) {
  $mainContent .= '<p class="error-message">Error: ' . $error_message . '</p>';
}
$mainContent .= '
  <form action="./newOrder.php" method="post">
    <label for="ship-date">Ship Date</label>
    <input type="date" id="ship-date" name="ship-date" required min="2024-03-01" max="2025-03-31"/>
    <label for="order-number">Order Number</label>
    <input type="number" id="order-number" name="order-number" required placeholder="123456" pattern="[0-9]{6}" min="0" max="999999"/>
    <div class="form__small-cont">
      <div>
        <label for="package-dimensions">Package Dimensions (in)</label>
        <input type="number" id="package-dimensions" name="package-dimensions" required min="0" max="36" placeholder="16in"/>
      </div>
      <div>
        <label for="package-value">Package Value</label>
        <input type="number" id="package-value" name="package-value" required min="0" max="1000" placeholder="$100"/>
      </div>
    </div>
    <div class="form__small-cont">
      <div>
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="first-name" required placeholder="John"/>
      </div>
      <div>
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="last-name" required placeholder="Doe"/>
      </div>
    </div>
    <label for="address">Address</label>
    <input type="text" id="address" name="address" required placeholder="1234 Main St"/>
    <div class="form__small-cont-3">
      <div>
        <label for="city">City</label>
        <input type="text" id="city" name="city" required placeholder="Anytown"/>
      </div>
      <div>
        <label for="state">State</label>
        <input type="text" id="state" name="state" required placeholder="California"/>
      </div>
      <div>
        <label for="zip">Zip</label>
        <input type="number" id="zip" name="zip" required placeholder="12345" pattern="[0-9]{5}" min="0" max="99999"/>
      </div>
    </div>
    <button type="submit">Submit</button>
  </form>
</main>
';
$content = $mainContent;
?>
<?php
require_once '../layouts/default.php';
?>

