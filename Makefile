install:
	composer install

start:
	php -S 127.0.0.1:8080 -t Public/

lint:
	composer run-script phpcs