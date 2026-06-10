<?php
function getProject($db, $user_id) {
    $sql_projects  = "SELECT * FROM projects WHERE user_id = ?"; 
    $stmt_projects  = db_get_prepare_stmt($db, $sql_projects,[$user_id]);
    mysqli_stmt_execute($stmt_projects);
    $res_projects = mysqli_stmt_get_result($stmt_projects);
    return mysqli_fetch_all($res_projects,MYSQLI_ASSOC);
}

function addProject($db, array $project_data)
{
    $sql = "INSERT INTO projects (user_id, name)
            VALUES (?, ?)";

    $stmt = db_get_prepare_stmt($db, $sql, [
        $project_data['user_id'],
        $project_data['name']
    ]);

    mysqli_stmt_execute($stmt);
}
?>