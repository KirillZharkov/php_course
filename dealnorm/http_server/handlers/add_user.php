<?php 
function addUser($db, array $user_data){
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = db_get_prepare_stmt($db, $sql, [
        $user_data['name'], 
        $user_data['email'], 
        password_hash($user_data['password'], PASSWORD_DEFAULT)]);
    mysqli_stmt_execute($stmt);
}

function getUserByEmail($db, string $email): ?array {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = db_get_prepare_stmt($db, $sql, [$email]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    return $user ?: null;
}

function isEmailTaken($db, string $email): bool {
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = db_get_prepare_stmt($db, $sql, [$email]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) > 0;
}
 
function handleAddUser($db) : array{
    $errors = [];
    $fields = ['email' => '', 'password' => '', 'name' => ''];

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ['errors' => $errors, 'fields' => $fields];
    }

    $fields['email'] = $_POST['email'] ?? '';
    $fields['password'] = $_POST['password'] ?? '';
    $fields['name'] = $_POST['name'] ?? '';

    if(empty($fields['email'])){
        $errors['email'] = "Email не может быть пустым";
    } elseif (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Введите корректный email";
    } elseif (isEmailTaken($db, $fields['email'])) {
        $errors['email'] = "Этот email уже зарегистрирован";
    }

    if(empty($fields['password'])){
        $errors['password'] = "Пароль не может быть пустым";
    } 
    //elseif (strlen($fields['password']) < 6) {
    //     $errors['password'] = "Пароль должен быть не менее 6 символов";
    // }
    if(empty($fields['name'])){
        $errors['name'] = "Имя не может быть пустым";
    }

    $errors = array_filter($errors);
    if(empty($errors)){
        addUser($db, $fields);
        header("Location: auth.php");
        exit();
    }

    return ['errors' => $errors, 'fields' => $fields];
}
?>