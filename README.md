# Laravel Admin Portal Setup Guide

Follow these steps to set up the Laravel Admin Portal:

1. **Clone the repository**:
   - Use the following command to clone the repository to your local machine:
     ```
     git clone <repository-url>
     ```

2. **Install dependencies**:
   - Navigate to the project directory and run the following command to install the necessary dependencies:
     ```
     composer install
     ```

3. **Run database migrations**:
   - Run the migrations to create the necessary tables in your database:
     ```
     php artisan migrate
     ```

4. **Seed the database**:
   - Seed the database with sample data:
     ```
     php artisan db:seed
     ```

5. **Serve the application**:
   - Start the Laravel development server:
     ```
     php artisan serve
     ```

6. **Access the login page**:
   - Open your browser and go to:
     ```
     http://localhost:8000/login
     ```

7. **Login Credentials**:
   - Username: `admin`
   - Password: `password123`
