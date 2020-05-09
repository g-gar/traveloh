# traveloh

## Requirements

* Python > 3.0.0
* Python `virtualenv` module
* nodejs & npm
* PHP fileinfo and pdo_sqlite extensions enabled
* composer
* laravel requirements [info](https://laravel.com/docs/7.x#server-requirements)

## Installation & configuration

### Backend

```cmd
cd backend/python
python -m venv .
python -m pip install -r requirements.txt

source bin/activate (on Unix)
Scripts\activate (on Windows)
```

---

Laravel installation

```cmd
cd backend/laravel
# Create an empty file at database/database.sqlite
composer install
composer dump-autoload
# Seed tables with php artisan migrate_refresh --seed
php artisan migrate:refresh
php artisan apidoc:generate
```

--- 

Start the server by running `php backend/laravel/artisan serve`

It runs by default on [http://localhost:8000/](http://localhost:8000/) and there is a documentation of the available API routes under [http://localhots:8000/docs/](http://localhots:8000/docs/)

### Frontend

```cmd
cd frontend
npm install
ng serve --open
```
