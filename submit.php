<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "konserwa";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Połączenie nieudane: ". $conn->connect_error);
}

$title = $_POST['title'];
$description = $_POST['description'];

$sql = "INSERT INTO przepisy(tytul, opis) VALUES ('$title', '$description')";

if($coon->query($sql) === TRUE) {
    echo "Gratulacje Dodałeś przepis";
} else {
    echo "Coś poszło nie tak";
}
?>
