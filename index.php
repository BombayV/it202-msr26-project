<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu
$title = 'Home';
$root = '.';
?>

<style>
  <?php include_once $root.'/styles/home.css'; ?>
</style>

<?php
$mainContent = '
<main>
  <h1>Trailblazers</h1>
  <span class="main__separator"></span>
  <p>
    A revolutionary outdoor gear store that provides the best quality gear for the best prices.
  </p>
  <div class="main__background">
     <img src="./static/images/background.jpg" alt="Hiking" />
     <span></span>
  </div>
</main>
<div class="info-cont">
  <div class="info">
    <div class="info__text">
      <h2>Our Story</h2>
      <p>
        Founded in 2021 by a group of outdoor enthusiasts, Trailblazers is a store that provides the best quality gear for the best prices.
        We believe that everyone should have access to the best gear for their outdoor adventures
        without having to break the bank. 
      </p>
    </div>
    <div class="info__image">
      <img src="./static/images/hiking_one.jpg" alt="Store" />
    </div>
  </div>
</div>
';
$content = $mainContent;
?>

<?php require_once 'layouts/default.php'?>

