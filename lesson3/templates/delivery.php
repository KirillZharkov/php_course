<?php
include_once __DIR__ . '/../src/config.php'; 
include_once __DIR__ . '/blocks/render-block.php';
$page = searchData($database, '/delivery.php');   

if (!$page) {
    die('Страница не найдена в database.php');
}$pageTitle = $page['title'] ?? 'О доставке';
$pageH1    = $page['h1']    ?? 'Аренда бытовок';
  include_once __DIR__ . '/blocks/head.php';
  include_once __DIR__ . '/blocks/bytovka/header_bytovka.php';
  include_once __DIR__ . '/blocks/bytovka/mobile_menu-bytovka.php';
?>
    <main>
      <div class="content">
        <div class="grid-container">
          <ul class="breadcrumbs">
            <li><a href="index.php">Главная</a></li>
            <li><span>Доставка</span></li>
          </ul>
        </div>
        <div class="grid-container">
          <h1>Доставка</h1>
        </div>
        <div class="grid-container">
          <div class="seo_text"><img class="content-img" src="assets/img/delivery.png" alt="" title="">
            <p>Для того, чтобы избавить своих клиентов от лишних проблем наша компания предлагает такие услуги как: доставка бытовок и блок-контейнеров.</p>
            <p>Доставка бытовок включает в себя не только транспортировку, но и погрузочно-разгрузочные работы, а также их установку. Перевозка бытовок производится в собранном виде при помощи манипулятора. Это значительно сокращает расходы, так как избавляет от необходимости использования грузоподъемной техники.</p>
            <p>Стоимость услуги до 50 км от склада (г. Химки, МО) на сегодняшний день составляет 6 500 рублей. Перевозка бытовок на более дальнее расстояние осуществляется по прейскуранту 50 рублей за каждый дополнительный километр.</p>
            <p>Все разрешения на перевозку бытовок наша компания получает самостоятельно. Вам нужно сделать только заказ и указать начальную и конечную точку перевозки. Остальные формальности наша компания берет на себя. Необходимо учитывать, чтобы на месте погрузки и выгрузки бытовок был свободный подъезд манипулятора.</p>
            <p>Звоните по телефонам:<span class="tel">+7 (495) 789-55-63</span>,<span class="tel">+7 (495) 641-85-68 </span>, и наши консультанты подберут для вас наиболее выгодные условия сотрудничества.</p>
          </div>
        </div>
        <?php renderBlock('delivery_calculator');?>
        <?php renderBlock('photogallery_main');?>
        <?php include_once __DIR__ . '/blocks/main/order_form-block.php';?>
        <?php include_once __DIR__ . '/blocks/main/article.php';?>
      </div>
    </main>
    <?php include_once __DIR__ . '/blocks/footer.php';?>
    <?php include_once __DIR__ . '/blocks/popur_order.php';?>
  </body>
</html>