<?php
// Подключаем данные товаров
//include_once __DIR__ . '/data/products.php';
// Подключаем конфиг (главное!)
include_once __DIR__ . '/../src/config.php';
// Получаем slug и очищаем его от .php
$slug = $_GET['slug'] ?? 'bytovka-sklad';

// Убираем .php в конце, если кто-то передал
$slug = str_replace('.php', '', $slug);

$products = $database['products'] ?? [];
$product = $products[$slug] ?? $products['bytovka-sklad'] ?? null;

if (!$product) {
    die('Товар не найден');
}
// if (!isset($products[$slug])) {
//     $slug = 'bytovka-sklad'; // fallback
// }

//$product = $products[$slug];

// Устанавливаем title страницы
$pageTitle = $product['h1'] ?? 'Бытовка';

include_once __DIR__ . '/blocks/head.php';
include_once __DIR__ . '/blocks/bytovka/header_bytovka.php';
include_once __DIR__ . '/blocks/bytovka/mobile_menu-bytovka.php';
?>

<main>
    <div class="content">
        <div class="grid-container">
            <ul class="breadcrumbs">
                <li><a href="index.php">Главная</a></li>
                <li><a href="rent.php">Аренда бытовки</a></li>
                <li><span><?= htmlspecialchars($product['breadcrumbs'] ?? $product['title']) ?></span></li>            
            </ul>
        </div>
        
        <div class="grid-container">
            <h1><?= htmlspecialchars($product['h1'] ?? $product['title']) ?></h1>
        </div>

        <?php
        // Передаём данные в карточку
        $itemTitle       = $product['title']       ?? 'Название не указано';
        $itemPrice       = $product['price']       ?? '—';
        $itemSize        = $product['size']        ?? '—';
        $itemImage       = $product['image']       ?? 'assets/img/no-image.png';
        $itemDescription = $product['description'] ?? '';
        ?>

        <?php include_once __DIR__ . '/blocks/bytovka/card_bytovka.php';?>
        <?php include_once __DIR__ . '/blocks/main/article.php';?>
    </div>
</main>

<?php include_once __DIR__ . '/blocks/footer.php';?>
<?php include_once __DIR__ . '/blocks/popur_order.php';?>
</body>
</html>