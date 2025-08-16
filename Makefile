.PHONY: start vendor migrate rollback seed build stop

SERVICE_NAME=laravel

start:
	docker compose up -d

build:
	docker compose up -d --build

stop:
	docker compose down --remove-orphans

vendor:
	docker compose run --rm $(SERVICE_NAME) composer install --no-interaction --prefer-dist --no-progress

migrate:
	docker compose run --rm $(SERVICE_NAME) sail artisan migrate

rollback:
	docker compose run --rm $(SERVICE_NAME) sail artisan migrate:rollback

seed:
	docker compose run --rm $(SERVICE_NAME) sail artisan db:seed

reload: rollback migrate seed
