<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wylogowano</title>
</head>
<body>
    <?php 
    session_start();
session_unset();



?>
    <h1>Wylogowano</h1>
    <button onclick="document.location='index.php'">Przejdź do strony głównej</button>
    
</body>
</html>