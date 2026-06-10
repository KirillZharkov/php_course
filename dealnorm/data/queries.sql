INSERT into users (name, email, password,created_at) 
VALUES ('Иван Иванов', 'ivan@example.com', 'password123', NOW());
INSERT into users (name, email, password,created_at) 
VALUES ('Петр Петров', 'petr@example.com', 'password456', NOW());

INSERT into projects (user_id, name) 
VALUES (1, 'Входящие'), (1, 'Учеба'), (1, 'Работа'), (1, 'Домашние дела'), (1, 'Авто');

INSERT into tasks (user_id, project_id, title, file, deadline, status) 
VALUES (1, 3, 'Собеседование в IT компании', null, '2026-06-04', false),
(1, 3, 'Выполнить тестовое задание', null, '2026-07-25', false),
(1, 2, 'Сделать задание первого раздела', null, '2026-07-21', true),
(1, 1, 'Встреча с другом', null, '2026-06-22', false),
(1, 4, 'Купить корм для кота', null, null, false),
(1, 4, 'Заказать пиццу', null, null, false);

select * from projects where user_id = 1;
select * from tasks where project_id = 4;
update tasks set status = true where id = 1;
update tasks set title = 'Сделать задание второго раздела' where id = 3;