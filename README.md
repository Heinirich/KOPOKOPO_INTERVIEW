
# Transaction Management Backend

Backend app that allows the recording of financial transactions and viewing the transaction history.

## Introduction

This Laravel project follows the clean Service-Repository architecture pattern. This architecture separates concerns by organizing code into three layers: Service layer, Repository layer, and Controller layer.

- **Service Layer**: Contains business logic and coordinates operations between the controller and repository layers.
- **Repository Layer**: Handles data access and manipulation, providing an abstraction layer over the database.
- **Controller Layer**: Handles HTTP requests, interacts with the service layer, and returns appropriate responses.

This architecture promotes code reusability, maintainability, and testability by keeping concerns separated and dependencies inverted.

## Installation

1. Clone the repository:

   ```bash
   git clone <repository_url>
   ```

2. Navigate to the project directory:

   ```bash
   cd project-directory
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. Set up your environment file:

   ```bash
   cp .env.example .env
   ```

5. Generate application key:

   ```bash
   php artisan key:generate
   ```

6. Set up your database configuration in the `.env` file. By default, this project uses SQLite:

   ```dotenv
   DB_CONNECTION=sqlite
   ```

7. Migrate and seed the database:

   ```bash
   php artisan migrate --seed
   ```

## Usage

## API Endpoints

List all available API endpoints with brief descriptions.

- `GET /api/ping`: Check Server status.
- `GET /api/transactions`: Retrieve a list of transactions.
- `POST /api/transactions`: Create a new transaction.
- `GET /api/transactions/{transaction_id}`: Retrieve a single transaction by ID.
- `GET /api/accounts/{account_id}`: Retrieve a single transaction by Account ID.

## Testing

Tests were created and passed to ensure the correctness of the project's functionality.

Check test folder and run code below to check test cases

```bash
php artisan test
```

## Screenshots

Screenshots of your Laravel project can be found in the `screenshots` folder. [Click here to view the screenshots](screenshots).
