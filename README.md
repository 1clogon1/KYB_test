**Разворачивание проекта первого задания**

Запуск:
1. Скачать Docker.

2. Клонируем репозиторий:
	1) ssh - `git@github.com:1clogon1/KYB_test.git`;
	2) https - `https://github.com/1clogon1/KYB_test.git`;
	3) Скачать архив и распаковать его у себя.

3. Переходим в папку Laravel проекта в терминале(если не в ней находитесь): 
	cd .\kyb_1_test\

4. Подключение к базе данных:
  В папке config/db.php передаем следующие данные:
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=db;port=5432;dbname=kyb_1_test',
    'username' => 'user',
    'password' => 'password',
    'charset' => 'utf8',

5. Запускаем сборку и запуск контейнеров:          
  docker-compose up -d

6. Подключаемся к докеру:
  docker exec -it kyb_1_test-php bash

7. Выполняем миграции таблиц в бд:
  php yii migrate
А также если будет нужен доступ к бд, докачиваем:
apt-get update && apt-get install -y postgresql-client
