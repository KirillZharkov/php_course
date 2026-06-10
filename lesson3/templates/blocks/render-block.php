<?php
// рендер блоков

function renderBlock($blockKey) {
    global $database;
    
    if (!isset($database['blocks'][$blockKey])) {
        echo "<!-- Блок {$blockKey} не найден в database.php -->";
        return;
    }

    $block = $database['blocks'][$blockKey];
    $templatePath = __DIR__ . '/../' . $block['template'];

    if (file_exists($templatePath)) {
        include $templatePath;
    } else {
        echo "<!-- Шаблон блока {$blockKey} не найден: {$templatePath} -->";
    }
}
?>