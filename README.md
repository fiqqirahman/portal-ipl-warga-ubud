**Setup**

Laravel 11 Requires PHP ^8.2 || ^8.3

- composer install
- copy `.env.examnple` to `.env.{development|production}`
- setup **environment variables**
- php artisan key:generate
- php artisan storage:link
- php artisan migrate --seed

**Running Application**
- php artisan serve
- php artisan queue:work --queue=default,telescope

**Master Config**

This used to caching records `tbl_master_config` _(auto caching when you run migration)_, however you can sync manually with _tinker_ then run `CacheForeverHelper::syncMasterConfig()`
**if you not do this, you won't be able to Login** 

**Telescope (Eagle Eye)**
- /debug/eagle-eye
- Queue on `telescope`

**Jobs**

- currently no jobs

**Commands**

_Schedule_
- telescope:prune (daily)

_Non Schedule_
- php artisan logs:clear {date?}

**Helpful Functions**

- `logException` when you have try catch, better to use that function on catch for logging to channel _exception_
- `sweetAlertException` same as `logException` but also setup session for SweetAlert popup message
- `sweetAlert` only setup session for SweetAlert popup message, you can choose _success | warning | error | info_ for status
- `enkripSHA256` and `dekripSHA256` for encryption with **KEY** and **IV**, commonly to secure communication with Portal SSO
- `enkrip` and `dekrip` is default encryption for secure data in this application
- `php artisan ide-helper:models` for generate model helpers, its very help you especially when you use **PhpStrom** :)

**NOTES AND DON'T FORGET TO DO IT**

- When you add new **env vars**, don't forget to make it integrate with `config`, so call `config('configFile.configVar')` instead `getenv()` or `env()`
- Always use `try catch` to anything process that possible to make this app **Broke** and store **Logging** in `catch` arguments
- Don't use Auto Reformat Code in whole files, because it will make changes to code line whose not wrote by you, and also make commit changes messy
- Always documented anything about jobs, schedule and any which other peoples won't be known if they are not asked first