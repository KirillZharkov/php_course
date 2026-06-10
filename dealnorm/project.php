<?php
session_start();

require_once("data/db.php");
require_once("config/config.php");
require_once("helpers.php");
require_once("data/data.php");
require_once("http_server/handlers/projects.php");
require_once("http_server/handlers/tasks.php");

if (empty($_SESSION['user'])) {
    header('Location: auth.php');
    exit();
}

$db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($db->getDbError()) {
    die("Ошибка подключения: " . $db->getDbError());
}

$actual_user_id = $_SESSION['user']['id'];

$projects = getProject($db->getConnection(), $actual_user_id);
$current_project_id = null;
$all_tasks = getProjectTasks($db->getConnection(), $actual_user_id, null);

$errors = [];
$requered_fields = [
    'name' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requered_fields['name'] = trim($_POST['name'] ?? '');

    if ($requered_fields['name'] === '') {
        $errors['name'] = 'Введите название проекта';
    } elseif (mb_strlen($requered_fields['name']) > 128) {
        $errors['name'] = 'Название не должно превышать 128 символов';
    }

    if (empty($errors)) {
        addProject($db->getConnection(), [
            'user_id' => $actual_user_id,
            'name' => $requered_fields['name']
        ]);

        header('Location: index.php');
        exit();
    }
}

$content_side_main = include_template("form_project.php", [
    "projects" => $projects,
    "all_tasks" => $all_tasks,
    "current_project_id" => $current_project_id,
    "errors" => $errors,
    "requered_fields" => $requered_fields
]);

$layout_content = include_template("layout.php", [
    "content_side_header" => include_template("header/header_main.php", [
        "user" => $_SESSION['user']
    ]),
    "content_side_main" => $content_side_main,
    "user" => $_SESSION['user'],
    "layout_title" => "Дела в порядке!"
]);

print($layout_content);