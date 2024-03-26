<?php session_start(); ?>

<?php $title = 'Sign Up' ?>
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

$loginPath = $root . 'db/signup.php';
$mainContent = '
<main>
  <div class="form-cont">
    <h1>Create an account</h1>
    <p>Sign up to get started and begin your journey</p>
    <form action="' . $loginPath . '" method="POST">
      <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" placeholder="Joe" required>
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" placeholder="Doe" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="joe@gmail.com" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="●●●●●●●●●●●●" required>
      </div>
      <button type="submit">Create Account</button>
    </form>
    <p>Already have an account?
      <a class="signup-link" href="' . $root . 'auth/login">Login</a>
    </p>
  </div>
</main>
';
$content = $mainContent;
?>

<?php
require_once '../../layouts/default.php';
?>