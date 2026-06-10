<?php
include_once __DIR__ . '/../src/config.php'; 
include_once __DIR__ . '/blocks/render-block.php';
$page = searchData($database, '/index.php');   

if (!$page) {
    die('Страница не найдена в database.php');
}$pageTitle = $page['title'] ?? 'Главная';
$pageH1    = $page['h1']    ?? 'Аренда бытовок';

  //$pageTitle = 'Главная';
  include_once __DIR__ . '/blocks/head.php';
  include_once __DIR__ . '/blocks/header.php';
  include_once __DIR__ . '/blocks/mobile_menu.php';   
?>

    <main>
      <?php renderBlock('main_slider');?>
      <?php renderBlock('preview_products');?>
      <?php include_once __DIR__ . '/blocks/main/map.php';?>
      <?php renderBlock('rent_block');?>
      <?php renderBlock('tech_characteristics');?>
      <?php include_once __DIR__ . '/blocks/main/calculator.php';?>
      <?php renderBlock('advantages');?>
      <?php renderBlock('photogallery_main');?>
      <?php renderBlock('price_list_main');?>
      <div class="grid-container content">
        <?php include_once __DIR__ . '/blocks/price/seo_text.php';?>
      </div>
      <?php renderBlock('delivery_calculator');?>
      <?php renderBlock('faq');?>
      <?php include_once __DIR__ . '/blocks/main/order_form-block.php';?>
     <?php include_once __DIR__ . '/blocks/main/article.php';?>
    </main>
   <?php include_once __DIR__ . '/blocks/footer.php';?>
    <?php include_once __DIR__ . '/blocks/popur_order.php';?>
  </body>
</html>