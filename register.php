<?php
$host = 'your-rds-endpoint';
$db = 'booksdb';
$user = 'admin';
$pass = 'yourpassword';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}

$title = $_POST['title'];
$author = $_POST['author'];

$stmt = $pdo->prepare('INSERT INTO books (title, author) VALUES (?, ?)');
$stmt->execute([$title, $author]);

echo "Libro registrado con éxito";
?>