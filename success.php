<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Успешно</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="text-align: center; margin-top: 50px;">
        <h2>Спасибо за заявку, <?= htmlspecialchars($_GET['name'] ?? 'Гость') ?>!</h2>
        <p>Ваша бронь успешно оформлена и передана в систему.</p>
        <br>
        <a href="index.php"><button style="width: 200px;">На главную</button></a>
    </div>
</body>
</html>
