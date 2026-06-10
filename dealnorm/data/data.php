<?php 
require_once("data/db.php");
require_once("config/config.php");
require_once("./helpers.php");
$db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($db->getDbError()) {
    die("Ошибка подключения: " . $db->getDbError());
}

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

$days = rand(-3, 3);
$task_deadline_ts = strtotime("+" . $days . " day midnight"); // метка времени даты выполнения задачи
$current_ts = strtotime('now midnight'); // текущая метка времени

// запишите сюда дату выполнения задачи в формате дд.мм.гггг
$date_deadline = null;

// в эту переменную запишите кол-во дней до даты задачи
$hours_until_deadline  = null;

//$projects = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];

// $tasks = [
//   ["Собеседование в IT компании", "04.06.2026", "Работа", false],
//   ["Выполнить тестовое задание", "25.07.2026", "Работа", false],
//   ["Сделать задание первого раздела", "1.06.2026", "Учеба", true],
//   ["Встреча с другом", "22.06.2026", "Входящие", false],
//   ["Купить корм для кота", null, "Домашние дела", false],
//   ["Заказать пиццу", null, "Домашние дела", false]
// ];
// foreach ($tasks as $key => $task) {
//   if ($task['deadline']) {
//     $date_deadline = strtotime(str_replace('.', '-', $task['deadline']));
//     $hours_until_deadline = ($date_deadline - $current_ts) / 3600;
//     $tasks[$key][4] = $hours_until_deadline;
//   } else {
//     $tasks[$key][4] = null;
//   }
  
// }
//запросы
$actual_user_id = 1;
$sql_projects  = "SELECT * FROM projects WHERE user_id = ?"; 
$stmt_projects  = db_get_prepare_stmt($db->getConnection(), $sql_projects,[$actual_user_id]);
mysqli_stmt_execute($stmt_projects);
$res_projects = mysqli_stmt_get_result($stmt_projects);
$projects = mysqli_fetch_all($res_projects,MYSQLI_ASSOC);

$sql_tasks  = "SELECT * FROM tasks WHERE user_id = ?"; 
$stmt_tasks  = db_get_prepare_stmt($db->getConnection(), $sql_tasks,[$actual_user_id]);
mysqli_stmt_execute($stmt_tasks);
$res_tasks = mysqli_stmt_get_result($stmt_tasks);
$tasks = mysqli_fetch_all($res_tasks,MYSQLI_ASSOC);

$sql = "UPDATE tasks set title = 'max verstappen' where id = 6";
$res = $db->executeQuery($sql);
if (!$res) { die("Ошибка выполнения запроса: " . $db->getDbError()); }
?>