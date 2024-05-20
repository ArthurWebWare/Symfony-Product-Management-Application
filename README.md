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
- RabbitMQ dashboard http://localhost:15672/

## Screenshots
**Home page**
![image](https://github.com/ArthurWebWare/Symfony-Product-Management-Application/assets/48259679/05f8de44-441b-405f-ad2c-4b00427e3bf5)
**Category pages**
![image](https://github.com/ArthurWebWare/Symfony-Product-Management-Application/assets/48259679/7851f780-414d-4952-8d00-5df0d7d65f5b)
![image](https://github.com/ArthurWebWare/Symfony-Product-Management-Application/assets/48259679/2d9b86a9-8043-468b-b304-a715456c0974)
![image](https://github.com/ArthurWebWare/Symfony-Product-Management-Application/assets/48259679/794d0922-24a9-4886-8230-1d7b3a161afa)

**Product pages**
![image](https://github.com/ArthurWebWare/Symfony-Product-Management-Application/assets/48259679/31476e21-456c-4586-b413-f87bdb126b62)4
![image](https://github.com/ArthurWebWare/Symfony-Product-Management-Application/assets/48259679/8bc7e537-3005-4020-8cf6-6d270f3c80fa)
![image](https://github.com/ArthurWebWare/Symfony-Product-Management-Application/assets/48259679/93cef326-bf0a-4a82-baee-5de64d01f633)


**Search page**
![image](https://github.com/ArthurWebWare/Symfony-Product-Management-Application/assets/48259679/a894cec2-b39e-4488-816b-98fd098054b0)

  
