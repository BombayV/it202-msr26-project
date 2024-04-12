<?php
// Mauricio Rivera
// IT 202 - 002
// 2/17/2024
// Phase 1
// msr26@njit.edu
  $root = isset($root) ? $root : '.';
  $blackLogo = isset($blackLogo) ? $blackLogo : false;
  $routes = array(
    "Shop" => $root.'/shop',
  );

  if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
    $routes['Create'] = $root.'/create';
    $routes['Shipping'] = $root.'/shipping';
  }

  if (!isset($_SESSION['email'])) {
    $routes['Login'] = $root.'/auth/login';
  } else {
    $routes['Logout'] = $root.'/auth/logout';
  }
?>


<style>
  <?php include $root.'/components/styles/navbar.css'; ?>
</style>

<header>
  <a href="<?php echo $root; ?>">
    <img
        style="<?php echo !$blackLogo ? 'filter: invert(1);' : ''; ?>"
        class="logo" src="<?php echo $root.'/static/images/black_empty.png'; ?>" alt="Trailblazers logo" />
  </a>
  <nav class="nav__links">
    <?php foreach($routes as $name => $path): ?>
      <a class="nav__link <?php echo !$blackLogo ? '' : 'dark' ?>"
         style="<?php echo !$blackLogo ? 'color: var(--text-white);' : 'color: var(--text);'; ?>"
         href="<?php echo $path; ?>">
        <?php echo $name; ?>
      </a>
    <?php endforeach; ?>
    <?php
        if (isset($_SESSION['email'])) {
            $blackLogo = !$blackLogo ? 'color: var(--text-white);' : 'color: var(--text);';
            echo '<p  
                style="'. $blackLogo .'"
                class="user-info">Welcome '. $_SESSION['name'] .' (<span class="email">'. $_SESSION['email'] .'</span>)</p>';
        }
    ?>
    <a class="cart-btn" href="<?php echo $root.'/cart'; ?>">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
      </svg>
    </a>
  </nav>
</header>
