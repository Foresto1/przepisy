<?php

if (!isset($_GET['id'])) {
    header("Location: http://localhost/sieraczan/przepisy/index.php");
    die();
}
$recipeID = $_GET['id'];

$server = "localhost";
$username = "root";
$password = "";
$dbname = "konserwa";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$sql = "SELECT * FROM przepisy WHERE ID='$recipeID';";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    header("Location: http://localhost/sieraczan/przepisy/index.php");
    die();
}

$row = $result->fetch_assoc();

$recipeName= $row["tytul"];
$recipeIcon= $row["ikona"];
$recipeIngredientsString = $row["skladniki"];
$recipeIngredients = explode("(,)", $recipeIngredientsString);
$recipeHowToMake = $row['jak_zrobic'];
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Przepis :: Szczegóły Przepisu</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div>
            <div class="logo">
                <header>
                <h1>Przepis</h1>
                </header>
            </div>

            <div class="back-button">
                <a href="http://localhost/sieraczan/przepisy/index.php"><button>Strona Główna</button></a>
            </div>
        </div>

        <div class="recipe-name">
            <?php echo "<h2>$recipeName</h2>"?>
        </div>

        <div class="recipe-info">
            <div class="ingredients">
                <h3>Składniki:</h3>
                <ol>
                    <?php
                    foreach ($recipeIngredients as $item) {
                        echo "<li>$item</li>";
                    }
                    ?>
                </ol>
            </div>

            <div class="how-to-make">
                <h3>Jak Zrobić:</h3>
                <?php echo "<p>$recipeHowToMake</p>"?>
            </div>

            <div class="image">
                <?php echo "<img src=\"$recipeIcon\" alt=\"Recipe Icon\">"?>
            </div>
        </div>
    </body>
</html>

<?php
$conn->close()
?>