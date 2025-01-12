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


Note:

1. **Create the `.env` File**:  
   Copy the `.env.example` file to create a new `.env` file in the root directory. The `.env` file contains environment-specific settings for your application, and it is not committed to version control due to security reasons.

   To create the `.env` file, run the following command in your terminal:
   cp .env.example .env

2. Generate the Application Key:
    After creating the .env file, you need to generate the application key, which is used for encryption purposes. This can be done by running the following command:
    
    php artisan key:generate



