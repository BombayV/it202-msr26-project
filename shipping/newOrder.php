<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  include 'index.php';
  exit;
}

$shipDate = htmlspecialchars($_POST['ship-date']);
$orderNumber = htmlspecialchars($_POST['order-number']);
$packageDimensions = htmlspecialchars($_POST['package-dimensions']);
$packageValue = htmlspecialchars($_POST['package-value']);
$firstName = htmlspecialchars($_POST['first-name']);
$lastName = htmlspecialchars($_POST['last-name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);

if (intval($packageValue) > 1000) {
  $error_message = 'Package value cannot exceed $1000';
  include 'index.php';
  exit;
}

if (intval($packageDimensions) > 36) {
  $error_message = 'Package dimensions cannot exceed 36 inches';
  include 'index.php';
  exit;
}

if (strlen($zip) > 5 && intval($zip) > 99999) {
  $error_message = 'Zip code cannot exceed 5 digits';
  include 'index.php';
  exit;
}

$ZIP_CODE_START_PER_STATE = array(
  'Alabama' => 35000,
  'Alaska' => 99500,
  'Arizona' => 85000,
  'Arkansas' => 71600,
  'California' => 90000,
  'Colorado' => 80000,
  'Connecticut' => 6000,
  'Delaware' => 19700,
  'Florida' => 32000,
  'Georgia' => 30000,
  'Hawaii' => 96700,
  'Idaho' => 83200,
  'Illinois' => 60000,
  'Indiana' => 46000,
  'Iowa' => 50000,
  'Kansas' => 66000,
  'Kentucky' => 40000,
  'Louisiana' => 70000,
  'Maine' => 4000,
  'Maryland' => 20600,
  'Massachusetts' => 1000,
  'Michigan' => 48000,
  'Minnesota' => 55000,
  'Mississippi' => 38600,
  'Missouri' => 63000,
  'Montana' => 59000,
  'Nebraska' => 68000,
  'Nevada' => 89000,
  'New Hampshire' => 3000,
  'New Jersey' => 7000,
  'New Mexico' => 87000,
  'New York' => 100,
  'North Carolina' => 27000,
  'North Dakota' => 58000,
  'Ohio' => 43000,
  'Oklahoma' => 73000,
  'Oregon' => 97000,
  'Pennsylvania' => 15000,
  'Rhode Island' => 2800,
  'South Carolina' => 29000,
  'South Dakota' => 57000,
  'Tennessee' => 37000,
  'Texas' => 75000,
  'Utah' => 84000,
  'Vermont' => 5000,
  'Virginia' => 22000,
  'Washington' => 98000,
  'West Virginia' => 25000,
  'Wisconsin' => 53000,
  'Wyoming' => 82000
);

$zipStart = $ZIP_CODE_START_PER_STATE[$state];
$zipEnd = $zipStart + 999;

if (intval($zip) < $zipStart || intval($zip) > $zipEnd) {
  $error_message = 'Invalid zip code for ' . $state;
  include 'index.php';
  exit;
}

$trackingNumber = rand(0, 2);
if ($trackingNumber === 0) {
  $trackingNumber = '1Z';
  for ($i = 0; $i < 8; $i++) {
    $trackingNumber .= rand(0, 9);
  }
} else if ($trackingNumber === 1) {
  $trackingNumber = 'T';
  for ($i = 0; $i < 8; $i++) {
    $trackingNumber .= rand(0, 9);
  }
} else {
  for ($i = 0; $i < 10; $i++) {
    $trackingNumber .= rand(0, 9);
  }
}
?>

<?php $title = 'New Order' ?>
<?php $root = '../' ?>

<style>
  <?php include './styles/main.css'; ?>
  <?php include './styles/order.css'; ?>
</style>

<?php
$mainContent = '
<main>
  <h1>Thank you for your purchase!</h1>
  <span class="main__separator"></span>
  <p>Your order has been placed and will be shipped on the date you provided. No email confirmation.</p>
  <div class="order-cont">
    <h2>Order Details</h2>
    <p>Ship Date: ' . $shipDate . '</p>
    <p>Package Dimensions: ' . $packageDimensions . '</p>
    <p>Package Value: ' . $packageValue . '</p>
    <p>Shipping Company: UPS</p>
    <p>Shipping Class: Priority</p>
    <p>Tracking Number: ' . $trackingNumber . '</p>
    <p>Order Number: ' . $orderNumber . '</p>
    <img src="../static/images/placeholder_barcode.gif" alt="barcode" style="margin-top: 2rem" />
  </div>
</main>
';
$content = $mainContent;
?>
<?php
require_once '../layouts/default.php';
?>