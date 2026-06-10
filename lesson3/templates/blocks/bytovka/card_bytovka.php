<?php
// Защита от Undefined variable
$itemTitle       = $itemTitle       ?? 'Название не указано';
$itemPrice       = $itemPrice       ?? '—';
$itemSize        = $itemSize        ?? '—';
$itemImage       = $itemImage       ?? 'assets/img/no-image.png';
$itemDescription = $itemDescription ?? 'Описание отсутствует';
?><div class="card_bytovka-wrapper">
    <div class="grid-container">
        <div class="card_bytovka-item">
            <div class="card_bytovka-main">
                <div class="card_bytovka-img">
                    <div class="card_bytovka-min-rent">Минимальный срок аренды - <span>30 дней</span></div>
                    
                    <div class="card_bytovka-for slider-dots">
                        <a data-fancybox="<?= htmlspecialchars($itemTitle) ?>" 
                           href="<?= htmlspecialchars($itemImage) ?>">
                            <img src="<?= htmlspecialchars($itemImage) ?>" alt="<?= htmlspecialchars($itemTitle) ?>">
                        </a>
                        <!-- Можно добавить другие фото позже, если будут в массиве -->
                    </div>

                    <!-- Навигация миниатюр (пока тоже одна картинка) -->
                    <div class="card_bytovka-nav">
                        <div class="card_bytovka-nav-item">
                            <div class="card_bytovka-nav-wrap">
                                <img src="<?= htmlspecialchars($itemImage) ?>" alt="<?= htmlspecialchars($itemTitle) ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card_bytovka-content">
                    <div class="card_bytovka-price">Цена аренды: <span><?= htmlspecialchars($itemPrice) ?></span></div>
                    <div class="card_bytovka-rent">Аренда от трех бытовок: <span>5 500 Р/мес</span></div>
                    
                    <div class="card_bytovka-link">
                        <a class="btn_pink" href="#" data-open="popup_order">Заказать</a>
                    </div>

                    <div class="card_bytovka-gabarits">Размеры: <?= htmlspecialchars($itemSize) ?></div>
                    <div class="card_bytovka-text"><?= htmlspecialchars($itemDescription) ?></div>

                    <div class="card_bytovka-characteristics">
                        <ul class="characteristic">
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

                    <div class="card_bytovka-advantages">
                        <ul class="adv">
                            <li>Залога нет</li>
                            <li>Предоплата от двух месяцев</li>
                        </ul>
                    </div>
                    
                    <a class="card_bytovka-download" href="#" alt="" title="">
                        Скачать договор аренды <?= htmlspecialchars($itemTitle) ?>
                    </a>
                </div>
            </div>

            <div class="card_bytovka-info">
                <div class="card_bytovka-video">
                    <div class="video-container">
                        <iframe width="560" height="315" 
                                src="https://www.youtube.com/embed/dNZb_KtKhTc&amp;showinfo=0" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="card_bytovka-calculator">
                    <!-- Здесь можно позже тоже сделать динамику, если нужно -->
                    <div class="delivery_calculator">
                        <div class="grid-container">
                            <div class="delivery_calculator-top">
                                <div class="delivery_calculator-heading">Расчет стоимости доставки</div>
                                <div class="grid-x">
                                    <div class="delivery_calculator-wrap">
                                        <label class="checkbox">
                                            <input type="checkbox">
                                            <div class="checkbox-text">Растояние от склада более 50 км</div>
                                        </label>
                                    </div>
                                    <div class="delivery_calculator-wrap">
                                        <label>Введите расстояние, км:
                                            <input class="number" type="text" required disabled>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-x delivery_calculator-bottom">
                                <div class="delivery_calculator-price">Цена: <span>6500</span></div>
                                <div class="delivery_calculator-button">
                                    <a class="btn_pink" href="#" data-open="popup_order">Заказать</a>
                                </div>
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
    </div>
</div>