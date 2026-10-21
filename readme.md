# Admissionpedia

Admissionpedia helps HSC students in Bangladesh find out which universities, units and departments they can apply to. Enter your HSC result and group (Science, Commerce or Humanities), and the app shows where you meet the admission requirements and where you don't, with the reason.

> **Note:** The admission data is based on the **2016 university prospectuses**, so it is only accurate for students who passed HSC in 2015 or 2016.

## Credits

The original project was built by senior students of the SUST CSE '11 batch. I modified it and added some features.

## Features

- Check eligibility from your HSC result, for the Science, Commerce and Humanities groups
- Browse eligible universities, then their units and departments
- See why you are not eligible for a university, unit or department
- Admin pages (`/addpedia`) for managing universities, units and departments

## Tech stack

- PHP with [Laravel 4.2](https://laravel.com/docs/4.2)
- MySQL
- Blade templates and Bootstrap

## Getting started

### Requirements

- PHP 5.4–5.6 (Laravel 4.2 does not run on PHP 7+)
- Composer
- MySQL

### Installation

```bash
git clone https://github.com/Alimurrazi/Admissionpedia.git
cd Admissionpedia
composer install
```

1. Create a MySQL database named `project1s`, or change the name in `app/config/database.php`.
2. Set your database username and password in `app/config/database.php`.
3. Load the university, unit and department data into the database. The data is not included in this repository.
4. Start the development server:

```bash
php artisan serve
```

Then open http://localhost:8000.

## Project structure

| Path | What it holds |
|---|---|
| `app/routes.php` | All routes |
| `app/controllers/` | Eligibility logic per group (`ScienceController`, `CommerceController`, `HumanitiesController`) and admin controllers |
| `app/models/` | `University`, `Unit`, `Department` and `Student` models |
| `app/views/` | Blade templates |
| `public/` | Entry point and assets (Bootstrap, images) |

## License

This project is built on the Laravel framework, which is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
