<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "konserwa";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Połączenie nieudane: ". $conn->connect_error);
}

$sql = "SELECT * FROM przepisy";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM przepisy WHERE tytul LIKE \"%$search%\";";
}
$result = $conn->query($sql);
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
        <header class="header">
            <h1>Strona Kulinarne Przyjemności</h1>
            <p>Znajdź przepisy na wyśmienite potrawy i odkryj nowe smaki!</p>
        </header>
        
        <h1>Prosta wyszukiwarka</h1>
        
        <form action="/sieraczan/przepisy/index.php" method="get">
            <input type="text" name="search" id="search" placeholder="Wyszukaj Produkt">
            <input type="submit" value="szukaj">
        </form>
        </form>

        <br>
        <br>
        <br>

        <div class="recipe-container">
        <?php
            if (mysqli_num_rows($result) > 0) {
                // Output each recipe
                while ($row = mysqli_fetch_assoc($result)) {
                    $ID = $row["ID"];
                    $name = $row['tytul'];
                    $icon = $row['ikona'];
                    $ingredients = $row['skladniki'];
                    $how_to_make = $row['jak_zrobic'];
            
                    // Generate HTML for the recipe
                    echo '<div class="recipe">';
                    // xd
                    echo "<a href=\"http://localhost/sieraczan/przepisy/recipe.php?id=$ID\"><img src=\"$icon\" alt=\"Recipe Icon\"></a>";
                    echo "<h2>$name</h2>";
                    // You can include additional information like ingredients and how to make here
                    echo '</div>';
                }
            } else {
                echo "No recipes found.";
            }
            ?>
        </div>

        <a href="http://localhost/sieraczan/przepisy/Add.php"><div class="recipe" onclick="Add()">
            <h2>Dodaj swój przepis</h2>
            <img src="plus-symbol-wektor-typografii-obrysu-pedzla_53876-166821.avif" alt="Trulli" width="500" height="333">
        </div></a>
    </body>
</html>

<?php
$conn->close();
?>