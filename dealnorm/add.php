<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: auth.php');
    exit();
}
require_once("data/db.php");
require_once("config/config.php");
require_once("helpers.php");
require_once("data/data.php");
// require_once("http_server/handlers/projects.php");
require_once("http_server/handlers/tasks.php");
require_once("http_server/handlers/add_task.php");

$db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($db->getDbError()) {
    die("Ошибка подключения: " . $db->getDbError());
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
$add_task_result = handleAddTask($db->getConnection(), $projects);
$errors = $add_task_result['errors'];
$requered_fields = $add_task_result['requered_fields'];


$content_side_main = include_template("form_task.php",[
    "projects" => $projects,
    "tasks" => $tasks,
    "all_tasks" => $all_tasks,
    "current_project_id" => $current_project_id,
    "errors" => $errors,
    "requered_fields" => $requered_fields]);

$layout_content = include_template("layout.php",[
    "content_side_header" => $content_side_header = include_template("header/header_main.php", [
        'user' => $_SESSION['user']
    ]),
    'user' => $_SESSION['user'],
    "content_side_main" => $content_side_main,
    "layout_title" => "Дела в порядке!"]);

print($layout_content);
?>