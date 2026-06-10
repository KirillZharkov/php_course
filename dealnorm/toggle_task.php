<?php
session_start();
require_once("data/db.php");
require_once("config/config.php");
require_once("helpers.php");
require_once("http_server/handlers/tasks.php");

if (empty($_SESSION['user'])) {
    header('Location: auth.php');
    exit();
}

$db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$actual_user_id = $_SESSION['user']['id'];
$task_id = (int)($_POST['task_id'] ?? 0);

if ($task_id) {
    toggleTaskStatus($db->getConnection(), $task_id, $actual_user_id);
}

header('Location: index.php');
exit();
?>