<?php

require_once('../functions.php');
require_once('../db.php');

// debug($_POST);
// exit;

$id = intval($_POST['car_id'] ?? 0);

if ($id <= 0) {
    $_SESSION['flash']['message']['type'] = 'danger';
    $_SESSION['flash']['message']['text'] = "Грешен идентификатор на автомобил!";
    header('Location: ../index.php?page=cars');
    exit;
}

$query = "DELETE FROM cars WHERE id = :id";
$stmt = $pdo->prepare($query);
if ($stmt->execute(['id' => $id])) {
    $_SESSION['flash']['message']['type'] = 'success';
    $_SESSION['flash']['message']['text'] = "Автомобилът беше изтрит успешно!";
} else {
    $_SESSION['flash']['message']['type'] = 'danger';
    $_SESSION['flash']['message']['text'] = "Грешка при изтриване на автомобил!";
}

header('Location: ../index.php?page=cars');
exit;
?>