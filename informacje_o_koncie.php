<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacje o koncie - YKOM</title>
    <link rel="stylesheet" href="css\style.css">
    </link>
    <script>
        function toggleMenu() {
            console.log(document.getElementById("menu").classList.value);
            document.getElementById("menu").classList.toggle("active");
        }
    </script>
</head>
<body>

<header>
        <a href="index.php"><h1>Y-KOM</h1></a>
        <div class="searchBar">
            <div class="navBarRollUp">
                <button id="rollUp" onclick="toggleMenu()"><img src="img/menu.png"/></button>
                <div id="menu" class="dropdown-content">
                    <div class="menu-header">
                        <h3>Kategorie</h3>
                        <button id="rollDown" onclick="toggleMenu()"><img src="img/back.png"/></button>
                    </div>
                    <a href="#">Laptopy i Komputer</a>
                    <a href="#">Smartfony i Smartwatche</a>
                    <a href="#">TV i Audio</a>
                </div>
            </div>
            <form action="" id="searchForm">
                <input type="text" name="searchText" id="searchText" placeholder="Wyszukaj...">
                <button type="submit" name="searchSubmit" id="searchSubmit"> 
                    <img src="img/search.png"/>
                </button>
            </form>
        </div>
        <div class="accountDetails">
            <button name="cartButton" id="cartButton" onclick="window.location.href='koszyk.php';"> 
                    <img src="img/shopping-cart.png"/>
            </button>
            <button name="accountButton" id="accountButton" onclick="window.location.href = 'loguj.php';"> 
                    <img src="img/user.png"/>
            </button>
        </div>
    </header>
<main>

    <div class="kategorie_main">
        <ul class="sprzet_komputerowy" id="kat">
            <p>Sprzęt Komputerowy</p>
            <div id="kategoria_dropdown">
                <li><a href="">Komputery Stacjonarne</a></li>
                <li><a href="">Laptopy</a></li>
                <li><a href="">Części do komputerów</a></li>
                <li><a href="">Kable</a></li>
                <li><a href="">Akcesoria</a></li>
            </div>
        </ul>
        <ul class="telefony" id="kat">
            <p>Telefony</p>
            <div id="kategoria_dropdown">
                <li><a href="">Smartfony</a></li>
                <li><a href="">Telefony stacjonarne</a></li>
                <li><a href="">Akcesoria</a></li>
                <li><a href="">Części</a></li>
            </div>
        </ul>
        <ul class="podzespoly" id="kat">
            <p>TV i Audio</p>
            <div id="kategoria_dropdown">
                <li><a href="">Telewizory</a></li>
                <li><a href="">Soundbary</a></li>
                <li><a href="">Kino domowe</a></li>
                <li><a href="">Projektory i ekran</a></li>
                <li><a href="">Słuchawki</a></li>
            </div>
        </ul> 
    </div>

    <div class="baner_main">
    </div>
    <?php
session_start();
?>

<div class="infoSection">
<div class="infoItemSection">
    <h2>Informacje o koncie</h2>
<?php
    $iduz = $_SESSION['id_uz'];
    $conn = mysqli_connect("localhost", "root", "", "ykom_baza");
    $q = "SELECT * FROM dane_uzyt_zam WHERE id=$iduz";
    $res = mysqli_query($conn, $q);
    $assoc = mysqli_fetch_assoc($res);
    echo "<br><h2>Imie: " . $assoc['imie'] . "</h2><br>";
    echo "<h2>Nazwisko: " . $assoc['nazwisko'] . "</h2><br>";
    echo "<h2>Adres: " . $assoc['ulica'] . $assoc['nr_dom'] . $assoc['kod_poczt'] . $assoc['miejscowosc'] . "</h2><br>";
    echo "<h2>Numer telefonu: " . $assoc['nr_tel'] . "</h2><br>";

    /*
    foreach ($_SESSION['koszyk'] as $id => $produkt) {
        $q = "SELECT * FROM dane_uzyt_zamow WHERE id=$id";

        $s = mysqli_query($conn, $q);
        $f = mysqli_fetch_assoc($s);
        echo $f['nazwa_prod'] . " - " . $f['cena_sztuka'] . " zł x " . $produkt['ilosc'];

        echo " <a href='usun.php?id=$id'>Usuń</a>";
        echo "</p>";

        $suma += $f['cena_sztuka'] * $produkt['ilosc'];
    }
        */
    

?>
</div>

</div>
</main>

<footer>
        <div id="orderSec">
            <h3>Zamówienia</h3>
            <a href="">Dostawa i płatności</a>
        </div>
        <div id="salesSec">
            <h3>Promocje</h3>
            <a href="">Wyprzedaż</a>
        </div>
        <div id="aboutSec">
            <h3>y-kom</h3>
            <a href="">O nas!</a>
        </div>
        <div id="contactSec">
            <h3>Kontakt</h3>
            <img src="img/phone.png"/><p> +48 123 456 789</p>
        </div>
    </footer>
</body>
</html>