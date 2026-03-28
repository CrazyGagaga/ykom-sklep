<?php
session_start();

$id = $_POST['id'];

if (!isset($_SESSION['koszyk'])) {
    $_SESSION['koszyk'] = [];
}

if (isset($_SESSION['koszyk'][$id])) {
    $_SESSION['koszyk'][$id]['ilosc'] += 1;
} else {
    $_SESSION['koszyk'][$id] = [
        'ilosc' => 1
    ];
}

header("Location: koszyk.php");
exit();
?>