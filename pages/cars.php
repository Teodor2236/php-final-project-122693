<?php
    // страница продукти
    $cars = [];

    $search = $_GET['search'] ?? '';
    // заявка към базата данни
    $sql = 'SELECT * FROM cars WHERE marka LIKE :search';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['search' => '%' . $search . '%']);

    while ($row = $stmt->fetch()) {
        $fav_query = "SELECT id FROM favorite_cars_users WHERE user_id = :user_id AND car_id = :car_id";
        $fav_stmt = $pdo->prepare($fav_query);
        $fav_params = [
            ':user_id' => $_SESSION['user_id'] ?? 0,
            ':car_id' => $row['id']
        ];
        $fav_stmt->execute($fav_params);
        $row['is_favorite'] = $fav_stmt->fetch() ? 1 : 0;

        $cars[] = $row;
    }

    // if (mb_strlen($search) > 0) {
    //     setcookie('last_search', $search, time() + 3600, '/', '', false, false);
    // }
?>

<div class="row">
    <form class="mb-4" method="GET">
        <div class="input-group">
            <input type="hidden" name="page" value="cars">
            <input type="text" class="form-control" placeholder="Търси по марка..." name="search" value="<?php echo $search ?>">
            <button class="btn btn-primary" type="submit">Търсене</button>
        </div>
    </form>

    <div class="alert alert-info">
        Последно търсене: <?php echo $_COOKIE['last_search'] ?? 'няма' ?>
    </div>
</div>
<div class="d-flex flex-wrap justify-content-between">
    <?php
        foreach ($cars as $car) {
            $fav_button = '';
            if (isset($_SESSION['username'])) {
                if ($car['is_favorite'] == '1') {
                    $fav_button = '
                        <div class="card-footer text-center">
                            <button type="button" class="btn btn-sm btn-danger remove-favorite" data-car="' . $car['id'] . '">Премахни от предпочитани</button>
                        </div>
                    ';
                } else {
                    $fav_button = '
                        <div class="card-footer text-center">
                            <button type="button" class="btn btn-sm btn-primary add-favorite" data-car="' . $car['id'] . '">Проявявам интерес</button>
                        </div>
                    ';
                }
            }

            echo '
                <div class="card mb-4 mx-auto" style="width: 18rem;">
                    <div class="card-header d-flex flex-row justify-content-between">
                        <a href="?page=edit_car&car_id=' . $car['id'] . '" class="btn btn-sm btn-warning">Редактирай</a>
                        <form method="POST" action="./handlers/handle_delete_car.php">
                            <input type="hidden" name="car_id" value="' . $car['id'] . '">
                            <button type="submit" class="btn btn-sm btn-danger">Изтрий</button>
                        </form>
                    </div>
                    <img src="uploads/' . htmlspecialchars($car['image']) . '" class="card-img-top" alt="Car Image" style="height:75%;">
                    <div class="card-body text-center">
                        <h5 class="card-title">' . htmlspecialchars($car['marka']) . '</h5>
                        <h4 class="card-title">' . htmlspecialchars($car['model']) . '</h4>
                        <p class="card-text">' . htmlspecialchars($car['price']) . ' лв.</p>
                    </div>
                    ' . $fav_button . '
                </div>
            ';
        }
    ?>
</div>