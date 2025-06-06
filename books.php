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
    echo json_encode([]);
    exit();
}

$stmt = $pdo->query('SELECT title, author FROM books ORDER BY id DESC');
echo json_encode($stmt->fetchAll());
?>