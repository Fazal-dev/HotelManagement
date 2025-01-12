# Hotel Booking Management System

A basic hotel booking management system built with Laravel 11. This project includes user authentication, database migrations, controllers, models, and a frontend interface for managing hotels and rooms.

## Features

1. **Authentication:**

    - User login and registration for hotel admins.

2. **Database Management:**

    - Migrations for `Hotels` and `Rooms` tables with appropriate columns and relationships.

3. **CRUD Operations:**

    - Controllers and models for managing hotels and rooms.
    - Full CRUD functionality with validations and error handling.

4. **Frontend Pages:**

    - Hotel and Room management pages for listing, creating, updating, and deleting records.

5. **Room Booking:**
    - Book multiple rooms with quantity selection.
    - Logic to disable other rooms if the selected room's quantity matches the available stock.

## Technologies Used

-   **Laravel 11**: Backend framework.
-   **Frontend Frameworks**: Bootstrap.
-   **JavaScript**: Optional integration for UI enhancements.

## Getting Started

1. **Clone the repository**:
    ```bash
    git clone [repository-url]
    ```
2. **Install dependencies:**:

    ```bash
    composer install
    npm install
    ```

3. **Set up the environment:**

-   Configure .env file with database and other details.

4. **Run migration**:
    ```bash
    php artisan migrate
    ```
5. **Start the server:**:
    ```bash
    php artisan serve
    ```
6. **Access the application:**:

-   Visit http://localhost:8000 in your browser.

## License

-   This project is for educational purposes only.
