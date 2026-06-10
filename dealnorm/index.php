<?php
session_start();

require_once("data/db.php");
require_once("config/config.php");
require_once("helpers.php");
require_once("data/data.php");
// require_once("http_server/handlers/projects.php");
require_once("http_server/handlers/tasks.php");

$db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($db->getDbError()) {
    die("Ошибка подключения: " . $db->getDbError());
}
if (empty($_SESSION['user'])) {
    // показываем гостевую страницу
    $layout_content = include_template("layout.php", [
        "content_side_main" => include_template("guest.php", []),
        "content_side_header" => $content_side_header = include_template("header/header_guest.php", []),
        "layout_title"      => "Дела в порядке",
        "user"              => null
    ]);
    print($layout_content);
    exit();
}
$actual_user_id = $_SESSION['user']['id'];
$current_project_id = null;
$flag=null;

$projects = getProject($db->getConnection(), $actual_user_id);

if(isset($_GET['project_id'])){
    $current_project_id = (int)$_GET['project_id'];
    //для проверки существования проекта с таким id в списке проектов пользователя
    foreach($projects as $project){
        if($project['id'] == $current_project_id){
            $flag = true;
            break;
        }
    }
    if(!$flag){
        http_response_code(404);
        die("Проект не найден");   
    }
}
$tasks = getProjectTasks($db->getConnection(), $actual_user_id, $current_project_id);
$all_tasks = getProjectTasks($db->getConnection(), $actual_user_id, null);

$filter = $_GET['filter'] ?? 'all';
$show_complete_tasks = isset($_GET['show_complete']) ? 1 : 0;

$tasks = getFilteredTasks($db->getConnection(), $actual_user_id, $current_project_id, $filter);

$content_side_main = include_template("main.php",[
    "show_complete_tasks" => $show_complete_tasks,
    "projects" => $projects,
    "filter" => $filter,
    "tasks" => $tasks,
    "all_tasks" => $all_tasks,
    "current_project_id" => $current_project_id]);


$layout_content = include_template("layout.php",[
    "content_side_main" => $content_side_main,
    "content_side_header" => $content_side_header = include_template("header/header_auth.php", [
        'user' => $_SESSION['user']
    ]),
    'user' => $_SESSION['user'],
    "layout_title" => "Дела в порядке!"]);

print($layout_content);
?>