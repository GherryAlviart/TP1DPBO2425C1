<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['products'][$id]);
$_SESSION['products'] = array_values($_SESSION['products']); // reindex array
header("Location: index.php");
exit();
