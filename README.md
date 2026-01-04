Clearit Technical Test – Local Setup Guide

This project is a technical exercise built with PHP, MySQL and Laravel, designed to demonstrate basic authentication, role-based access, ticket management, document handling, and notifications.

The goal of the project is to connect users and agents through a ticket process.

--------------------------------------------

Requirements:

PHP 8.2 or higher

Composer

MySQL

--------------------------------------------

Installation:

Clone the repository and enter the project folder:

git clone <repository-url>
cd Clearit_test


Install PHP dependencies using Composer:

composer install


Create the environment configuration file:

cp .env.example .env


Open the .env file and configure your database connection:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clearit_test_db
DB_USERNAME=root
DB_PASSWORD=


Generate the Laravel application key:

php artisan key:generate


Run database migrations and seeders:

php artisan migrate --seed

--------------------------------------------

Running the application:

Start the Laravel development server:

php artisan serve


Open your browser and navigate to:

http://127.0.0.1:8000

--------------------------------------------

Test Users:

After running the seeders, you can log in using the following credentials:

Agent:

Email: admin@clearit.test

Password: admin123

User:

Email: user@clearit.test

Password: user123

--------------------------------------------

Application Flow

User:

Logs into the system

Creates tickets

Views tickets when their status is set to in_progress

Uploads documentation related to tickets

Receives notifications when the ticket status changes

Agent:

Logs into the system

Views all submitted tickets

Updates ticket status (new, in_progress, completed)

Reviews user-submitted documentation

Receives notifications when a user uploads documentation

--------------------------------------------

Ticket Process:

User creates a ticket (status: new)

Agent reviews the ticket and sets status to in_progress

User uploads required documentation

Agent reviews documents and either:

Sets ticket back to in_progress if more work is needed

Marks ticket as completed

Notifications

The system uses Laravel Notifications (database channel).

Agents receive notifications when users upload documentation

Users receive notifications when ticket status changes

Notifications are displayed in the respective dashboards

--------------------------------------------

Technologies Used:

Laravel 12

PHP 8.3

MySQL

Blade Templates

Laravel Authentication

Laravel Notifications

MVC architecture

--------------------------------------------

Notes:

The project focuses on functionality rather than UI design.
The structure is intentionally simple to demonstrate backend logic, relationships, and flow within the limited time frame of the exercise.