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
    $sql = 'DELETE FROM favorite_cars_users WHERE user_id = :user_id AND car_id = :car_id';
    $stmt = $pdo->prepare($sql);
    $params = [
        'user_id' => $user_id,
        'car_id' => $car_id
    ];
    if (!$stmt->execute($params)) {
        $response['success'] = false;
        $response['error'] = 'Възникна грешка при премахване на автомобила от любими';
    }
}

echo json_encode($response);
exit;

?>