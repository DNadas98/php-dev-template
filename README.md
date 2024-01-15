# php-dev-template

### The development environment

This template sets up a basic developer environment with Apache, MySQL, PHP 8, Composer, PDO using Docker Compose to simplify development.
It eliminates the need to configure Composer, Apache and PHP locally, and to run a database server locally. 
The setup is intended for learning basic PHP, not for production.  
Docker volumes are added for the src and public folders of the project, and the Composer setup to update the project files dynamically.

### Database setup

- MySQL database name and credentials are set in the `.env` file
- The database is set up by the `init.sql` in the mysql folder
- The MySQL port is also exposed, to allow direct connection with IDE and database manager tools

### Example PHP code

- Example PDO database connection, model entity and CRUD repository in the src/Model directory
- Basic index.php to test these in the public directory

### Setup & Run

- Copy `env.txt` and rename to `.env`, modify values (all required)
- Modify project name, author, autoloader settings and other project details in the `composer.json`
- Modify `init.sql` in the mysql folder to change the database layout
- Optional, if Composer is installed locally
  - Run `composer install` in the root folder
  - Uncomment the volumes for `composer.lock` and `vendor` folders
- Run the Docker Compose file

### Commands in the container
- To access the Apache, PHP container:
  - `docker ps` to view containers, look for the Apache one
  - `docker exec -it <container ID> bash` to open a shell, in this setup I'd recommend to keep it open
  - The project root is the `/var/www` folder
- Run `composer install` to install new dependencies
- Run `composer dump-autoload` if there are changes in namespaces