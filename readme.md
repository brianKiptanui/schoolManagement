## **Laravel School Management System** 

This **RESTful API** is developed for educational institution  built on Laravel 7

There are 3 types of user accounts. They include:
 
Administrator (Admin)
- Teacher
- Student

## **Requirements** 

        Laravel 7 Requirements https://laravel.com/docs/7.x
        PHP >= 5.6.4
        MySQL >= 5.7


## Install

Clone repo

```
git clone https://github.com/brianKiptanui/schoolManagement
```

Install Composer


[Download Composer](https://getcomposer.org/download/)


composer update/install 

```
composer install
```
## How to setting 

Go into .env file and change Database credentials.

```
php artisan migrate
```
	
Generating a New Access Tokens
```
php artisan passport:install
```
## **FUNCTIONS** 

**-- Administrators (Super Admin & Admin)**

- Manage students and teachers Attendance
- Create, Edit and manage all user accounts & profiles
- Create, Edit and manage Teachers
- Create, Edit and manage Subjects
- Edit system settings



**-- TEACHER**
- Manage Own Class/Section
- Manage Records for own Subjects
- Manage own profile

**-- STUDENT**
- View teacher profile
- View own class subjects
- Manage own profile
- view subjects and lessons

### **Contributing**

Your Contributions & suggestions are welcomed.

### **Contact**
- Phone : +254727970853
- Email : kimutaibrian9@gmail.com
