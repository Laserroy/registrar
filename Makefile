include .env

install:
	composer install

db-setup: db-prepare db-migrations

db-prepare:
	mysql -u $(DB_USERNAME) -p -e "create database $(DB_DATABASE)"

db-migrations:
	mysql -u"$(DB_USERNAME)" -p $(DB_DATABASE) < database/protest14.sql
	mysql -u"$(DB_USERNAME)" -p $(DB_DATABASE) < database/users.sql

start:
	php -S 127.0.0.1:8080 -t public/

lint:
	composer run-script phpcs