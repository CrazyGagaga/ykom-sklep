<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YKOM - Zaloguj się!</title>
    <link rel="stylesheet" href="css\logujstyle.css">
</head>
<body>
    <header>
        <a href="index.php"><h1>Y-KOM - Twoj sklep komputerowy!</h1></a>
    </header>


    <main>
        <div class="logowaniemain">
            <h2>Zaloguj się!</h2><br>
        <form method="POST" action="loguj.php">
            <label>Email: </label><br>
            <input type="text" name="email"><br><br>
            <label>Hasło: </label><br>
            <input type="password" name="password"><br><br>
            <button type="submit" id="logowaniebutton">Zaloguj</button>
        </form><br>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "ykom_baza");

        $email = $_POST['email'];
        $password = $_POST['password'];

        $q1 = 'SELECT dane_uzyt_zam.email, dane_uzyt_zam.haslo FROM dane_uzyt_zam WHERE email LIKE "' . $email . '"';
        $r1 = mysqli_query($conn, $q1);
        $row = mysqli_fetch_array($r1);


         if ($row[0] == "") {
            echo "Nie znaleziono takiego adresu email";
         }
         else if ($password != $row[1]) {
            echo "Podano bledne haslo!";
         }
         else {
            echo "Zalogowano pomyslnie!";
         }
        
?>
        <p>Masz problemy z logowaniem?</p>
        <a href="">Zresetuj hasło</a>
        <br><br>
        <p>Nie posiadasz jeszcze konta?
        </p>
        <a href="rejestracja.php">Załóż konto</a>
        </div>
    </main>


    
</body>
</html>