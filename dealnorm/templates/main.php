
<section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                        <?php foreach($projects as $project){?>
                        <li class="main-navigation__list-item <?php if ($current_project_id == $project['id']) {echo 'main-navigation__list-item--active';}?>">
                            <a class="main-navigation__list-item-link" href="index.php?project_id=<?php echo $project['id']; ?>">
                                <?php echo $project["name"]; ?>
                            </a>
                            <span class="main-navigation__list-item-count"><?php echo countTasksSpecifications($all_tasks, $project['id']); ?></span>
                        </li>

                <!--  <li class="main-navigation__list-item main-navigation__list-item--active">
                            <a class="main-navigation__list-item-link" href="#">Работа</a>
                            <span class="main-navigation__list-item-count">12</span>
                        </li>

                        <li class="main-navigation__list-item">
                            <a class="main-navigation__list-item-link" href="#">Здоровье</a>
                            <span class="main-navigation__list-item-count">3</span>
                        </li>

                        <li class="main-navigation__list-item">
                            <a class="main-navigation__list-item-link" href="#">Домашние дела</a>
                            <span class="main-navigation__list-item-count">7</span>
                        </li>
                        
                        <li class="main-navigation__list-item">
                            <a class="main-navigation__list-item-link" href="#">Авто</a>
                            <span class="main-navigation__list-item-count">0</span>
                        </li> -->
                        <?php }?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button" href="project.php">Добавить проект</a>
            </section>

            <main class="content__main">
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <div class="radio-button-group">
                            <?php
                            $filters = [
                                'all'      => 'Все задачи',
                                'today'    => 'Повестка дня',
                                'tomorrow' => 'Завтра',
                                'overdue'  => 'Просроченные'
                            ];
                            foreach ($filters as $key => $label):
                                $active = ($filter === $key) ? 'radio-button--active' : '';
                                $url = 'index.php?' . http_build_query(array_merge($_GET, ['filter' => $key]));
                            ?>
                                <a class="radio-button <?php echo $active; ?>" href="<?php echo $url; ?>">
                                    <span class="radio-button__text"><?php echo $label; ?></span>
                                </a>
                            <?php endforeach; ?>

                            
                        <!-- <label class="radio-button">
                            <input class="radio-button__input visually-hidden" type="radio" name="radio" checked="">
                            <span class="radio-button__text">Все задачи</span>
                        </label>

                        <label class="radio-button">
                            <input class="radio-button__input visually-hidden" type="radio" name="radio">
                            <span class="radio-button__text">Повестка дня</span>
                        </label>

                        <label class="radio-button">
                            <input class="radio-button__input visually-hidden" type="radio" name="radio">
                            <span class="radio-button__text">Завтра</span>
                        </label>

                        <label class="radio-button">
                            <input class="radio-button__input visually-hidden" type="radio" name="radio">
                            <span class="radio-button__text">Просроченные</span>
                        </label> -->
                    </div>
                    <!-- показывать выполненные -->
                    <?php
                    $show_url = 'index.php?' . http_build_query(array_merge($_GET, ['show_complete' => 1]));
                    $hide_url = 'index.php?' . http_build_query(array_filter($_GET, fn($k) => $k !== 'show_complete', ARRAY_FILTER_USE_KEY));
                    ?>     
                    <label class="checkbox">
                        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input id="show-complete-tasks" class="checkbox__input visually-hidden" type="checkbox"
                        onchange="window.location='<?php echo $show_complete_tasks ? $hide_url : $show_url; ?>'"
                        <?php if ($show_complete_tasks) echo 'checked'; ?>>
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">

                    <!--показывать следующий тег <tr/>, если переменная равна единице-->
                    <?php 
                    // foreach($tasks as $task){
                    //     if ($task['status'] === 1 && $show_complete_tasks === 0) { continue;}
                    //     if ($task['deadline']){
                    //         $date_deadline = strtotime(str_replace('.', '-', $task['deadline']));
                    //         $current_ts = strtotime('now midnight');
                    //         $hours_until_deadline = ($date_deadline - $current_ts) / 3600;
                    //     }
                    foreach($tasks as $task):
                        if ($task['status'] == 1 && $show_complete_tasks === 0) continue;

                        $hours_until = null;
                        if ($task['deadline']) {
                            $deadline_ts = strtotime($task['deadline']);
                            $hours_until = ($deadline_ts - strtotime('today')) / 3600;
                        }
                    ?>
                    <tr class="tasks__item task 
                    <?php if ($task['status'] === 1) {echo 'task--completed';}?>
                    <?php if ($hours_until_deadline !== null && $hours_until_deadline <=24 && $hours_until_deadline >= 0){ 
                        echo ' task--important'; }?>">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <form action="toggle_task.php" method="post">
                                    <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                    <input class="checkbox__input visually-hidden" type="checkbox" <?php if ($task['status'] === 1) {
                                    echo 'checked';}?>onchange="this.form.submit()">
                                <!-- <span class="checkbox__text">Записаться на интенсив "Базовый PHP"</span> -->
                                    <span class="checkbox__text"><?php echo htmlspecialchars($task['title']);  ?></span>
                                </form>

                            </label>
                        </td>
                            <td class="task__file">
                            <?php if ($task['file']): ?>
                                <a class="download-link" href="<?php echo $task['file']; ?>">
                                    <?php echo basename($task['file']); ?>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td class="task__date"><?php echo $task['deadline'] ? date('d.m.Y', strtotime($task['deadline'])) : ''; ?>
                        </td>
                        <td class="task__controls">
                        </td>
                    </tr>
                    <?php endforeach;  ?>
                    <!-- <tr class="tasks__item task">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden" type="checkbox">
                                <span class="checkbox__text">Выполнить первое задание</span>
                            </label>
                        </td>

                        <td class="task__date">
                            <!--выведите здесь дату выполнения задачи-->
                        <!-- </td>

                        <td class="task__controls">
                            <button class="expand-control" type="button" name="button">Выполнить первое задание</button>

                            <ul class="expand-list hidden">
                                <li class="expand-list__item">
                                    <a href="#">Выполнить</a>
                                </li>

                                <li class="expand-list__item">
                                    <a href="#">Удалить</a>
                                </li>
                            </ul>
                        </td>
                    </tr> --> 
                </table>
            </main>
