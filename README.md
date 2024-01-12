# php-dev-template

### The development environment

This template sets up a basic developer environment with Apache, MySQL, PHP 8, Composer, PDO using Docker Compose to simplify development.  
It is intended for learning basic PHP, not for production.  
Docker volumes are added for the src and public folders of the project, and the vendor folder of Composer to update the project files dynamically.

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
- Run `composer install`
- Run the Docker Compose file
- Run `composer dump-autoload` in the Apache container after any change in namespaces
  - `docker ps` to view containers, look for the Apache one
  - `docker exec -it <container ID> bash` to open a shell, in this setup I'd recommend to keep it open
  - Enter `composer dump-autoload` here when needed
  - This is not the most elegant solution, but it's better than having to rebuild the Docker Compose setup every time
