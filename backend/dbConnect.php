<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'project_saraswoti';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $output = 'Database Connection have been established';
//    echo "Database connection successful";
} catch (PDOException $exception) {
    $output = 'An exception have occurred with ' . $exception->getMessage() . 'in line number ' . $exception->getLine();
//    echo "Not successful";
}
