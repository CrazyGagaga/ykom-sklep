<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wylogowano</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    session_start();
session_unset();

?>
<header><h1>YKOM - TWÓJ SKLEP KOMPUTEROWY</h1></header>
<main>
    <div class="wylogowaniemain">
    <br><h1>Wylogowano pomyślnie!</h1><br>
    <button onclick="document.location='index.php'">Przejdź do strony głównej</button>
    </div>
    </main>
</body>
</html>