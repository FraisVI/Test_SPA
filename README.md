# Favorites SPA

Тестовое задание: мини-сервис избранных товаров с Laravel API и Nuxt 3 frontend.

## Стек

- Backend: Laravel 12, PHP 8.2
- Frontend: Nuxt 3, Vue 3
- База данных: MySQL 8.4
- Web-сервер: Nginx
- Окружение: Docker Compose

## Запуск через Docker

Сборка и запуск контейнеров:

```powershell
docker-compose up -d --build
```

Подготовка базы данных:

```powershell
docker-compose exec backend php artisan migrate:fresh --seed
```

После запуска приложение будет доступно по адресам:

- Frontend: `http://localhost`
- API: `http://localhost/api`
- MySQL с хоста: `127.0.0.1:3307`
- MySQL внутри Docker: `mysql:3306`

## Тестовый пользователь

```text
email: test@example.com
password: password
```

## Доступ к MySQL

```text
database: test_spa
user: test_spa
password: test_spa
root password: root
```

## Полезные команды

Остановить контейнеры:

```powershell
docker-compose down
```

Посмотреть логи:

```powershell
docker-compose logs -f
```

Пересобрать frontend:

```powershell
docker-compose build frontend
docker-compose up -d frontend nginx
```
