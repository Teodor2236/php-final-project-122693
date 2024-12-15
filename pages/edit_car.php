<?php
    // добавяне/редакция на продукт
    $car_id = intval($_GET['car_id'] ?? 0);

    if ($car_id <= 0) {
        $_SESSION['flash']['message']['type'] = 'danger';
        $_SESSION['flash']['message']['text'] = "Грешен идентификатор на автомобил!";
        header('Location: ./index.php?page=cars');
        exit;
    }

    $query = "SELECT * FROM cars WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $car_id]);
    $car = $stmt->fetch();

    // debug($product);
?>

<form class="border rounded p-4 w-50 mx-auto text-light" method="POST" action="./handlers/handle_edit_car.php" enctype="multipart/form-data">
    <h3 class="text-center">Редактирай обява</h3>
    <div class="mb-3">
        <label for="title" class="form-label">Марка:</label>
        <input type="text" class="form-control" id="marka" name="marka" value="<?php echo $car['marka'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Модел:</label>
        <input type="text" class="form-control" id="model" name="model" value="<?php echo $car['model'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена:</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $car['price'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Изображение:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>

    <div class="mb-3">
        <img src="./uploads/<?php echo $car['image'] ?>" alt="<?php echo $car['marka'] ?>" class="img-thumbnail">
    </div>
    <input type="hidden" name="car_id" value="<?php echo $car['id'] ?? 0 ?>">
    <button type="submit" class="btn btn-success mx-auto">Редактирай</button>
</form>