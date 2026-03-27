<?php
session_start();

$id = $_GET['id'];

unset($_SESSION['koszyk'][$id]);

$suma = 0;

header("Location: koszyk.php");
exit();
?>