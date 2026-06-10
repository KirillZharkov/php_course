<?php
function searchData(& $database, $url_key){
    foreach($database['pages'] as $page){
        if($page['url_key'] == $url_key){
            return $page;
        }
    }
    return false;
}
?>