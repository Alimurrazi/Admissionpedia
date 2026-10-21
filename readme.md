# Admissionpedia

Admissionpedia helps HSC students in Bangladesh find out which universities, units and departments they can apply to. Enter your HSC details and grades, and the app shows where you meet the admission requirements and where you don't, with the reason.

> **Note:** The admission data is based on the **2016 university prospectuses**, so it is only accurate for students who passed HSC in 2015 or 2016.

## Table of contents

- [Credits](#credits)
- [Features](#features)
- [How it works](#how-it-works)
- [Eligibility rules](#eligibility-rules)
- [Tech stack](#tech-stack)
- [Getting started](#getting-started)
- [Database](#database)
- [Admin panel](#admin-panel)
- [Routes](#routes)
- [Project structure](#project-structure)
- [Known limitations](#known-limitations)
- [Contributing](#contributing)
- [License](#license)

## Credits

The original project was built by senior students of the SUST CSE '11 batch. I modified it and added some features.

## Features

- **Eligibility check** for the Science, Commerce and Humanities groups
- **Grade-based matching:** uses SSC and HSC GPA (with and without the 4th/optional subject) and HSC grades in individual subjects
- **Step-by-step browsing:** eligible universities → their units → their departments
- **Explanations:** for each university or unit you don't qualify for, the app lists the requirements you need to meet
- **Engineering universities:** dedicated rules for BUET, CUET, KUET, RUET and BUTEX
- **Admin panel** (`/addpedia`) to add, edit and delete universities, units and departments

## How it works

1. **Student details** (`/home`): enter your 6-digit HSC registration number, board, passing year, student type and group.
2. **Grades** (`/entryScience`, `/entryCommerce` or `/entryHumanities`): enter your HSC subject grades (A+, A, A-, B, C, D) and your SSC and HSC GPA, with and without the optional subject.
3. **Universities:** the app compares your results with each unit's requirements and lists:
   - the universities where at least one unit accepts you
   - the universities where you don't qualify, with a link to their requirements
4. **Units and departments:** pick a university to see its units, then pick a unit to see the departments open to you, including subject-specific requirements.

Letter grades are converted to grade points like this:

| Grade | A+ | A | A- | B | C | D | F |
|---|---|---|---|---|---|---|---|
| Points | 5.00 | 4.00 | 3.50 | 3.00 | 2.00 | 1.00 | 0 |

## Eligibility rules

### General universities

A unit is open to you if your passing year is allowed for that university and you meet all of the unit's minimum requirements:

- SSC GPA, HSC GPA and SSC + HSC total, **with** the optional subject
- SSC GPA, HSC GPA and SSC + HSC total, **without** the optional subject

### Engineering universities (Science group)

These have extra subject rules on top of the unit requirements:

| University | Extra requirement |
|---|---|
| **BUET** | Bangla + English + Physics + Chemistry + Mathematics ≥ 24 |
| **CUET** | Average of SSC and HSC GPA ≥ 4.0, and English + Physics + Chemistry + Mathematics ≥ 19 |
| **RUET** | Mathematics, Physics and Chemistry each ≥ 4.0, English ≥ 3.5, and the four together ≥ 18.5 |
| **KUET**, **BUTEX** | English + Physics + Chemistry + Mathematics ≥ 19 |

## Tech stack

- PHP with [Laravel 4.2](https://laravel.com/docs/4.2)
- MySQL
- Blade templates and Bootstrap

## Getting started

### Requirements

- PHP 5.4–5.6 (Laravel 4.2 does not run on PHP 7+)
- [Composer](https://getcomposer.org/)
- MySQL

### Installation

```bash
git clone https://github.com/Alimurrazi/Admissionpedia.git
cd Admissionpedia
composer install
```

1. Create a MySQL database named `project1s`, or change the name in `app/config/database.php`.
2. Set your database username and password in `app/config/database.php`.
3. Create the tables listed under [Database](#database) and load the admission data. The schema and data are not included in this repository.
4. Start the development server:

```bash
php artisan serve
```

Then open http://localhost:8000.

## Database

The app expects these MySQL tables:

| Table | What it holds |
|---|---|
| `universities` | Universities, with `univ_id`, `univ_code`, `univ_name` and `year_allowed` (earliest HSC year allowed to apply) |
| `engineering_universities` | The same fields for BUET, CUET, KUET, RUET and BUTEX |
| `units` | Units per university and group (`group_id`: 1 = Science), with minimum SSC, HSC and total GPA, with and without the optional subject |
| `science_departments`, `commerce_departments`, `humanities_departments` | Departments per unit, with subject-specific requirements |
| `science_student`, `commerce_student`, `humanities_student` | The grades of the student currently being checked |
| `student_reg` | Student registration details |
| `donot_delete` | Helper table used to build the engineering queries. **Don't delete it.** |

## Admin panel

Go to `/addpedia` to manage the admission data:

- **Universities:** list, add, edit and delete
- **Units:** open a university (`/addpedia/{univ_code}`) to manage its units
- **Departments:** open a unit (`/addpedia/{univ_code}/{unit_name}`) to manage its departments

> The admin panel has no login. Don't expose it on a public server without adding authentication.

## Routes

| Method | URL | Purpose |
|---|---|---|
| GET | `/` | Landing page |
| GET, POST | `/home` | Student details form |
| GET | `/entryScience/{reg_no}/{year}` (also Commerce, Humanities) | Grade entry form |
| POST | `/entryS`, `/entryC`, `/entryH` | Check eligibility and show universities |
| GET | `/entry/{univ_id}/{group_id}` | Units of a university |
| GET | `/entry/science/{univ_id}/{unit_id}/{group_id}` (also commerce, humanities) | Departments of a unit |
| GET | `/entryrej/{univ_id}/{group_id}` | Units of a university you don't qualify for |
| GET | `/entryrej/{univ_id}/{unit_id}/{group_id}` | Requirements of a unit you don't qualify for |
| GET | `/addpedia/...` | Admin panel |

## Project structure

| Path | What it holds |
|---|---|
| `app/routes.php` | All routes |
| `app/controllers/PagesController.php` | Landing page and student details form |
| `app/controllers/ScienceController.php`, `CommerceController.php`, `HumanitiesController.php` | Eligibility logic for each group |
| `app/controllers/UnselectedController.php` | Requirements for universities and units you don't qualify for |
| `app/controllers/MyController.php`, `UnitController.php`, `DeptController.php` | Admin panel |
| `app/models/` | `University`, `Unit`, `Department` and `Student` models |
| `app/views/students/` | Student-facing pages |
| `app/views/addpedia/`, `units/`, `dept/` | Admin pages |
| `public/` | Entry point and assets (Bootstrap, images) |

## Known limitations

- **2016 data only:** requirements change every year, so results for other years will be wrong.
- **One user at a time:** the current student's grades are stored in a single database row, so simultaneous users overwrite each other.
- **No admin login:** see [Admin panel](#admin-panel).
- **Old framework:** Laravel 4.2 and PHP 5 are no longer supported.

## Contributing

Issues and pull requests are welcome. If you update the admission data for a newer year, please say which prospectus it comes from.

## License

This project is built on the Laravel framework, which is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
