<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarejestruj się - YKOM</title>
    <link rel="stylesheet" href="css\rejestracjastyle.css">
</head>
<body>
    <header>
        <a href="index.php"><h1>Y-KOM - Twoj sklep komputerowy!</h1></a>
    </header>
    <main>
        <div class="rejestracjacard">
        <div class="rejestracjamain">
            <h2>Zarejestruj się!</h2><br>
        <form method="POST" action="rejestracja2.php">
            <label>Imie: </label><br>
            <input type="text" name="imie"><br><br>
            <label>Nazwisko: </label><br>
            <input type="text" name="nazwisko"><br><br>
            <label>Ulica: </label><br>
            <input type="text" name="ulica"><br><br>
            <label>Numer domu: </label><br>
            <input type="text" name="numer_domu"><br><br>
            <label>Miejscowość: </label><br>
            <input type="text" name="miejscowosc"><br><br>
            <label>Kod pocztowy: </label><br>
            <input type="text" name="kod_pocztowy"><br><br>
            <label>Numer telefonu: </label><br>
            <input type="text" name="nr_tel"><br><br>
            <p>Dane te są wymagane do poprawnego składania zamówienia</p><br>
            <button id="rejestracjabutton">Ukończ rejestrację</button>
        </form><br>

        <?php 
        session_start();
        error_reporting(E_ALL ^ E_WARNING);
        $conn = mysqli_connect("localhost", "root", "", "ykom_baza");

        $id_uz = $_SESSION['id_uz'];
        
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $ulica = $_POST['ulica'];
        $numer_domu = $_POST['numer_domu'];
        $miejscowosc = $_POST['miejscowosc'];
        $kod_pocztowy = $_POST['kod_pocztowy'];
        $nr_tel = $_POST['nr_tel'];

        $q1 = "UPDATE dane_uzyt_zam SET imie='$imie', nazwisko='$nazwisko', ulica='$ulica', nr_dom='$numer_domu', miejscowosc='$miejscowosc', kod_poczt='$kod_pocztowy', nr_tel='$nr_tel' WHERE id='$id_uz'";

        mysqli_query($conn, $q1);
        

        if ($imie =='' || $nazwisko='' || $ulica=='' || $numer_domu='' || $miejscowosc='' || $kod_pocztowy == '' || $nr_tel == '') {
            echo "Nie podano wszystkich danych!";
        }
        else {
        echo "<h3>Zarejestrowano pomyslnie!</h3><br><br>";
        $_SESSION['imie_ses'] = $imie;
        $_SESSION['nazwisko_ses'] = $nazwisko;
        echo '<a href="loguj.php" id="rejestracjaa">Zaloguj sie</a><br><br>';
        }
        ?>
        </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
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