.PHONY: start vendor migrate rollback seed build stop env

SERVICE_NAME=laravel
SAIL = ./vendor/bin/sail

env:
	cp .env.example .env

vendor:
	docker compose run --rm $(SERVICE_NAME) composer install --no-interaction --prefer-dist --no-progress

build:
	$(SAIL) build

stop:
	$(SAIL) down

start:
	$(SAIL) up -d

migrate:
	$(SAIL) artisan migrate

rollback:
	$(SAIL) artisan migrate:rollback

seed:
	$(SAIL) artisan db:seed

reload: rollback migrate seed

quickstart: env vendor build start migrate seed
