<?php
$database = [
    'products' => [
        'bytovka-sklad' => [
            'title'       => 'Бытовка склад',
            'h1'          => 'Бытовка склад',
            'breadcrumbs' => 'Бытовка склад',
            'price'       => '6000 р',
            'size'        => '2400 x 6000',
            'image'       => 'assets/img/preview1.png',
            'city'        => 'Москве',
            'description' => 'Утепленная строительная бытовка для хранения инструмента и материалов.',
        ],
        'bytovka-stroitelnaya' => [
            'title'       => 'Бытовка строительная',
            'h1'          => 'Бытовка строительная',
            'breadcrumbs' => 'Бытовка строительная',
            'price'       => '7500 р',
            'size'        => '2400 x 7000',
            'image'       => 'assets/img/preview2.png',
            'city'        => 'Санкт-Петербурге',
            'description' => 'Надежная бытовка для размещения рабочих на строительных объектах.',
        ],
        'bytovka-dachnaya' => [
            'title'       => 'Бытовка дачная',
            'h1'          => 'Бытовка дачная',
            'breadcrumbs' => 'Бытовка дачная',
            'price'       => '8200 р',
            'size'        => '3000 x 6000',
            'image'       => 'assets/img/preview3.png',
            'city'        => 'Казани',
            'description' => 'Комфортная бытовка для сезонного проживания на даче.',
        ],
        'bytovka-office' => [
            'title'       => 'Блок-контейнер офисный',
            'h1'          => 'Блок-контейнер офисный',
            'breadcrumbs' => 'Блок-контейнер офисный',
            'price'       => '9500 р',
            'size'        => '3000 x 8000',
            'image'       => 'assets/img/preview4.png',
            'city'        => 'Екатеринбурге',
            'description' => 'Офисный модуль с утеплением и электропроводкой.',
        ],
    ],
    'pages' => [
        [
            'url_key' => '/index.php',
            'tpl'     => 'main.php',
            'title'   => 'Главная страница сайта бытовок',
            'text'    => 'text',
        ],
        [
            'url_key' => '/',
            'tpl'     => 'main.php',
            'title'   => 'Главная страница сайта бытовок',
            'text'    => '',
        ],
        [
            'url_key' => '/bytovka.php',
            'tpl'     => 'bytovka.php',
            'title'   => 'О товаре',
            'text'    => 'Бытовка прорабская (офис)',
        ],
        [
            'url_key' => '/catalog.php',
            'tpl'     => 'catalog.php',
            'title'   => 'Наш каталог бытовки',
            'text'    => 'Аренда бытовки',
        ],
        [
            'url_key' => '/contacts.php',
            'tpl'     => 'contacts.php',
            'title'   => 'О связи с нами',
            'text'    => 'Контакты',
        ],
        [
            'url_key' => '/delivery.php',
            'tpl'     => 'delivery.php',
            'title'   => 'О доставке',
            'text'    => 'Доставка',
        ],
        [
            'url_key' => '/photogallery.php',
            'tpl'     => 'photogallery.php',
            'title'   => 'Наша фотогалерея',
            'text'    => 'Фотогалерея',
        ],
        [
            'url_key' => '/price.php',
            'tpl'     => 'price.php',
            'title'   => 'Наши цены',
            'text'    => 'Цены',
        ],
        [
            'url_key' => '/rent.php',
            'tpl'     => 'rent.php',
            'title'   => 'Аренда строительных бытовок',
            'text'    => 'Покупать или арендовать?',
        ],
    ],
    'questions' => [
        [
            'id' => 1,
            'title' => 'Сколько времени занимает доставка?',
            'description' => 'Бытовку Вы получаете в день составления договора и оплаты заказа',
        ],
        [
            'id' => 2,
            'title' => 'Возможно ли доукомплектовывать бытовку?',
            'description' => 'Да, мы предоставляем разнообразный выбор комплектации...',
        ],
        [
            'id' => 3,
            'title' => 'Возможна ли аренда бу бытовки без залога?',
            'description' => 'Да, вариант аренды без залога возможен при условии аванса за 3 месяца.',
        ],
        [
            'id' => 4,
            'title' => 'Как мне вернуть бытовку по истечении срока аренды?',
            'description' => 'При приблежении окончания срока аренды, наши менеджеры сами свяжутся с Вами, для обсуждения процесса возврата удобным для Вас способом.',
        ],
        [
            'id' => 5,
            'title' => 'Есть ли у Вас бытовки для проживания зимой?',
            'description' => 'Да, наша компания предлагает бытовки, которые утеплены 100мм слоем утеплителя, на полу настелен линолеум, в них будет комфортно до -15 градусов. Так же возможна комплектация дополнительным электрооборудованием.',
        ],
        [
            'id' => 6,
            'title' => 'Какие дополнительные расходы могут возникнуть при аренде вагончика?',
            'description' => 'Кроме оплаты аренды Вам необходимо оплатить доставку, если у вас нет собственного транспорта.',
        ],
        [
            'id' => 7,
            'title' => 'Нужен ли фундамент для установки или можно ставить на грунт?',
            'description' => 'Мы рекомендуем устанавливать бытовку на фундаменте или на бетонных блоках. Однако, можно установить на ровную заасфальтированную площадку.',
        ],
        [
            'id' => 8,
            'title' => 'Можно ли выкупить арендованную бытовку?',
            'description' => 'Вопрос покупки обговаривается индивидуально.',
        ],
    ],
        // === БЛОКИ САЙТА (только важные) ===
    'blocks' => [
        'main_slider' => [
            'template' => 'blocks/main/slider.php',
            'title'    => 'Слайдер',
        ],
        'preview_products' => [
            'template' => 'blocks/main/preview-bytovka-block.php',
            'title'    => 'Каталог бытовок',
        ],
        'tech_characteristics' => [
            'template' => 'blocks/main/tech-characteristics.php',
            'title'    => 'Технические характеристики',
        ],
        'faq' => [
            'template' => 'blocks/main/often-question.php',
            'title'    => 'Часто задаваемые вопросы',
        ],
        'photogallery_main' => [
            'template' => 'blocks/main/main_photogallery.php',
            'title'    => 'Фотогалерея',
        ],
        'price_list_main' => [
            'template' => 'blocks/main/price_list_main.php',
            'title'    => 'Цены на аренду',
        ],
        'advantages' => [
            'template' => 'blocks/main/advantages.php',
            'title'    => 'Наши преимущества',
        ],
        'rent_block' => [
            'template' => 'blocks/main/rent-block.php',
            'title'    => '',
        ],
        'delivery_calculator' => [
            'template' => 'blocks/main/delivery_calculator.php',
            'title'    => 'Расчёт доставки',
        ],
    ],
];
?>