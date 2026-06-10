<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php foreach ($projects as $project) : ?>
                <li class="main-navigation__list-item <?php if ($current_project_id == $project['id']) echo 'main-navigation__list-item--active'; ?>">
                    <a class="main-navigation__list-item-link" href="index.php?project_id=<?php echo $project['id']; ?>">
                        <?php echo htmlspecialchars($project['name']); ?>
                    </a>
                    <span class="main-navigation__list-item-count">
                        <?php echo countTasksSpecifications($all_tasks, $project['id']); ?>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button" href="project-add.php">
        Добавить проект
    </a>
</section>

<main class="content__main">
    <h2 class="content__main-heading">Добавление проекта</h2>

    <form class="form" action="project.php" method="post" autocomplete="off">
        <div class="form__row">
            <label class="form__label" for="project-name">Название <sup>*</sup></label>

            <input
                class="form__input <?php if (isset($errors['name'])) echo 'form__input--error'; ?>"
                type="text"
                name="name"
                id="project-name"
                value="<?php echo htmlspecialchars($requered_fields['name'] ?? ''); ?>"
                placeholder="Введите название проекта">

            <?php if (isset($errors['name'])) : ?>
                <p class="form__message"><?php echo $errors['name']; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__row form__row--controls">
            <input class="button" type="submit" value="Добавить">
        </div>
    </form>
</main>