## **Laravel School Management System** 

This **RESTful API** is developed for educational institution built on https://laravel.com/docs/7.x/installation

###### There are 3 types of user accounts. They include:
 
- Administrator (Admin)
- Teacher
- Student

**Requirements** 

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

Go into .env file and change Database and Email credentials.

```
php artisan migrate
```
Generating a New Passport Key
```
php artisan passport:install
```

#### **FUNCTIONS OF THE USERS** 

**-- Administrator (Admin)**

- Manage students And Teacher Attendance
- Create, Edit and manage Teachers and Students
- Create, Edit and manage Subjects
- Edit system settings

**-- TEACHER**
- Manage Own Class/Section
- Manage Exam Records for own Subjects
- Manage Timetable if Assigned as Class Teacher
- Manage own profile
- Upload Study Materials

**-- STUDENT**
- View teacher profile
- View own class subjects
- Manage own profile

### **Contributing**

Your Contributions & suggestions are welcomed.

### **Contact**
- Phone : +254727970853
- Email : kimutaibrian9@gmail.com



