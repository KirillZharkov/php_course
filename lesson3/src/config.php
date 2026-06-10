<?php

//define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);
define('ROOT_PATH', __DIR__ . '/../');
const PATH_SRC = ROOT_PATH . '/src/';
const PATH_TPL = ROOT_PATH . '/templates/';
const PATH_BLOCKS  = ROOT_PATH . 'templates/blocks/';

$base_files=[];
$base_files[] = PATH_SRC . 'database.php';
$base_files[] = PATH_SRC . 'model.php';
$base_files[] = PATH_SRC . 'controller.php';

foreach($base_files as $file){
    if(file_exists($file)){
        include_once $file;
    } else {
        die('Файл ' . $file . ' не найден!');
    }
}

?>