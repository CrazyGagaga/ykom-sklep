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
        <form method="POST" action="rejestracja.php">
            <label>login: </label><br>
            <input type="text" name="login"><br><br>
            <label>email: </label><br>
            <input type="text" name="email"><br><br>
            <label>Hasło: </label><br>
            <input type="password" name="password"><br><br>
            <label>Powtórz hasło: </label><br>
            <input type="password" name="repeatpassword"><br><br>
            <button id="rejestracjabutton">Zarejestruj się</button>
        </form><br>
        <?php
        session_start();
        error_reporting(E_ALL ^ E_WARNING);

        $conn = mysqli_connect("localhost", "root", "", "ykom_baza");
        print_r($_SESSION['nazwisko_ses']);
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $FormWypelniony = false;
            $login = mysqli_real_escape_string($conn, $_POST["login"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $pass = mysqli_real_escape_string($conn, $_POST["password"]);
            $repeatpassword = mysqli_real_escape_string($conn, $_POST["repeatpassword"]);
            if ($login == "" || $email == "" || $pass == "" || $repeatpassword == "") {
                echo "Nie wprowadzono wszystkich danych!";
            }
            else if ($repeatpassword != $pass) {
                echo "Powtórzone hasło jest nieprawidłowe!";
            }
            else {
                $q2 = "SELECT email, login FROM dane_uzyt_zam";
                $checkRes = mysqli_query($conn, $q2);
                $emailAlreadyUsed = false;
                if(isset($checkRes)){
                    while($r1 = mysqli_fetch_assoc($checkRes)) {
                        if($r1[1] == $login) {
                            $emailAlreadyUsed = true;
                            echo "<p>Login zajęty, może posiadasz już konto, <a href='login.php'>Zaloguj się</a></p>";
                            break;
                        }
                        if($r1[0] == $email) {
                            $emailAlreadyUsed = true;
                            echo "<p>Email zajęty, może posiadasz już konto, <a href='login.php'>Zaloguj się</a></p>";
                            break;
                        }
                    }
                }
                if(!$emailAlreadyUsed) {
                    $passHash = sha1($pass);
                    $q1 = "INSERT INTO `dane_uzyt_zam` (`id`, `imie`, `nazwisko`, `nr_dom`, `ulica`, `miejscowosc`, `kod_poczt`, `nr_tel`, `email`, `login`, `haslo`) VALUES (NULL, '', '', '', '', '', '', '', '$email', '$login', '$passHash');";
                    $result1 = mysqli_query($conn, $q1);
                    $id_uz = mysqli_insert_id($conn);
                    $_SESSION['id_uz'] = $id_uz;
                    $FormWypelniony = true;
                }
                if ($FormWypelniony == true) {
                    echo '<p>Wstepna rejestracja zakonczona</p><br>';
                    echo '<a href="rejestracja2.php" id="rejestracjaa">Kontynuuj</a><br><br>';
                }
            }
        }

?>
        <p>Posiadasz już konto?
        </p>
        <a href="loguj.php">Zaloguj się</a>
        <br><br><br>
        </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
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
    </main>
</body>
</html>