# php-dev-template
This template sets up a basic developer environment with Apache, MySQL, PHP8, Composer, PDO using Docker Compose to simplify development.  
It is intended for learning basic PHP development, this is not for production.  
Docker volumes are added for the src and public folders of the project, and the vendor folder of Composer to update the project files dynamically.

- Example PDO database connection, model entity and CRUD repository are also included.

### Setup & Run
- Copy `env.txt` and rename to `.env`, modify values (all required)
- Modify project details in the `composer.json`
- Modify `init.sql` in the mysql folder to change the database layout
- Run `composer install`
- Run the Docker Compose file
- Run `composer dump-autoload` in the apache container after any change in namespaces
