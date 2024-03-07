<?php
$root = isset($root) ? $root : '..';
session_start();
session_destroy();
header('Location:' . $root . '/login');
exit;
?>