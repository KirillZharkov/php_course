<?php

$fp = fsockopen("smtp.gmail.com", 587, $errno, $errstr, 10);

if (!$fp) {
    echo "Ошибка: $errstr ($errno)";
} else {
    echo "Соединение успешно";
    fclose($fp);
}