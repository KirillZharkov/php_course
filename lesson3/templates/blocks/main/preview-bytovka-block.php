<?php
if (!isset($database)) {
    die('Ошибка: $database не загружен. Подключите config.php');
}
$products = $database['products'] ?? [];
?>

<div class="preview_bytovka-wrapper">
    <div class="grid-container">
        
        <?php foreach ($products as $slug => $product): ?>
            
            <?php
            // Подготовка данных для одной карточки
            $previewItem = [
                'title'       => $product['title'],
                'price'       => $product['price'],
                'size'        => $product['size'],
                'image'       => $product['image'],
                'url'         => $slug,
                'city'        => $product['city'],
                'description' => $product['description'],
            ];
            ?>

            <?php include __DIR__ . '/preview-bytovka.php'; ?>

        <?php endforeach; ?>

    </div>

    <div class="grid-x">
        <div class="preview_bytovka-more">
            <span class="btn_blue">Показать еще</span>
        </div>
    </div>
</div>