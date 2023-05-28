bash:
	- docker exec -it safe_schools_api /bin/sh

up:
	- docker-compose up -d

format:
	- docker exec -it safe_schools_api composer format
