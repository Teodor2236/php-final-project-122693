<?php


try {
    $host = '127.0.0.1';
    $db   = 'cars';
    $user = 'cars_user';
    $pass = '123456';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // как да се връщат грешките
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // как да се връщат резултатите
        PDO::ATTR_EMULATE_PREPARES   => false, // как да се параметризират заявките
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

?>