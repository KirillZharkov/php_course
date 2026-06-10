<?php
// === ЗАЩИТА И ПРИСВОЕНИЕ ПЕРЕМЕННЫХ ===
$previewItem = $previewItem ?? [];

$itemTitle       = $previewItem['title']       ?? 'Название не указано';
$itemPrice       = $previewItem['price']       ?? '—';
$itemSize        = $previewItem['size']        ?? '—';
$itemImage       = $previewItem['image']       ?? 'assets/img/no-image.png';
$itemUrl         = $previewItem['url']         ?? '#';
$itemCity        = $previewItem['city']        ?? 'России';
$itemDescription = $previewItem['description'] ?? '';
?>

<div class="preview_bytovka-wrapper">
    <div class="grid-container">
        <div class="preview_bytovka-item">
            <div class="preview_bytovka-main">
                <div class="preview_bytovka-img">
                    <div class="preview_bytovka-slider">
                        <a data-fancybox="<?= htmlspecialchars($itemTitle) ?>" 
                           href="<?= htmlspecialchars($itemImage) ?>">
                            <img src="<?= htmlspecialchars($itemImage) ?>" 
                                 alt="<?= htmlspecialchars($itemTitle) ?>">
                        </a>
                    </div>
                </div>

                <div class="preview_bytovka-content">
                    <a class="preview_bytovka-heading" href="bytovka.php?slug=<?= urlencode($itemUrl) ?>">
                        <?= htmlspecialchars($itemTitle) ?>
                    </a>

                    <div class="preview_bytovka-gabarits"><?= htmlspecialchars($itemSize) ?></div>
                    <div class="preview_bytovka-text"><?= htmlspecialchars($itemDescription) ?></div>

                    <div class="preview_bytovka-characteristics">
                        <ul class="characteristics">
                            <li>Отделка оргалит</li>
                            <li>Усиленный каркас</li>
                            <li>Стальные решетки на окнах</li>
                            <li>Электропроводка</li>
                            <li>Освещение</li>
                            <li>Наружная обшивка оцинкованный профнастил</li>
                            <li>Металлическая дверь</li>
                            <li>Пол – доска окрашенная</li>
                            <li>Возможность постановки бытовки на бытовку</li>
                        </ul>
                    </div>

                    <div>Доступно для заказа в <?= htmlspecialchars($itemCity) ?></div>

                    <div class="preview_bytovka-order">
                        <div class="preview_bytovka-price">Цена: <span><?= htmlspecialchars($itemPrice) ?></span></div>
                        <div class="preview_bytovka-link">
                            <a class="btn_pink" href="#" data-open="popup_order">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="preview_bytovka-additional">
                <div class="preview_bytovka-additional-caption">Может дополнительно комплектоваться:</div>
                <div class="preview_bytovka-icons">
                    <img src="assets/img/add-ic1.svg" alt="">
                    <img src="assets/img/add-ic2.svg" alt="">
                    <img src="assets/img/add-ic3.svg" alt="">
                    <img src="assets/img/add-ic4.png" alt="">
                    <img src="assets/img/add-ic5.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="grid-x">
        <div class="preview_bytovka-more"><span class="btn_blue">Показать еще</span></div>
    </div>
</div>