<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YKOM - Zaloguj się!</title>
    <link rel="stylesheet" href="css\rejestracjastyle.css">
</head>
<body>
    <header>
        <h1>YKOM -  Twój Sklep Komputerowy!</h1>
    </header>


    <main>
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
        $conn = mysqli_connect("localhost", "root", "", "ykom_baza");
        
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
        $q1 = "INSERT INTO `dane_uzyt_zam` (`id`, `imie`, `nazwisko`, `nr_dom`, `ulica`, `miejscowosc`, `kod_poczt`, `nr_tel`, `email`, `login`, `haslo`) VALUES (NULL, '', '', '', '', '', '', '', '$email', '$login', '$pass');";
        $result1 = mysqli_query($conn, $q1);
        $FormWypelniony = true;
        }

        if ($FormWypelniony == true) {
            echo '<p>Wstepna rejestracja zakonczona</p><br>';
            echo '<a href="rejestracja2.php" id="rejestracjaa">Kontynuuj</a><br><br>';
        }
?>
        <p>Posiadasz już konto?
        </p>
        <a href="loguj.php">Zaloguj się</a>
        <br><br><br>
        </div>
    </main>
</body>
</html>