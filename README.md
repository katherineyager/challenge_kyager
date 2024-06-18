## FOOD TRUCK PROJECT
This project is a Laravel application designed to manage and search for food truck locations in San Francisco. It reads data from a CSV file, stores it in a database, and displays the information on a web page. Users can search for specific locations by the applicant's name and view details and a map of the location.

## Project Structure
/challenge_kyager
|-- /app
|   |-- /Http
|       |-- /Controllers
|           |-- LocationController.php
|   |-- /Models
|       |-- Location.php
|   |-- /Services
|       |-- CsvImportService.php
|-- /config
|   |-- services.php
|-- /database
|   |-- /migrations
|       |-- 2024_06_18_020833_create_locations_table.php
|-- /public
|   |-- /css
|       |-- styles.css
|-- /resources
|   |-- /views
|       |-- /location
|           |-- index.blade.php
|-- /routes
|   |-- web.php
|-- .env.example
|-- README.md
|-- DOCUMENTATION.md

## Project Structure
Routes: Defines routes for the application, including search.
Controllers: LocationController handles the main logic for displaying the main page, importing data, and searching locations.
Services: CsvImportService handles CSV import functionality into the database.
Models: Location represents the data model, defines the Location model and specifies the fillable fields.
Views: index.blade.php for the main interface. Defines the main user interface for searching and displaying location data.
Migrations: Defines the locations table structure.

## Prerequisites
PHP >= 7.3
Composer
MySQL or another database supported by Laravel
Node.js and npm (for frontend dependencies)
Google Maps API Key

## Instructions
Step 1: Clone the Repository
git clone https://github.com/yourusername/your-repo.git
cd your-repo

Step 2: Install Dependencies
composer install
npm install
npm run dev

Step 3: Configure Environment Variables (Environment Configuration)
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost
LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

GOOGLE_MAPS_API_KEY=your_google_maps_api_key

Step 4: Run Migrations
php artisan migrate

Step 5: Start the Server
php artisan serve

Step 6: Access the Application
Open your web browser and navigate to http://localhost:8000

## Usage
On the homepage, enter the name of the food truck or any related keyword in the search box.
Click the "Search" button to display the food truck's location on the map and details in the table.

## Deployment

Step 1: Prepare for Deployment
Ensure that your environment variables are correctly set up on the production server.

Step 2: Build Assets
Run the following command to build the frontend assets for production: npm run prod

Step 3: Migrate the Database
Run the database migrations on the production server: php artisan migrate --force

Step 4: Serve the Application
Use a web server like Apache to serve the application. Ensure that the document root points to the public directory of the Laravel application.

## Future Improvements
Error Handling: Improve error handling and user feedback for better UX.
Automated Tests: Add more comprehensive automated tests for both unit and integration testing.
Pagination: Implement pagination for displaying a large number of food trucks.
Search Optimization: Improve the search functionality to handle more complex queries and filters.
Security: Implement additional security measures, such as rate limiting and input validation.
Unit Tests: Create unit tests to ensure the functionality of the CsvImportService and LocationController. 
Integration Tests: Create integration tests to ensure the end-to-end functionality of the application.
