# RESTFul API with Laravel and MySQL

This project is a RESTFul API built with PHP using the Laravel framework and MySQL database. The API adheres to RESTful guidelines, incorporates elegant error handling and logging, and includes comprehensive unit tests. It is designed to be deployed effortlessly within a Docker container.

## Requirements

- **PHP 8.1 - 8.2**
- **Laravel Framework 10**
- **MySQL Database**
- **Docker**

## Installation
1. **Clone the Repository:**
   ```bash
   git clone https://github.com/your-username/your-repo.git
   cd your-repo
2. **Install Dependencies:**
   ```bash
   composer install
3. **Create Environment File:**
   ```bash
    cp .env.example .env
4. **Generate Application Key:**
   ```bash
   php artisan key:generate   
5. **Run Database Migrations:**
   ```bash
   php artisan migrate
6. **Start Docker Container:**
   ```bash
   docker-compose up -d
7. **Run Unit Tests:**
   ```bash
   php artisan test

## API Endpoints
**Customer**
1. **Get All Customers:**
   ```bash
   GET /customer
2. **Get Single Customer:**
   ```bash
   GET /customer/{id}
3. **Create Customer:**
   ```bash
   POST /customer
4. **Update Customer:**
   ```bash
   PATCH /customer/{id}
5. **Delete Customer:**
   ```bash
   DELETE /customer/{id}
**Address**
1. **Create Address:**
   ```bash
   POST /address
2. **Update Address:**
   ```bash
   PATCH /address/{id}
3. **Delete Address:**
   ```bash
   DELETE /address/{id}
## Request Validation
All API requests are validated to ensure data integrity and adherence to the specified requirements.
## Error Handling
The API provides elegant error handling to deliver meaningful error responses to clients.
## Running Tests
The project includes unit tests to validate the functionality of the API. Run tests using:
```bash
php artisan test 
```
## Docker Deployment
The API is designed to run in a Docker container for easy deployment and scalability.
To start the Docker container:

```bash
docker-compose up -d
```
Access the API at http://localhost.
