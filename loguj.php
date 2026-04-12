<?php 
    $email = "";
    $password = "";
    session_cache_expire();
    session_start();
    

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się - YKOM</title>
    <link rel="stylesheet" href="css\logujstyle.css">
</head>
<body>
    <script>
        function wyloguj() {
            document.location="wylogowanie.php";
        }
    </script>
    <header>
        <a href="index.php"><h1>Y-KOM - Twoj sklep komputerowy!</h1></a>
    </header>


    <main>
        <div class="logowaniecard">
        <div class="logowaniemain">
            
        <?php

        if(isset($_SESSION['imie_ses'])) {
                
                echo "<h2>Jesteś już zalogowany!</h2><br>
                <button id='wylogujbutton' onclick='wyloguj()'>Wyloguj się!</button>";
            } 

            else {

            echo '<h2>Zaloguj się!</h2><br>
        <form method="POST" action="loguj.php">
           <img src="img/icons8-email-52.png" alt="email icon">
            <input type="text" name="email"><br><br>
            <img src="img/icons8-password-50.png" alt="password icon" width="52px">
            <input type="password" name="password"><br><br>
            <button type="submit" id="logowaniebutton">Zaloguj</button>
        </form><br>';
                

            
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $conn = mysqli_connect("localhost", "root", "", "ykom_baza");
    
            $email = $_POST['email'];
            $password = $_POST['password'];

            

            $q1 = 'SELECT dane_uzyt_zam.email, dane_uzyt_zam.haslo FROM dane_uzyt_zam WHERE email LIKE "' . $email . '"';
            $r1 = mysqli_query($conn, $q1);
            $row = mysqli_fetch_array($r1);

            
            

            

            if(isset($row)) {
                if ($row[0] == "") {
                    echo "Nie znaleziono takiego adresu email";
                }
                else if (sha1($password) != $row[1]) {
                    echo "Podano bledne haslo!";
                }
                else {
                    echo "Zalogowano pomyslnie!";
                    $q2 = "SELECT * FROM dane_uzyt_zam";
                    $r2 = mysqli_query($conn, $q2);
                    $i = mysqli_fetch_array($r2);
                    
                    $_SESSION['imie_ses'] = $i[1];
                    $_SESSION['nazwisko_ses'] = $i[2];
                    $_SESSION['nr_dom_ses'] = $i[3];
                    $_SESSION['ulica_ses'] = $i[4];
                    $_SESSION['miejscowosc_ses'] = $i[5];
                    $_SESSION['kod_pocztowy_ses'] = $i[6];
                    $_SESSION['nr_tel_ses'] = $i[7];
                    $_SESSION['mail_ses'] = $i[8];
                    
                    

                }
            } else {
                echo "Nie znaleziono takiego adresu email";
            }
        }
        
        echo '
        <p>Masz problemy z logowaniem?</p>
        <a href="">Zresetuj hasło</a>
        <br><br>
        <p>Nie posiadasz jeszcze konta?
        </p>
        <a href="rejestracja.php">Załóż konto</a>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
        }

    
        ?>

        </div>
        <br><br><br><br><br><br><br><br>
        
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