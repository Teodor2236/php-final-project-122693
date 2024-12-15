<?php
    // добавяне/редакция на продукт
?>

<form class="border rounded p-4 w-50 mx-auto text-light" method="POST" action="./handlers/handle_add_car.php" enctype="multipart/form-data">
    <h3 class="text-center">Добави автомобил</h3>
    <div class="mb-3">
        <label for="title" class="form-label">Марка:</label>
        <input type="text" class="form-control" id="marka" name="marka">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Модел:</label>
        <input type="text" class="form-control" id="model" name="model">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена:</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Изображение:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <button type="submit" class="btn btn-success mx-auto">Добави</button>
</form>