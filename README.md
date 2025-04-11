Laravel Notes API

Это REST API на Laravel для управления заметками (ноутбуком). Проект создан как тестовое задание и демонстрирует навыки разработки API, работы с аутентификацией через Laravel Sanctum и написания автотестов.
Функциональность

    Создание, просмотр, обновление и удаление заметок через REST API.
    Аутентификация пользователей с использованием токенов (Laravel Sanctum).
    Валидация входящих данных.
    Юнит- и функциональные тесты для проверки эндпоинтов.

Технологии

    PHP 8.x — основной язык программирования.
    Laravel 10.x — фреймворк для создания API.
    Laravel Sanctum — аутентификация на основе токенов.
    MySQL/PostgreSQL — база данных для хранения заметок.
    PHPUnit — фреймворк для автотестов.
    Git — контроль версий.

Установка

    Склонируйте репозиторий:
    bash

git clone https://github.com/stilix1/notebook-api.git
Перейдите в директорию проекта:
bash
cd notebook-api
Установите зависимости:
bash
composer install
Скопируйте файл .env.example в .env и настройте подключение к базе данных:
bash
cp .env.example .env
Сгенерируйте ключ приложения:
bash
php artisan key:generate
Выполните миграции и заполните базу данных (если нужно):
bash
php artisan migrate
(Опционально) Зарегистрируйте пользователя через команду или эндпоинт:
bash
php artisan tinker
>>> User::create(['name' => 'Test', 'email' => 'test@example.com', 'password' => bcrypt('password')]);
Запустите локальный сервер:
bash

    php artisan serve
    API будет доступно по адресу: http://localhost:8000/api.

Эндпоинты
Метод	Эндпоинт	Описание	Аутентификация
POST	/api/login	Авторизация пользователя	Нет
POST	/api/notes	Создание заметки	Требуется
GET	/api/notes	Получение списка заметок	Требуется
GET	/api/notes/{id}	Получение заметки по ID	Требуется
PUT	/api/notes/{id}	Обновление заметки	Требуется
DELETE	/api/notes/{id}	Удаление заметки	Требуется
Пример запроса

Создание заметки:
bash
curl -X POST http://localhost:8000/api/notes \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{"title": "My Note", "content": "This is a test note"}'

Ответ:
json
{
  "id": 1,
  "title": "My Note",
  "content": "This is a test note",
  "created_at": "2025-04-11T12:00:00.000000Z"
}
Тестирование

Для запуска автотестов выполните:
bash
php artisan test

Тесты включают:

    Проверку создания заметки.
    Проверку получения списка заметок.
    Проверку доступа без аутентификации.

О проекте

Этот проект создан как тестовое задание для демонстрации навыков работы с Laravel. Он включает:

    Разработку REST API с аутентификацией через Sanctum.
    Валидацию данных с использованием классов Request.
    Написание юнит- и функциональных тестов.
    Структурированную работу с контроллерами и моделями.


