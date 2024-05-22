##################
# Variables
##################

DOCKER_COMPOSE = docker-compose
DOCKER_COMPOSE_PHP_FPM_EXEC = docker exec -it symfony-app-php-fpm
DOCKER_COMPOSE_PHP_CLI_EXEC = docker exec -it symfony-app-php-cli

##################
# Docker compose
##################

build:
	${DOCKER_COMPOSE} build

start:
	${DOCKER_COMPOSE} start

stop:
	${DOCKER_COMPOSE} stop

up:
	${DOCKER_COMPOSE} up -d --remove-orphans

down:
	${DOCKER_COMPOSE} down

restart: stop start
rebuild: down build up

dc_ps:
	${DOCKER_COMPOSE} ps

dc_logs:
	${DOCKER_COMPOSE} logs -f

dc_down:
	${DOCKER_COMPOSE} down -v --rmi=all --remove-orphans

dc_restart:
	make dc_stop dc_start


##################
# App
##################

app_bash:
	${DOCKER_COMPOSE_PHP_FPM_EXEC} bash
php: app_bash

cli_bash:
	${DOCKER_COMPOSE_PHP_CLI_EXEC} bash
cli: cli_bash

test:
	${DOCKER_COMPOSE} exec -u www-data php-fpm bin/phpunit
cache:
	${DOCKER_COMPOSE} exec -u www-data php-fpm bin/console cache:clear
	${DOCKER_COMPOSE} exec -u www-data php-fpm bin/console cache:clear --env=test

##################
# Database
##################

db_migrate:
	${DOCKER_COMPOSE} exec -u www-data php-fpm bin/console doctrine:migrations:migrate --no-interaction
migrate: db_migrate

db_diff:
	${DOCKER_COMPOSE} exec -u www-data php-fpm bin/console doctrine:migrations:diff --no-interaction
diff: db_diff

db_schema_validate:
	${DOCKER_COMPOSE} exec -u www-data php-fpm bin/console doctrine:schema:validate

db_migration_down:
	${DOCKER_COMPOSE} exec -u www-data php-fpm bin/console doctrine:migrations:execute "App\Shared\Infrastructure\Database\Migrations\Version********" --down --dry-run

db_drop:
	${DOCKER_COMPOSE} exec -u www-data php-fpm bin/console doctrine:schema:drop --force

##################
# Composer
##################
composer_install:
	${DOCKER_COMPOSE} exec -u www-data php-cli composer install

##################
# NPM Install
##################
npm_install:
	${DOCKER_COMPOSE} exec -u www-data php-cli npm install
