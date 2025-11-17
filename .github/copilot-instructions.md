Purpose
-------
Give brief, repository-specific guidance so an AI coding assistant can be productive immediately.

High level
----------
- This is a Laravel application (composer.json: laravel/framework ^12.0) targeted at PHP ^8.2.
- Frontend is built with Vite + Tailwind + Alpine (see `package.json`, `vite.config.js`, `tailwind.config.js`).
- Key areas:
  - Backend: `app/Http/Controllers`, `app/Models`, `routes/web.php` (route groups, admin middleware).
  - Views: Blade templates under `resources/views` (common files: `navbar.blade.php`, `sidebar.blade.php`).
  - DB: migrations in `database/migrations`, seeders in `database/seeders`.
  - Public assets: `public/assets` and Vite-managed JS/CSS (see `resources/js`, `resources/css`).

How to run / developer workflows
-------------------------------
Commands shown assume Windows PowerShell (project root):
```powershell
composer install
copy .env.example .env; php artisan key:generate
npm install
# quick dev runner (runs server, queue workers, pail, and vite):
composer run-script dev
# or run frontend/dev separately:
npm run dev
# run tests:
composer test
# migrate & seed (destructive):
php artisan migrate:fresh --seed
php artisan serve
```

Project-specific conventions & patterns
-------------------------------------
- Admin routes are grouped under the `admin` prefix and protected by `admin.auth` middleware.
  Examples: `routes/web.php` defines Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(...).
- Controllers often expose paired public/admin methods (e.g. `index` and `adminIndex`, `show` and `adminShow`). Follow existing naming when adding CRUD endpoints.
- Route names follow prefixes (e.g. `events.index`, `materials.update`, `sermons.admin`); prefer route() helpers rather than hard-coded URLs.
- Models live in `app/Models` and typically use `$fillable` to declare mass-assignable fields—follow that pattern.
- Blade layout/components: reuse `navbar.blade.php` and `sidebar.blade.php` rather than creating duplicated markup.

Integration points and dependencies
----------------------------------
- Social login: `laravel/socialite` is installed and routes exist: `/auth/google` and callback. Be mindful when editing auth flows.
- Queue and background: project includes `php artisan queue:listen` and `laravel/pail` in the dev runner; background jobs may be used (check `app/Jobs` if present).
- Frontend assets: Vite/Tailwind build; modifying CSS/JS requires running `npm run dev` or `vite build` for production.

Files to inspect first for changes
---------------------------------
- `routes/web.php` — see how admin route groups and names are declared.
- `app/Http/Controllers/*` — follow controller method naming and request validation patterns.
- `resources/views/*` — find the Blade layout and partials (`navbar.blade.php`, `sidebar.blade.php`) to keep UI consistent.
- `database/migrations` & `database/seeders` — migrations naming and seeding approach.
- `composer.json` & `package.json` — scripts and required runtime versions.

Editing guidance for AI edits
---------------------------
- When adding routes, always use route name helpers and mirror existing group/middleware structure.
- If adding DB columns, add a migration file and update any related Model `$fillable`/casts.
- For UI changes, prefer editing existing Blade partials; create new components under `resources/views/components` when reusable.
- Run `composer test` after changes that affect PHP code, and `npm run dev` / `vite build` after frontend edits.

If something here is wrong or incomplete, tell me which file(s) you want me to read next.
