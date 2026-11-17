<?php
$id = $_GET['id'] ?? 1;
$error = '';

$items = [
    1 => "Номер 'Стандарт'",
    2 => "Номер 'Комфорт'",
    3 => "Номер 'Люкс'"
];

$roomName = $items[$id] ?? 'Номер';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $date = trim($_POST['date'] ?? '');

    if (empty($name) || empty($date)) {
        $error = 'Пожалуйста, заполните все поля формы!';
    } else {
        // Форматируем строку заявки: Имя | Услуга | Дата | Время
        $orderData = $name . " | " . $roomName . " | " . $date . " | " . date('Y-m-d H:i:s') . PHP_EOL;
        
        // Записываем в файл (создастся автоматически)
        file_put_contents('orders.txt', $orderData, FILE_APPEND | LOCK_EX);

        header("Location: success.php?name=" . urlencode($name));
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Бронирование</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Оформление заявки: <?= htmlspecialchars($roomName) ?></h1>
    </header>
    <div class="container">
        <a href="index.php">&larr; Вернуться в каталог</a>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST">
            <label>Ваше имя:</label>
            <input type="text" name="name" required>
            
            <label>Дата заезда:</label>
            <input type="date" name="date" required>
            
            <button type="submit">Подтвердить бронь</button>
        </form>
    </div>
</body>
</html>
