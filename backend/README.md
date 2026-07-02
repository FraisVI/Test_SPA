# Backend

Laravel API для тестового задания Favorites SPA.

## Docker

Backend запускается через корневой `docker-compose.yml`.

```powershell
docker-compose up -d --build
```

## Проверки

```powershell
docker-compose exec backend php artisan test
```
