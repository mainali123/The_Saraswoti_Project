<?php
$servername = 'localhost:3308';
$username = 'root';
$password = 'Admin123###';
$database = 'project_saraswoti';

try {
    global $pdo;
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $output = 'Database Connection have been established';
//    echo "Database connection successful";
} catch (PDOException $exception) {
    $output = 'An exception have occurred with ' . $exception->getMessage() . 'in line number ' . $exception->getLine();
//    echo "Not successful";
}
