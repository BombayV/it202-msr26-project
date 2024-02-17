<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu
  $root = isset($root) ? $root : '.';
  $content = isset($content) ? $content : '';
  $title = isset($title) ? $title : 'Home';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="manifest" href="<?php echo $root.'/static/favicon/manifest.json'; ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo $root.'/static/favicon/favicon.ico'; ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $root.'/static/favicon/apple-touch-icon.png'; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $root.'/static/favicon/favicon-32x32.png'; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $root.'/static/favicon/favicon-16x16.png'; ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <title><?php echo $title ?> | Trailblazers</title>
    <style>
      <?php include_once $root.'/styles/main.css'; ?>
    </style>
  </head>

  <body>
    <div id="page">
      <?php include_once $root.'/components/navbar.php'; ?>
      <?php echo $content ?>
      <?php include_once $root.'/components/footer.php'; ?>
    </div>
  </body>
</html>