# Settings
DOCKER_FOLDER = .
DOCKER_COMPOSE_FILE = $(DOCKER_FOLDER)/docker-compose.yml

docker-compose-relative := docker compose --project-directory $(DOCKER_FOLDER) -f $(DOCKER_COMPOSE_FILE)

args = $(foreach a,$($(subst -,_,$1)_args),$(if $(value $a),$a="$($a)"))

# Show commands descriptions
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-38s\033[0m %s\n", $$1, $$2}'

####################################################################################################
# Commands for work with containers docker-compose (dc)
####################################################################################################
dc-up: ## Build and run containers with show console output from docker-compose.yml
	$(docker-compose-relative) up

dc-php: ## Enter to php contaier
	$(docker-compose-relative) exec --user=1000 php bash

####################################################################################################
# Commands for database
####################################################################################################
php-install: ## Install vendors
	$(docker-compose-relative) exec --user=1000 php composer install

####################################################################################################
# Commands for database
####################################################################################################
db-migration: ## Install migration
	$(docker-compose-relative) exec -T database mysql -uexample_app_user -p123456 example_app < data.sql
	$(docker-compose-relative) exec -T database_replica mysql -uexample_app_user -p123456 example_app < data.sql

####################################################################################################
# Tests
####################################################################################################
test-run: ## Run unit tests
	$(docker-compose-relative) exec -T database mysqldump -d -uexample_app_user -p123456 example_app > dump.sql
	$(docker-compose-relative) exec -T database mysql -uexample_app_user -p123456 example_app_test < dump.sql
	$(docker-compose-relative) exec -u1000 php ./vendor/bin/phpunit
