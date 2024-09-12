# Project Setup

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#requirements">Requirements</a></li>
    <li><a href="#installation-steps">Installation Steps</a></li>
    <li><a href="#running-the-application">Running the Application</a></li>
    <li><a href="#master-config">Master Config</a></li>
    <li><a href="#telescope-eagle-eye">Telescope (Eagle Eye)</a></li>
    <li><a href="#jobs">Jobs</a></li>
    <li>
      <a href="#commands">Commands</a>
      <ul>
        <li><a href="#scheduled-commands">Scheduled Commands</a></li>
        <li><a href="#non-scheduled-commands">Non-Scheduled Commands</a></li>
      </ul>
    </li>
    <li><a href="#helpful-functions">Helpful Functions</a></li>
    <li><a href="#notes">Notes</a></li>
  </ol>
</details>

## Requirements
- **Laravel 11** requires **PHP ^8.2 || ^8.3**

<p align="right">(<a href="#project-setup">back to top</a>)</p>

## Installation Steps
1. Install dependencies:
   ```bash
   composer install
   ```
2. Copy the example environment file and set up your environment:
   ```bash
   cp .env.example .env
   ```
3. Set up **environment variables**.
4. Generate an application key:
   ```bash
   php artisan key:generate
   ```
5. Create a symbolic link to storage:
   ```bash
   php artisan storage:link
   ```
6. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```
7. Install Telescope assets:
   ```bash
   php artisan telescope:install
   ```

<p align="right">(<a href="#project-setup">back to top</a>)</p>

## Running the Application
1. Serve the application:
   ```bash
   php artisan serve
   ```
2. Run the queue worker:
   ```bash
   php artisan queue:work --queue=default,telescope
   ```

<p align="right">(<a href="#project-setup">back to top</a>)</p>

## Master Config

The `tbl_master_config` records are cached automatically during migration. However, you can sync them manually using **Tinker**:

```php
CacheForeverHelper::syncMasterConfig();
```

> **Note:** If you do not perform this sync, you **won't be able to log in**.

<p align="right">(<a href="#project-setup">back to top</a>)</p>

## Telescope (Eagle Eye)
- Access Telescope at: `/debug/eagle-eye`
- Queue on `telescope`

<p align="right">(<a href="#project-setup">back to top</a>)</p>

## Jobs
- Currently, there are **no jobs** defined.

<p align="right">(<a href="#project-setup">back to top</a>)</p>

## Commands

### Scheduled Commands
- `telescope:prune` (runs daily)

<p align="right">(<a href="#project-setup">back to top</a>)</p>

### Non-Scheduled Commands
- Clear logs:
  ```bash
  php artisan logs:clear {date?}
  ```

<p align="right">(<a href="#project-setup">back to top</a>)</p>

## Helpful Functions

- **`logException`**: Use this in a `catch` block to log exceptions to the **exception** channel.
- **`sweetAlertException`**: Similar to `logException`, but also sets up a session for a SweetAlert popup message.
- **`sweetAlert`**: Sets up a session for a SweetAlert popup message. You can choose from statuses: _success_, _warning_, _error_, _info_.
- **`enkripSHA256` and `dekripSHA256`**: Used for encryption with **KEY** and **IV**, typically for secure communication with Portal SSO.
- **`enkrip` and `dekrip`**: Default encryption methods used for securing data in this application.
- **`php artisan ide-helper:models`**: Generates model helpers, which are especially useful when using **PhpStorm**.
- **`UploadFileService`**: Located in `app/Services`, this service handles file uploads. Example usage:
  ```php
  UploadFileService::create($request->file('image'), 'save/to/path');
  ```

<p align="right">(<a href="#project-setup">back to top</a>)</p>

## Notes

- When adding new **env vars**, ensure they are integrated with `config`, so use `config('configFile.configVar')` instead of `getenv()` or `env()`.
- Always use `try catch` for any process that might cause the app to break, and store **logs** in the `catch` block.
- Avoid using auto-reformatting tools on the entire codebase, as it may change code lines not authored by you and create messy commit changes.
- Document everything about jobs, schedules, and anything else that others won't know unless they ask.

<p align="right">(<a href="#project-setup">back to top</a>)</p>
