# Turkey Challenge

```
Filament was chosen for this application due to its ability to quickly build robust and highly 
customizable admin panels in Laravel. With seamless Eloquent integration, it efficiently manages 
data, providing interactive forms and tables with filters, search functionality, and intuitive actions. 
This implementation allows for easy visualization, editing, and storage of turkeys in the database, along 
with image uploads and report generation. Filament not only optimizes development time but also 
offers a modern and user-friendly interface for managing information in a simple and scalable way.
```

## Run Locally

Clone the project

```bash
git@github.com:guerrerocing/turkey-challenge.git
```
Go to the project directory

```bash
cd turkey-challenge
```

⚠️ **Warning: Docker & Composer Required**  
This project requires **Docker** and **Composer** to be installed on your machine.  
Please ensure both are installed and running before proceeding with the setup.

You can download them here:
- **Docker**: [https://www.docker.com/get-started](https://www.docker.com/get-started)
- **Composer**: [https://getcomposer.org/download/](https://getcomposer.org/download/)


## Setting Up the Project with Docker

Before proceeding, ensure the following:

You do not have existing instances of PostgreSQL, PHP, or NGINX running on your machine. These could conflict with the Docker setup.

### Important Notes:
* The project contains all the necessary configurations for a smooth setup.
* The database and credentials required for the application are pre-configured in the .env.example file and the docker-compose.yml file.
* Once the Docker containers are up and running, the database will be automatically created and ready to use.


### Steps to Get Started:
- Copy the .env.example file to .env and adjust any specific settings if necessary

```bash
  cp .env.example .env
```

```bash
  composer install
```

Running Docker
```bash
  docker-compose up --build -d
```

Go to container
```bash
  docker compose exec app bash
```

## Install dependencies
Run the following commands inside the container to set up the application:

```bash

  php artisan key:generate

  php artisan migrate --seed
  
  php artisan storage:link
  

```
Now we can access our project in our browser
```
http://localhost:8000
```

Default Credentials
```bash
  email: test@example.com
  password: password

```
