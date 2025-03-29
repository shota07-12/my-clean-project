# お問い合わせフォーム

## 環境構築

### Dockerビルド

```bash
git clone https://github.com/shota07-12/my-clean-project.git
cd my-clean-project
docker-compose up -d --build

### Laravel初期構築

```bash
1. docker-compose exec php bash
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

### 使用技術

PHP 8.0

Laravel 10.x

MySQL 8.0

Docker

Laravel Fortify

JavaScript

### URL
アプリ: http://localhost/

phpMyAdmin: http://localhost:8080/

### ER図
![ER図](./public/images/er-diagram.png)