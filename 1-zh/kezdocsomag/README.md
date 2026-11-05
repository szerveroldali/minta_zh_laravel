# UFO Watch Log — AWP Laravel pot (starter)

Practice exam starter package for the UFO Watch Log theme.

## Run

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
npm install && npm run build
php artisan serve
```

Open: http://127.0.0.1:8000

The starter `composer.json` uses the ELTE Packagist mirror at `webprogramozas.inf.elte.hu/downloads/composer`.

## Stack

- SQLite (`DB_CONNECTION=sqlite` in `.env.example`)
- Laravel Breeze (Blade) + Tailwind via Vite
- No PHP enums — `craft_type` is a plain string column

Tasks are marked with `Px-y` comments in the starter code. Fill in the checklist in [`../README.md`](../README.md).
