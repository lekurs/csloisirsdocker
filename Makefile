# Constants
DOCKER_COMPOSE = docker-compose
DOCKER = docker

## Environments
ENV_PHP = $(DOCKER) exec -it csloisirs_php_1

# Tools
COMPOSER = $(ENV_PHP) composer

# Main
build-no-cache: docker-compose.yml
	    $(DOCKER_COMPOSE) build --no-cache
	    $(DOCKER_COMPOSE) up -d --build --remove-orphans --force-recreate
	    make install-sf-project
	    make cache-clear

build: docker-compose.yml
	    $(DOCKER_COMPOSE) build
	    $(DOCKER_COMPOSE) up -d --build --remove-orphans --force-recreate
	    make install-sf-project
	    make cache-clear

start: docker-compose.yml
	    $(DOCKER_COMPOSE) up -d

stop:  docker-compose.yml
	    $(DOCKER_COMPOSE) stop

# Composer
install-project: composer.json
	    $(COMPOSER) req $(PACKAGE) -a -o

install-sf-project: composer.json
	    $(COMPOSER) req symfony/form -a -o
	    $(COMPOSER) require symfony/security -a -o
	    $(COMPOSER) req symfony/orm-pack -a -o
	    $(COMPOSER) req symfony/asset -a -o
	    $(COMPOSER) req symfony/validator doctrine/annotations -a -o
	    $(COMPOSER) req  symfony/filesystem -a -o
	    $(COMPOSER) req  symfony/http-foundation -a -o
	    $(COMPOSER) req  symfony/templating -a -o
	    $(COMPOSER) req  symfony/validator -a -o
	    $(COMPOSER) req ramsey/uuid-doctrine -a -o
	    $(COMPOSER) req  --dev symfony/profiler-pack -a -o
	    $(COMPOSER) req  --dev symfony/var-dumper -a -o


## Symfony commands
cache-clear: var/cache
	     $(ENV_PHP) rm -rf ./var/cache/*

check-db: bin/console
	     $(ENV_PHP) bin/console d:s:v

db-migrations: bin/console
	     $(ENV_PHP) bin/console d:m:diff
	     $(ENV_PHP) bin/console d:m:m