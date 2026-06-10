<?php
// function addTask($db, array $task_data){
//     $sql = "INSERT INTO tasks (user_id, project_id, title, file, deadline) VALUES (?, ?, ?, ?, ?)";
//     $stmt = db_get_prepare_stmt($db, $sql, [
//         $task_data['user_id'], 
//         $task_data['project_id'],
//         $task_data['title'], 
//         $task_data['file'], 
//         $task_data['deadline']]);
//     mysqli_stmt_execute($stmt);
// }
function handleAddTask($db,array $projects){
    $actual_user_id = $_SESSION['user']['id'];
    $errors = [];
    $requered_fields = ['title'=>'', 'project_id'=>'', 'deadline'=>''];
    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $requered_fields['title'] = $_POST['title'] ?? '';
        $requered_fields['project_id'] =(int)$_POST['project_id'] ?? 0;   
        $requered_fields['deadline'] = $_POST['deadline'] ?? '';

        $errors['title'] = is_task_name_valid($requered_fields['title'], $errors);
        $errors['project_id'] = is_project_valid($requered_fields['project_id'], $projects);
        //$errors['deadline'] = is_date_valid($requered_fields['deadline']) ? false : "Введите дату в формате ГГГГ-ММ-ДД";
        if(!empty($requered_fields['deadline'])){
            if(is_date_valid($requered_fields['deadline'])===false){
                $errors['deadline'] = "Введите дату в формате ГГГГ-ММ-ДД";
            }elseif(strtotime($requered_fields['deadline']) < strtotime('today')){
                $errors['deadline'] = "Дата не может быть в прошлом";
            }
        }else{
            $errors['deadline'] = null;
        }
        $errors = array_filter($errors);// удаляем из массива все элементы, которые не являются ошибками (false или null)
        if(empty($errors)){
            if(!empty($_FILES['file']['name'])){
                $file_name = uniqid() . '_' .basename($_FILES['file']['name']);
                $file_path =  $_SERVER['DOCUMENT_ROOT'] . '/tat3/dealnorm/uploads/';
                $file_url = "uploads/" . $file_name;
                move_uploaded_file($_FILES['file']['tmp_name'],$file_path.$file_name);
            }
            addTask($db,[
                'user_id' => $actual_user_id,
                'project_id' => $requered_fields['project_id'],
                'title' => $requered_fields['title'],
                'file' => $file_url ?? null,
                'deadline' => !empty($requered_fields['deadline']) ? $requered_fields['deadline'] : null
                //'deadline' => $requered_fields['deadline'] ?? null    
            ]);
            header("Location: index.php");
            exit();
        }
    }
    return ['errors' => $errors, 'requered_fields' => $requered_fields];
}
?>