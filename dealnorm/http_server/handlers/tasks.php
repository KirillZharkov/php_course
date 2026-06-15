<?php
require_once("http_server/handlers/projects.php");

function addTask($db, array $task_data){
    $sql = "INSERT INTO tasks (user_id, project_id, title, file, deadline) VALUES (?, ?, ?, ?, ?)";
    $stmt = db_get_prepare_stmt($db, $sql, [
        $task_data['user_id'], 
        $task_data['project_id'],
        $task_data['title'], 
        $task_data['file'], 
        $task_data['deadline']]);
    mysqli_stmt_execute($stmt);
}

function getProjectTasks($db, $user_id, $project_id) {
    if($project_id !=null){
        $sql_tasks  = "SELECT * FROM tasks WHERE user_id = ? AND project_id = ?"; 
        $stmt_tasks  = db_get_prepare_stmt($db, $sql_tasks,[$user_id, $project_id]);
    }
    else{
        $sql_tasks  = "SELECT * FROM tasks WHERE user_id = ?"; 
        $stmt_tasks  = db_get_prepare_stmt($db, $sql_tasks,[$user_id]);
    }
    mysqli_stmt_execute($stmt_tasks);
    $res_tasks = mysqli_stmt_get_result($stmt_tasks);
    return mysqli_fetch_all($res_tasks,MYSQLI_ASSOC);
}

function toggleTaskStatus($db, int $task_id, int $user_id): void {
    $sql = "UPDATE tasks SET status = NOT status WHERE id = ? AND user_id = ?";
    $stmt = db_get_prepare_stmt($db, $sql, [$task_id, $user_id]);
    mysqli_stmt_execute($stmt);
}

function getFilteredTasks($db, int $user_id, ?int $project_id, string $filter = 'all'): array {
    $conditions = ["user_id = ?"];
    $params = [$user_id];

    if ($project_id) {
        $conditions[] = "project_id = ?";
        $params[] = $project_id;
    }

    switch ($filter) {
        case 'today':
            $conditions[] = "deadline = CURDATE()";
            break;
        case 'tomorrow':
            $conditions[] = "deadline = DATE_ADD(CURDATE(), INTERVAL 1 DAY)";
            break;
        case 'overdue':
            $conditions[] = "deadline < CURDATE() AND status = 0";
            break;
    }

    $sql = "SELECT * FROM tasks WHERE " . implode(" AND ", $conditions);
    $stmt = db_get_prepare_stmt($db, $sql, $params);
    mysqli_stmt_execute($stmt);
    return mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
}

function searchTasks($db, int $user_id, string $query): array {
    $sql = "SELECT * FROM tasks WHERE user_id = ? AND MATCH(title) AGAINST(? IN BOOLEAN MODE)";
    $stmt = db_get_prepare_stmt($db, $sql, [$user_id, $query . '*']);
    mysqli_stmt_execute($stmt);
    return mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
}

// $actual_user_id = 1;
// $current_project_id = null;
// $flag=null;

// $projects = getProject($db->getConnection(), $actual_user_id);

// if(isset($_GET['project_id'])){
//     $current_project_id = (int)$_GET['project_id'];
//     //для проверки существования проекта с таким id в списке проектов пользователя
//     foreach($projects as $project){
//         if($project['id'] == $current_project_id){
//             $flag = true;
//             break;
//         }
//     }
//     if(!$flag){
//         http_response_code(404);
//         die("Проект не найден");   
//     }
// }


?>