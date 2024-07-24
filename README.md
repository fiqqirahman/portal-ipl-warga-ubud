# Repositori for Laravel Apps

Repository for Laravel Apps, written in PHP with Framework Laravel Version `11.x`.

## Commands
`php artisan pengajuan-kredit:seed` 
for seed dummy data Pengajuan Kredit **default 1000 data**, you can pass how many data you want, example : `php artisan pengajuan-kredit:seed 100`

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Database Migration

Migrations are like version control for your database, allowing your team to define and share the application's database schema definition. If you have ever had to tell a teammate to manually add a column to their local database schema after pulling in your changes from source control, you've faced the problem that database migrations solve.

The Laravel `Schema` `facade` provides database agnostic support for creating and manipulating tables across all of Laravel's supported database systems. Typically, migrations will use this facade to create and modify database tables and columns.

If you need to alter the database on your development:

1. Create migration file: `php artisan make:migration {description}`.
   1. Example : `php artisan make:migration create_flights_table`
   2. Write your up and down queries in the generated files accordingly.
   3. See migration file samples in `app/database/migrations`.
2. To verify your migration queries:
   1. Execute `php artisan migrate` and verify the result in the database.
   2. This will also update the row in _migration table_ (table name is in .env).
   3. Do not forget to drop your changes to go back to previous database state: `php artisan migrate:rollback`

Reference: laravel-migrate: https://laravel.com/docs/8.x/migrations

## How to run locally

This repo requires PHP >= 8.3

### Step To Run

1. Clone this repository to your local run `git clone http://10.100.111.95/noncore/laravel-apps-v3.git {project-name}`
   - Example : `git clone http://10.100.111.95/noncore/laravel-apps-v3.git portal-bansos`
2. Change remote url git : `git remote set-url origin {url_destination_git}`
   - Example : `git remote set-url origin https://github.com/USERNAME/REPOSITORY.git`
3. Edit your own config in `.env`, just copy `.env.example` and rename to `.env`.
4. Add file `secure.php` in `config`.
5. Run `composer install`.
6. Run `php artisan key:generate`.
7. Run `php artisan storage:link`.
8. Run `php artisan migrate:fresh --seed`.
9. Run `php artisan user-expired:generate`.
10. Run `php artisan serve`.
11. If you don't run the command `php artisan serve` anywhere, you can access `127.0.0.1:8000` to see application.

- When create new user or unblock user, the password default is the password that you set in `.env` (variable `DEFAULT_PASSWORD_USERS`)
- Login with:
- `username`: `FN42101120`
- `password`: password in `.env`

### Step To Push Gitlab

If you haven't written or changed anything from the last pull

1. Run `git pull`

If you have written or changed anything from the last pull

1. Run `git add .`
2. Run `git commit -m {description}`
   - Example `git commit -m "push fitur download"`
3. Run `git pull`
4. If there is a conflict in git
   1. Resolve conflict
   2. Run `git add .`
   3. Run `git commit -m {description}`
5. Run `git push -u origin {branch}`
   - Example `git push -u origin master`

### Step to Install ZIP Extension

    cd /www/server/php/80/src/ext/zip
    /www/server/php/80/bin/phpize
    ./configure --with-php-config=/www/server/php/80/bin/php-config
    make && make install
    extFile='/www/server/php/80/lib/php/extensions/no-debug-non-zts-20200930/zip.so'
    echo -e "extension = " ${extFile} >> /www/server/php/80/etc/php.ini
    echo -e "extension = " ${extFile} >> /www/server/php/80/etc/php-cli.ini

Restart PHP   

### Step to Install libzip

*Hanya diperlukan jika belum ketika instal ekstensi php zip gagal
1. Server AlmaLinux 9 
   - Download Binary dari https://pkgs.org/search/?q=libzip tsb (libzip-1.7.3-7.el9.x86_64.rpm, libzip-devel-1.7.3-7.el9.x86_64.rpm, libzip-tools-1.7.3-7.el9.x86_64.rpm)
   - `yum install ./libzip-1.7.3-7.el9.x86_64.rpm`
   - `yum install ./libzip-devel-1.7.3-7.el9.x86_64.rpm`
   - `yum install ./libzip-tools-1.7.3-7.el9.x86_64.rpm`
2. Server Centos 7
   - TO DO
