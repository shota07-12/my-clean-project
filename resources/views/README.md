# お問い合わせフォーム

## 環境構築

### Dockerビルド


### Dockerビルド

1. git clone https://github.com/shota07-12/my-clean-project.git
2. docker-compose up -d --build

Laravel初期構築
bash
コピーする
編集する
1. docker-compose exec php bash
2. composer install
3. cp .env.example .env （.envをコピーして編集）
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed
使用技術
PHP 8.0

Laravel 10.x

MySQL 8.0

URL
アプリ: http://localhost/

phpMyAdmin: http://localhost:8080/