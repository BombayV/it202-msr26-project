<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu
session_start();
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
    <figure class="info__image">
      <img src="./static/images/hiking_one.jpg" alt="Store" />
      <figcaption>Fig.1 - Trulli, Puglia, Italy.</figcaption>
    </figure>
  </div>
    <div class="info">
    <div class="info__text">
      <h2>Where We Are</h2>
      <p>
        Located in the heart of the city, our store is easily accessible to everyone.
        With a wide variety of gear, you can find everything you need for your next adventure. 
        Go to <strong>2700A Rte 22 E, Union, NJ 07083</strong> and visit us today!
        Discover the best gear for your outdoor adventures at the best prices.
      </p>
    </div>
    <figure class="info__image">
      <img src="./static/images/hiking_two.jpg" alt="Store" />
      <figcaption>Fig.1 - Trulli, Puglia, Italy.</figcaption>
    </figure>
  </div>
</div>
';
$content = $mainContent;
?>

<?php require_once 'layouts/default.php'?>

