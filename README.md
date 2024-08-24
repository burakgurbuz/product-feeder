## Useful hints and instructions

- Start the docker env by running `docker compose up --detach`
- Install dependencies by running `docker compose exec app composer install`
- Run the application by running `docker compose exec app php index.php`
- Run the tests by running `docker compose exec app ./vendor/bin/phpunit --verbose tests`