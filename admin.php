<?php
$orders = [];
if (file_exists('orders.txt')) {
    $lines = file('orders.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $parts = explode(" | ", $line);
        if (count($parts) === 4) {
            $orders[] = [
                'name' => $parts[0],
                'room' => $parts[1],
                'date' => $parts[2],
                'time' => $parts[3]
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Панель управления (Админка)</h1>
    </header>
    <div class="container">
        <a href="index.php">&larr; На главную сайт</a>
        <h2>Список поступивших заявок</h2>
        
        <?php if (empty($orders)): ?>
            <p>Пока нет ни одной заявки.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Имя клиента</th>
                        <th>Услуга / Номер</th>
                        <th>Дата заезда</th>
                        <th>Дата создания</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['name']) ?></td>
                            <td><?= htmlspecialchars($order['room']) ?></td>
                            <td><?= htmlspecialchars($order['date']) ?></td>
                            <td><?= htmlspecialchars($order['time']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
