<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Y-KOM</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function toggleMenu() {
            console.log(document.getElementById("menu").classList.value);
            document.getElementById("menu").classList.toggle("active");
        }
    </script>
</head>
<body>
    <header>
        <h1>Y-KOM</h1>
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
                    <a href="#">Podzespoły Komputerowe</a>
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

        </div>
    </header>
    <main>

    <div class="kategorie_main">
        <ul class="sprzet_komputerowy">
            <p>Sprzęt Komputerowy</p>
            <li><a href="">Komputery Stacjonarne</a></li>
            <li><a href="">Laptopy</a></li>
            <li><a href="">Części do komputerów</a></li>
            <li><a href="">Kable</a></li>
            <li><a href="">Akcesoria</a></li>
        </ul>
        <ul class="telefony">
            <p>Telefony</p>
            <li><a href="">Smartfony</a></li>
            <li><a href="">Telefony stacjonarne</a></li>
            <li><a href="">Akcesoria</a></li>
            <li><a href="">Części</a></li>
        </ul>
        
    </div>

    <div class="baner_main">

    </div>

    <?php 
/*
    $conn = mysqli_connect("localhost", "root", "", "ykom_baza");
    $q1 = "SELECT * FROM produkt";
    $q2 = mysqli_query($conn, $q1);
    $r1 = mysqli_fetch_assoc($q2);
    

    echo "
            
    ";*/
?>

<div class='karta_produktu'>
    <img src='img/no_name.png' alt='no_image'>
    <h3>Komputer YKOM i5-14600KF/RTX4060/32GB RAM/2TB SSD</h3>
    <p>Kategoria: Komputer</p><br>
    <p>Opis produktu/specyfikacja Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, ad. Asperiores magnam porro sunt consequatur officiis debitis quia similique deleniti. Aperiam saepe inventore soluta amet itaque eos obcaecati, minus repudiandae.
    </p>
    <h4>5299 zł</h4>
    
    
</div>


    </main>
    <hr>
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