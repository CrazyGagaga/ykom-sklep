<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    </link>
</head>
<body>
    <?php
session_start();
?>

<h2>Twój koszyk</h2>

<?php
if (empty($_SESSION['koszyk'])) {
    echo "Koszyk jest pusty";
} else {
    $suma = 0;
    $conn = mysqli_connect("localhost", "root", "", "ykom_baza");

    foreach ($_SESSION['koszyk'] as $id => $produkt) {
        $q = "SELECT * FROM produkt WHERE id=$id";

        $s = mysqli_query($conn, $q);
        $f = mysqli_fetch_assoc($s);
        echo $f['nazwa_prod'] . " - " . $f['cena_sztuka'] . " zł x " . $produkt['ilosc'];

        echo " <a href='usun.php?id=$id'>Usuń</a>";
        echo "</p>";

        $suma += $f['cena_sztuka'] * $produkt['ilosc'];
    }

    echo "<h3>Suma: $suma zł</h3>";
}
?>
</body>
</html>