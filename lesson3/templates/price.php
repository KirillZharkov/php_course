<?php 
  $pageTitle = 'Цены';
  include_once __DIR__ . '/blocks/head.php';
  include_once __DIR__ . '/blocks/bytovka/header_bytovka.php';
  include_once __DIR__ . '/blocks/bytovka/mobile_menu-bytovka.php';
?>
    
    
    <main>
      <div class="content price-page">
        <div class="grid-container">
          <?php include_once __DIR__ . '/blocks/price/breadcrumbs.php';?>
        </div>
        <div class="grid-container">
          <h1>Цены</h1>
        </div>
        <?php include_once __DIR__ . '/blocks/price/price_list.php';?>
        
        <?php include_once __DIR__ . '/blocks/price/calculator.php';?>
        <div class="grid-container">
          <?php include_once __DIR__ . '/blocks/price/seo_text.php';?>
        </div>
      </div>
    </main>
    <?php include_once __DIR__ . '/blocks/footer.php';?>
    <?php include_once __DIR__ . '/blocks/popur_order.php';?>
  </body>
</html>