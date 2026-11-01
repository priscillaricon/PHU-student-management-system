# Pearl Horizon University – Student Management System

## 1. Project Overview

The Pearl Horizon University (PHU) Student Management System is a web-based application developed using Laravel. It helps the university manage student information, courses, lecturer access and student course registrations.

The system provides different dashboards and permissions depending on the user's role.

## 2. Main System Features

- **Administrator:** Manages student records and course information.
- **Lecturer:** Views assigned courses and students registered for those courses.
- **Student:** Views available courses, registers for courses and manages personal course registrations.
- **Authentication:** Provides separate login access and role-based permissions.
- **Course Registration:** Allows students to register for available courses while preventing duplicate registrations.

## 3. Technologies Used

- PHP
- Laravel Framework
- SQLite Database
- HTML and CSS
- JavaScript
- Git and GitHub

## 4. Installation and Setup

### Requirements

- PHP
- Composer
- Node.js and npm
- Visual Studio Code or another code editor

### Step 1: Clone the Repository

```bash
git clone https://github.com/priscillaricon/PHU-student-management-system.git
```

Navigate into the project folder:

```bash
cd PHU-student-management-system
```

### Step 2: Install Dependencies

```bash
composer install
npm install
```

### Step 3: Configure the Environment

Create your environment file:

```bash
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### Step 4: Configure the Database

Configure SQLite in the `.env` file:

```env
DB_CONNECTION=sqlite
```

Create the SQLite database file if it does not exist:

```bash
New-Item database/database.sqlite -ItemType File
```

### Step 5: Run Migrations and Seeders

```bash
php artisan migrate --seed
```

### Step 6: Build Frontend Assets

```bash
npm run build
```

### Step 7: Start the Application

```bash
php artisan serve
```

Open the application in your browser:

```text
http://127.0.0.1:8000
```

## 5. User Roles and Permissions

| User Role | Main Responsibilities |
|---|---|
| Administrator | Manages students and courses and accesses administrative functions. |
| Lecturer | Views assigned courses and registered students. |
| Student | Views available courses and manages course registrations. |

## 6. Sample Login Credentials

Enter the actual sample accounts created by the project's database seeders below.

| Role | Email / Registration Number | Password |
|---|---|---|
| Administrator | [Insert seeded admin email] | [Insert seeded password] |
| Lecturer | [Insert seeded lecturer email] | [Insert seeded password] |
| Student | [Insert seeded student email or registration number] | [Insert seeded password] |

**Note:** Replace the placeholders with the actual working credentials before submission. Do not publish private passwords.

## 7. Database Structure

The system uses database relationships to connect students, courses and course registrations.

- A student can register for many courses.
- A course can have many registered students.
- Course registrations connect students and courses.
- Foreign keys maintain relationships between records.
- Duplicate course registrations are prevented.

## 8. GitHub Collaboration

The project was developed collaboratively using Git and GitHub.

Repository:

https://github.com/priscillaricon/PHU-student-management-system

The team used branches to organize development and pull requests to integrate contributions into the `develop` branch.

## 9. Project Screenshots

Insert screenshots showing the following working features:

1. Administrator dashboard.
2. Student management.
3. Course management.
4. Lecturer dashboard.
5. Student dashboard.
6. Student course registration.

## 10. Conclusion

The Pearl Horizon University Student Management System provides a centralized platform for managing student records, courses, lecturer access and student registrations. It uses Laravel authentication, role-based access control and database relationships to support university academic administration.