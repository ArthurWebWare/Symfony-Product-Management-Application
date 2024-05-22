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
- git clone git@github.com:ArthurWebWare/Symfony-Product-Management-Application.git
- rename .env-example to .env in root directory and app directory
- docker-compose build
- docker-compose up -d
- Install dependencies - use Makefile
```bash
  make composer_install
```
- Install npm dependencies
```bash
  make npm_install
```
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

---

# Symfony Docker Makefile Documentation

## Variables

```makefile
DOCKER_COMPOSE = docker-compose
DOCKER_COMPOSE_PHP_FPM_EXEC = docker exec -it symfony-app-php-fpm
DOCKER_COMPOSE_PHP_CLI_EXEC = docker exec -it symfony-app-php-cli
```

These variables are defined to simplify the use of Docker Compose and Docker Exec commands throughout the Makefile.

## Docker Compose Commands

### Build the Docker images

```sh
make build
```

This command builds the Docker images specified in your `docker-compose.yml` file.

### Start the Docker containers

```sh
make start
```

This command starts the Docker containers as defined in your `docker-compose.yml` file.

### Stop the Docker containers

```sh
make stop
```

This command stops the running Docker containers without removing them.

### Bring up the Docker containers

```sh
make up
```

This command brings up the Docker containers in detached mode, ensuring any orphaned containers are removed.

### Take down the Docker containers

```sh
make down
```

This command stops and removes the Docker containers, networks, volumes, and images created by `up`.

### Restart the Docker containers

```sh
make restart
```

This command stops and then starts the Docker containers.

### Rebuild the Docker images and containers

```sh
make rebuild
```

This command takes down the Docker containers, rebuilds the images, and then brings the containers back up.

### Display the status of Docker containers

```sh
make dc_ps
```

This command shows the status of all Docker containers.

### Display the logs of Docker containers

```sh
make dc_logs
```

This command tails the logs of all Docker containers.

### Take down and clean Docker containers

```sh
make dc_down
```

This command stops and removes the Docker containers, volumes, images, and orphaned containers.

### Restart Docker containers

```sh
make dc_restart
```

This command stops and starts the Docker containers by invoking the `dc_stop` and `dc_start` commands.

## Application Commands

### Open a bash shell in the PHP-FPM container

```sh
make app_bash
make php
```

These commands open an interactive bash shell in the `symfony-app-php-fpm` container.

### Open a bash shell in the PHP-CLI container

```sh
make cli_bash
make cli
```

These commands open an interactive bash shell in the `symfony-app-php-cli` container.

### Run PHPUnit tests

```sh
make test
```

This command runs PHPUnit tests within the PHP-FPM container.

### Clear Symfony cache

```sh
make cache
```

This command clears the Symfony cache for both the default and test environments.

## Database Commands

### Run database migrations

```sh
make db_migrate
make migrate
```

These commands run the database migrations using Doctrine.

### Generate a migration by comparing your current database schema to your mapping information

```sh
make db_diff
make diff
```

These commands generate a migration file based on the differences between the current database schema and the mapping information.

### Validate the database schema

```sh
make db_schema_validate
```

This command validates the database schema.

### Rollback a specific migration

```sh
make db_migration_down
```

This command rolls back a specific migration. Replace `Version********` with the appropriate migration version.

### Drop the database schema

```sh
make db_drop
```

This command drops the database schema.

## Composer Commands

### Install Composer dependencies

```sh
make composer_install
```

This command installs the Composer dependencies within the PHP-CLI container.

## NPM Commands

### Install NPM dependencies

```sh
make npm_install
```

This command installs the NPM dependencies within the PHP-CLI container.

---
