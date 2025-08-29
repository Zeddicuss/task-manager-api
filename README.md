# Laravel Task Manager API


Simple REST API for tasks with endpoints:
- POST /api/tasks
- GET /api/tasks
- PUT /api/tasks/{id}
- DELETE /api/tasks/{id}


## Setup


1. Clone
2. `composer install`
3. Copy `.env.example` -> `.env` and configure DB
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan serve`


## Test


`php artisan test`


## Example curl
