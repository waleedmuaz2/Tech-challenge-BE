# Symfony Microservices Example

This project demonstrates how to create two Symfony microservices that communicate via a message bus.

## Services

1. **Users Service:**
    - Endpoint: `POST /users`
    - Stores user data in a database and dispatches an event.

2. **Notifications Service:**
    - Consumes events and logs user creation details.

## Setup

1. **Clone the repository:**
    ```sh
    git clone https://github.com/waleedmuaz2/Tech-challenge-BE.git
    cd symfony-microservices
    ```

2. **Build and start the services:**
    ```sh
    docker-compose up --build
    ```

3. **Create the database schema:**
    ```sh
    docker-compose exec users php bin/console doctrine:migrations:migrate
    ```

4. **Run tests:**
    ```sh
    docker-compose exec users php bin/phpunit
    docker-compose exec notifications php bin/phpunit
    ```

## Endpoints

- **Users Service:** `POST /users` - Create a user with `email`, `firstName`, and `lastName`.
## Messaging

- Uses Redis as the message broker.
- Configure the message broker in `.env` file.

## Authors

- Waleed Muaz
- waleedmuaz2@gmail.com
