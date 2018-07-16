up:
	docker-compose up -d

start:
	docker-compose start

stop:
	docker-compose stop

state:
	docker-compose ps

rebuild:
	docker-compose stop
	docker-compose pull
	docker-compose rm --force app
	docker-compose build --no-cache --pull
	docker-compose up -d --force-recreate
