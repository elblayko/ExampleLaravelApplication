This project is a simple demonstration of a blog-type application written using the Laravel framework.

## Overview

The project demonstrates creating, reading, updating, and deleting database objects, as well as user authentication.

## Requirements

- PHP 7.1 or higher
- Composer
- Node
- Nginx or Apache
- A supported database engine:
- MySQL
--  SQLite
-- PostgreSQL
-- Microsoft SQL Server

## Installation

- Install the Laravel framework and dependencies with `composer install`.
- Install node dependencies with `npm install`.
- Create the environment configuration file with `cp .env.example .env` and edit it to your needs.
- Create the application key with `php artisan key:generate`.
- Run database migrations with `php artisan migrate`.

In a development environment, install the root CA certficate that is generated into your browser for HTTPS to work correctly.