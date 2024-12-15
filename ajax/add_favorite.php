<?php
require_once('../db.php');

$response = [
    'success' => true,
    'error' => '',
    'data' => []
];

$car_id = intval($_POST['car_id'] ?? 0);

if ($car_id <= 0) {
    $response['success'] = false;
    $response['error'] = 'Невалидно ID на автомобил';
} else {
    $user_id = $_SESSION['user_id'];
    $sql = 'INSERT INTO favorite_cars_users (user_id, car_id) VALUES (:user_id, :car_id)';
    $stmt = $pdo->prepare($sql);
    $params = [
        'user_id' => $user_id,
        'car_id' => $car_id
    ];
    if (!$stmt->execute($params)) {
        $response['success'] = false;
        $response['error'] = 'Възникна грешка при добавянето на автомобила в любими';
    }
}

echo json_encode($response);
exit;

?>
