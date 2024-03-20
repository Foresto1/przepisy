<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "konserwa";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Połączenie nieudane: ". $conn->connect_error);
}

$sql = "SELECT * FROM konserwa";
$result = $conn->query($sql);

echo "<ol>"
while ($row = $result->fetch_assoc()){
    echo "<li>" . $row{"tytul"} . "</li>";
}
echo "</ol>"

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>przepisy</title>
        <link rel="stylesheet" href="style.css">    
    </head>
    <body>
        <header>
            <h1>Strona Kulinarne Przyjemności</h1>
            <p>Znajdź przepisy na wyśmienite potrawy i odkryj nowe smaki!</p>
        </header>
        
        <h1>Prosta wyszukiwarka</h1>
        
        <form action="/search-results-page" method="get">
        <label for="searchQuery">Wyszukaj:</label>
        <input type="text" id="searchQuery" name="q" placeholder="Znajdz swój przepis">
        <button type="submit">Szukaj</button>
        </form>

        <br>
        <br>
        <br>

        <div class="recipe-container">
            <div class="recipe" onclick="toasts()">
                <h2>Tosty</h2>
                <img src="tosty-omletem-i-szynka.webp" alt="Trulli" width="500" height="333">
            </div>

            <div class="recipe" onclick="hotdogs()">
                <h2>Hot Dogi</h2>
                <img src="d257bb4fe192628f00a98b1f08a7976fbf7f21d4.jpg" alt="Trulli" width="500" height="333">
            </div>

            <div class="recipe" onclick="steak()">
                <h2>stek t-bone</h2>
                <img src="przepis-na-stek-t-bone-01.jpg" alt="Trulli" width="500" height="333">
                </div>

            <div class="recipe" onclick="potato()">
            <h2>Ziemniak</h2>
            <img src="220px-The_real_me.jpg" alt="Trulli" width="500" height="333"></div>
        </div>
        <div class="recipe" onclick="Add()">
                <h2>Dodaj swój przepis</h2>
                <img src="plus-symbol-wektor-typografii-obrysu-pedzla_53876-166821.avif" alt="Trulli" width="500" height="333">
                </div>

        <script>
            function toasts() {
                window.location.href = "http://localhost/sieraczan/przepisy/recipes/toasts.html";
            }

            function hotdogs() {
                window.location.href = "http://localhost/sieraczan/przepisy/recipes/hotdogs.html";
            }

            function steak() {
                window.location.href = "http://localhost/sieraczan/przepisy/recipes/steak.html";
            }
            function potato() {
                window.location.href = "http://localhost/sieraczan/przepisy/recipes/potato.html";
            }
            function Add() {
                window.location.href = "http://localhost/sieraczan/przepisy/recipes/Add.html";
            }
        </script>
    </body>
</html>