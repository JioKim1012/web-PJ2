<?php
session_start();
unset($_SESSION['UID']);
header('location:login.php');
?>
