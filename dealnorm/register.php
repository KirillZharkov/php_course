<?php
require_once("data/db.php");
require_once("config/config.php");
require_once("helpers.php");
//require_once("data/data.php");
// require_once("http_server/handlers/projects.php");
//require_once("http_server/handlers/tasks.php");
require_once("http_server/handlers/add_user.php");

$db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($db->getDbError()) {
    die("Ошибка подключения: " . $db->getDbError());
}

$result = handleAddUser($db->getConnection());
$errors = $result['errors'];
$fields = $result['fields'];

$content_side_main = include_template("form_register.php",[
    "errors" => $errors,
    "fields" => $fields
]);

$layout_content = include_template("layout.php",[
    //"content_side_header" => $content_side_header = include_template("header_register.php", []),
    "content_side_header" => $content_side_header = include_template("header/header_guest.php", []),
    "content_side_main" => $content_side_main,
    "layout_title" => "Дела в порядке!"]);

print($layout_content);
?>