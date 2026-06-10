<section class="content__side">
    <p class="content__side-info">Если у вас ещё нет аккаунта, зарегистрируйтесь</p>
    <a class="button button--transparent content__side-button" href="register.php">Зарегистрироваться</a>
</section>

<main class="content__main">
    <h2 class="content__main-heading">Вход на сайт</h2>

    <form class="form" action="auth.php" method="post" autocomplete="off">

        <div class="form__row">
            <label class="form__label" for="email">E-mail <sup>*</sup></label>
            <input class="form__input <?php if (isset($errors['email'])) echo 'form__input--error'; ?>"
                   type="text" name="email" id="email"
                   value="<?php echo htmlspecialchars($fields['email'] ?? ''); ?>"
                   placeholder="Введите e-mail">
            <?php if (isset($errors['email'])): ?>
                <p class="form__message"><?php echo $errors['email']; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__row">
            <label class="form__label" for="password">Пароль <sup>*</sup></label>
            <input class="form__input <?php if (isset($errors['password'])) echo 'form__input--error'; ?>"
                   type="password" name="password" id="password"
                   placeholder="Введите пароль">
            <?php if (isset($errors['password'])): ?>
                <p class="form__message"><?php echo $errors['password']; ?></p>
            <?php endif; ?>
        </div>

        <?php if (isset($errors['auth'])): ?>
            <div class="form__row">
                <p class="error-message"><?php echo $errors['auth']; ?></p>
            </div>
        <?php endif; ?>

        <div class="form__row form__row--controls">
            <?php if (!empty($errors)): ?>
                <p class="error-message">Пожалуйста, исправьте ошибки в форме</p>
            <?php endif; ?>
            <input class="button" type="submit" name="" value="Войти">
        </div>
    </form>
</main>