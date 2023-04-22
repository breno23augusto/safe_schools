docker-bash:
	- docker exec -it back_php_1 /bin/sh

docker-up:
	- docker-compose up -d --build