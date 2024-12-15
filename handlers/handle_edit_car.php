<?php

require_once('../functions.php');
require_once('../db.php');

// debug($_POST);
// debug($_FILES);
// exit;

$marka = $_POST['marka'] ?? '';
$model = $_POST['model'] ?? '';
$price = $_POST['price'] ?? '';
$car_id = intval($_POST['car_id'] ?? 0);

if (mb_strlen($marka) <= 0 || mb_strlen($model) <= 0 || mb_strlen($price) <= 0 || $car_id <= 0) {
    $_SESSION['flash']['message']['type'] = 'danger';
    $_SESSION['flash']['message']['text'] = "Моля попълнете всички полета!";
    header('Location: ../index.php?page=edit_car&car_id=' . $car_id);
    exit;
}

$img_uploaded = false;
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $new_filename = time() . '_' . $_FILES['image']['name'];
    $upload_dir = '../uploads/';

    // проверка дали директорията съществува
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $new_filename)) {
        $_SESSION['flash']['message']['type'] = 'danger';
        $_SESSION['flash']['message']['text'] = "Грешка при запис на файла!";
        header('Location: ../index.php?page=edit_car&car_id=' . $car_id);
        exit;
    } else {
        $img_uploaded = true;
    }
}

$query = '';
if ($img_uploaded) {
    $query = "UPDATE cars SET marka = :marka, model = :model, price = :price, image = :image WHERE id = :id";
} else {
    $query = "UPDATE cars SET marka = :marka, model = :model, price = :price WHERE id = :id";
}
$stmt = $pdo->prepare($query);
$params = [
    ':marka' => $marka,
    ':model' => $model,
    ':price' => $price,
    ':id' => $car_id
];
if ($img_uploaded) {
    $params[':image'] = $new_filename;
}

if ($stmt->execute($params)) {
    $_SESSION['flash']['message']['type'] = 'success';
    $_SESSION['flash']['message']['text'] = "Обявата беше редактиран успешно!";
} else {
    $_SESSION['flash']['message']['type'] = 'danger';
    $_SESSION['flash']['message']['text'] = "Грешка при редакция на обявата!";
}

header('Location: ../index.php?page=edit_car&car_id=' . $car_id);
exit;


?>