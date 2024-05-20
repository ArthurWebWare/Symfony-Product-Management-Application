# Symfony Product Management Application

## Overview

This project is a Symfony application developed using the Symfony 7 framework and integrated with the Bootstrap CSS framework. The application provides a comprehensive solution for managing product categories and products with full CRUD functionality. It also includes email notification capabilities using RabbitMQ for asynchronous processing.

## Features

- **Product Category Management**
    - Create, Read, Update, and Delete (CRUD) operations for product categories.
    - User-friendly interface for managing product categories.

- **Product Management**
    - Create, Read, Update, and Delete (CRUD) operations for products.
    - Products can be assigned to multiple categories.

- **Forms**
    - "Add Category" form for creating new product categories.
    - "Add Product" form for creating new products.

- **Email Notifications**
    - Configured to send email notifications when a new product is created.
    - Uses RabbitMQ for queue-based email sending to ensure efficient processing.

## Requirements

- PHP 8.x
- Symfony 7.x
- Bootstrap CSS
- RabbitMQ

## Installation
- Install Docker Compose
- git clone git@github.com:ArthurWebWare/optimum.git
- rename .env-example to .env in root directory and app directory
- docker-compose build
- docker-compose up -d
- docker exec -it symfony-app-php-cli bash
- Install composer dependences
- Install npm dependencies
- Run from browser http://localhost:8081/


  