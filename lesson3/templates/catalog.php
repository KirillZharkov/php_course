<?php
include_once __DIR__ . '/../src/config.php'; 
include_once __DIR__ . '/blocks/render-block.php';
$page = searchData($database, '/catalog.php');   

if (!$page) {
    die('Страница не найдена в database.php');
}$pageTitle = $page['title'] ?? 'Наш каталог бытовки';
$pageH1    = $page['h1']    ?? 'Аренда бытовок';  
  include_once __DIR__ . '/blocks/head.php';
  include_once __DIR__ . '/blocks/bytovka/header_bytovka.php';
  include_once __DIR__ . '/blocks/bytovka/mobile_menu-bytovka.php';

?>
    <main>
      <div class="content">
        <div class="grid-container">
          <ul class="breadcrumbs">
            <li><a href="main.php">Главная</a></li>
            <li><span>Аренда бытовки</span></li>
          </ul>
        </div>
        <div class="grid-container">
          <h1>Аренда бытовки</h1>
        </div>
        <?php renderBlock('preview_products');?>    
        <?php include_once __DIR__ . '/blocks/main/calculator.php';?>
        <?php renderBlock('photogallery_main');?>
        <?php include_once __DIR__ . '/blocks/main/order_form-block.php';?>
       <?php include_once __DIR__ . '/blocks/main/article.php';?>
      </div>
    </main>
    <?php include_once __DIR__ . '/blocks/footer.php';?>
    <?php include_once __DIR__ . '/blocks/popur_order.php';?>
  </body>
</html>