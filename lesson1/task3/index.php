<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>3. Задачи на написание вариативных алгоритмов (if...else)</p>
    <p>a. Посчитать площадь трапеции если переменная $Why заданная пользователем в начале сценария истина 
        и периметр трапеции если эта переменная ложь. Значения необходимые для расчета площади и периметра задайте самостоятельно. </p>
    <p>b. Доработать предыдущую задачу добавив проверку корректности вводимых данных пользователем. Если данные введены некорректно,
         то сообщить об этом и не производить расчеты.
Подсказка: для проверки корректности вводимых данных, рекомендуется сравнить введенное значение и вычисленное значение высоты.
 Не использовать сокращенные формулы расчёта высоты трапеции!!</p>

    <form method="post" action="index.php">
    <label>
        <input type="radio" name="why" value="true" required>
        Да (true)
    </label>
    <br>
    <label>
        <input type="radio" name="why" value="false" required>
        Нет (false)
    </label>
    <br>
    <button type="submit">Отправить</button>
</form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['why'])) {
        $why =  $_POST['why'] === 'true';
         if ($why) {
            echo ((8+16)/2*7),"<br>Да (true):((8+16)/2*7)";
        } else {
            echo 8+16+9+9,"<br>Нет (false):8+16+9+9";
        }
        }
    ?>
</body>
</html>