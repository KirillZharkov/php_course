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


                        <?php }?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button" href="project.php">Добавить проект</a>
            </section>
      <main class="content__main">
        <h2 class="content__main-heading">Добавление задачи</h2>

        <form class="form"  action="add.php" method="post" autocomplete="off" enctype="multipart/form-data">
          <div class="form__row">
            <label class="form__label" for="name">Название <sup>*</sup></label>

            <input class="form__input <?php
             if(isset($errors['title'])) { echo 'form__input--error'; } ?>" type="text" name="title" id="name" 
             value="<?php echo htmlspecialchars($requered_fields['title']) ?? ''?>" placeholder="Введите название">
             <?php
             if(isset($errors['title'])) { ?>
                <p class="form__message"><?php echo $errors['title']; ?></p>
            <?php } ?>
          </div>

          <div class="form__row">
            <label class="form__label" for="project">Проект <sup>*</sup></label>

            <select class="form__input form__input--select <?php
             if(isset($errors['project_id'])) { echo 'form__input--error'; } ?> " name="project_id" id="project">
              <option value="">Выберите проект</option>
              <?php foreach($projects as $project){?>
                <option value="<?php echo $project['id']; ?>" <?php if ($requered_fields['project_id'] == $project['id']) {echo 'selected';} ?>>
                    <?php echo $project["name"]; ?>
                </option>
              <?php } ?>
            </select>
            <?php
            if(isset($errors['project_id'])) { ?>
              <p class="form__message"><?php echo $errors['project_id']; ?></p>
            <?php } ?>
          </div>

          <div class="form__row">
            <label class="form__label" for="date">Дата выполнения</label>

            <input class="form__input form__input--date <?php
             if(isset($errors['deadline'])) { echo 'form__input--error'; } ?>" type="text" name="deadline" id="date" 
             value="<?php echo htmlspecialchars($requered_fields['deadline'] ?? '')?>" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
             <?php
             if(isset($errors['deadline'])) { ?>
                <p class="form__message"><?php echo $errors['deadline']; ?></p>
            <?php } ?>
          </div>

          <div class="form__row">
            <label class="form__label" for="file">Файл</label>

            <div class="form__input-file">
              <!--!!!! Потом добавить валид ацию загруженного файла -->
              <input class="visually-hidden " type="file" name="file" id="file" value="">

              <label class="button button--transparent" for="file">
                <span>Выберите файл</span>
              </label>
            </div>
          </div>

          <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Добавить">
          </div>
        </form>
      </main>
