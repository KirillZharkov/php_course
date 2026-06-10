<?php
include_once __DIR__ . '/../src/config.php'; 
include_once __DIR__ . '/blocks/render-block.php';
$page = searchData($database, '/photogallery.php');   

if (!$page) {
    die('Страница не найдена в database.php');
}$pageTitle = $page['title'] ?? 'Наша фотогалерея';
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
            <li><span>Фотогалерея</span></li>
          </ul>
        </div>
        <div class="grid-container">
          <h1>Фотогалерея</h1>
        </div>
        <?php renderBlock('photogallery_main');?>
        <?php include_once __DIR__ . '/blocks/main/article.php';?>

      </div>
    </main>
    <?php include_once __DIR__ . '/blocks/footer.php';?>
    <?php include_once __DIR__ . '/blocks/popur_order.php';?>
  </body>
</html>