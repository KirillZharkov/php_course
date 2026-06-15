<?php
function getNotificationsTasks($db)
{
    $sql = "SELECT 
                u.id AS user_id,
                u.name AS user_name,
                u.email AS user_email,
                t.title AS task_title,
                t.deadline AS task_deadline
            FROM tasks t
            JOIN users u ON t.user_id = u.id
            WHERE t.status = 0
              AND t.deadline = CURDATE()
            ORDER BY u.id, t.deadline";

    $stmt = db_get_prepare_stmt($db, $sql, []);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function groupingTasksUser($notify){
$users_tasks = [];

foreach ($notify as $task) {
    $user_id = $task['user_id'];

    if (!isset($users_tasks[$user_id])) {
        $users_tasks[$user_id] = [
            'name' => $task['user_name'],
            'email' => $task['user_email'],
            'tasks' => []
        ];
    }

    $users_tasks[$user_id]['tasks'][] = [
        'title' => $task['task_title'],
        'deadline' => $task['task_deadline']
    ];
}
return $users_tasks;
}

?>