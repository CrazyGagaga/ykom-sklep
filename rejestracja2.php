<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YKOM - Zarejestruj się!</title>
    <link rel="stylesheet" href="rejestracjastyle.css">
</head>
<body>
    <header>
        <h1>YKOM -  Twój Sklep Komputerowy!</h1>
    </header>
    <main>
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
        $conn = mysqli_connect("localhost", "root", "", "ykom_baza");
        
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $ulica = $_POST['ulica'];
        $numer_domu = $_POST['numer_domu'];
        $miejscowosc = $_POST['miejscowosc'];
        $kod_pocztowy = $_POST['kod_pocztowy'];
        $nr_tel = $_POST['nr_tel'];


        echo $imie . $nazwisko . $ulica . $numer_domu . $miejscowosc . $kod_pocztowy . $nr_tel;
        
        
        
        
        
        
        
        ?>




        </div>
    </main>
</body>
</html>