<?php
session_start();

require_once("data/db.php");
require_once("config/config.php");
require_once("helpers.php");
require_once("http_server/handlers/add_user.php");

$db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($db->getDbError()) {
    die("Ошибка подключения: " . $db->getDbError());
}

$errors = [];
$fields = ['email' => '', 'password' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields['email']    = trim($_POST['email'] ?? '');
    $fields['password'] = $_POST['password'] ?? '';

    if (empty($fields['email'])) {
        $errors['email'] = 'Введите e-mail';
    } elseif (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'E-mail введён некорректно';
    }

    if (empty($fields['password'])) {
        $errors['password'] = 'Введите пароль';
    }

    if (empty($errors)) {
        $user = getUserByEmail($db->getConnection(), $fields['email']);

        if (!$user || !password_verify($fields['password'], $user['password'])) {
            $errors['auth'] = 'Вы ввели неверный email/пароль';
        } else {
            $_SESSION['user'] = [
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email']
            ];
            header('Location: index.php');
            exit();
        }
    }
}

$content_side_main = include_template("form_auth.php", [
    "errors" => $errors,
    "fields" => $fields
]);

$layout_content = include_template("layout.php", [
    "content_side_header" => $content_side_header = include_template("header/header_guest.php", []),
    "content_side_main" => $content_side_main,
    "layout_title"      => "Вход на сайт",
    "user"              => null
]);

print($layout_content);
?>