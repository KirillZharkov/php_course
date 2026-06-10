<?php
if($_SERVER['SCRIPT_NAME'] == '/index.php'){
    printPage('/index.php', $database);
}elseif($_SERVER['SCRIPT_NAME'] == '/bytovka.php'){
    printPage('/bytovka.php', $database);
}elseif($_SERVER['SCRIPT_NAME'] == '/catalog.php'){
    printPage('/catalog.php', $database);
}elseif($_SERVER['SCRIPT_NAME'] == '/contacts.php'){
    printPage('/contacts.php', $database);
}

function printPage($url_key,& $database){
    //$GLOBALS['database'] = $database;

    $page = searchData($database, $url_key);
    if(!empty($page) && file_exists(PATH_TPL . $page['tpl'])){
        include_once PATH_TPL . $page['tpl'];
    } else {
        die('В базе данных нет данных для данной страницы');
    }
};
?>