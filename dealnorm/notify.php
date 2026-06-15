<?php
require_once("vendor/autoload.php");

require_once("data/db.php");
require_once("config/config.php");
require_once("helpers.php");
require_once("data/data.php");
require_once("http_server/handlers/mess_email.php");

$db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($db->getDbError()) {
    die("Ошибка подключения: " . $db->getDbError());
}

$notify = getNotificationsTasks($db->getConnection());
if (empty($notify)) {
    echo "Задач для уведомлений нет";
    exit();
}
//Группируем задачи по пользователю
$users_tasks = groupingTasksUser($notify);
echo "<pre>";
print_r($users_tasks);
echo "</pre>";
$smtp_host = SMTP_HOST;
$smtp_port = 465;
$smtp_username = SMTP_USERNAME;
$smtp_password = SMTP_PASSWORD;
$smtp_encryption = 'ssl';

$transport = (new Swift_SmtpTransport($smtp_host, $smtp_port, $smtp_encryption))
    ->setUsername($smtp_username)
    ->setPassword($smtp_password);

$mailer = new Swift_Mailer($transport);
$sent_count = 0;
foreach ($users_tasks as $user) {
    $message_text = "Уважаемый, " . $user['name'] . ".\n";
    $message_text .= "У вас запланированы следующие задачи:\n\n";

    foreach ($user['tasks'] as $index => $task) {
        $deadline = date('d.m.Y', strtotime($task['deadline']));
        $message_text .= ($index + 1) . ". " . $task['title'] . " на " . $deadline . "\n";
    }

    $message = (new Swift_Message('Уведомление от сервиса «Дела в порядке»'))
        ->setFrom(['keks@phpdemo.ru' => 'Дела в порядке'])
        ->setTo([$user['email'] => $user['name']])
        ->setBody($message_text, 'text/plain', 'UTF-8');

    $result = $mailer->send($message);

    if ($result) {
        $sent_count++;
    }
    $result = $mailer->send($message);

try {
    $result = $mailer->send($message);
    echo "Письмо отправлено";
} catch (Exception $e) {
    echo $e->getMessage();
}
}

echo "Готово. Отправлено писем: " . $sent_count;


?>