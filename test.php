<?php
// Połączenie z bazą danych MySQL
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'test_db';

// Utworzenie połączenia
$conn = new mysqli($host, $user, $password);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Utworzenie bazy danych, jeśli nie istnieje
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Utworzenie przykładowej tabeli
$tableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100)
)";
$conn->query($tableSql);

// Dodanie przykładowego rekordu
$insertSql = "INSERT INTO users (name, email) VALUES ('Jan Kowalski', 'jan.kowalski@example.com')";
$conn->query($insertSql);

echo "Połączenie, utworzenie tabeli i insert zakończone sukcesem.";

$conn->close();
