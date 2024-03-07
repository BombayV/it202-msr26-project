<?php session_start(); ?>
<?php $title = 'Login' ?>
<?php $root = '../../' ?>
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
if (isset($_SESSION['is_admin'])) {
  header('Location: ../../create');
  exit;
}

if (isset($_SESSION['email'])) {
  header('Location: ../../');
  exit;
}

$loginPath = $root . 'db/login.php';
$mainContent = '
<main>
  <div class="form-cont">
    <h1>Welcome back</h1>
    <p>Sign back in to your account</p>
    <form action="' . $loginPath . '" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="joe@gmail.com" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="●●●●●●●●●●●●" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <p>Don\'t have an account? 
      <a class="signup-link" href="' . $root . 'auth/signup">Sign up</a>
    </p>
  </div>
</main>
';
$content = $mainContent;
?>

<?php
require_once '../../layouts/default.php';
?>