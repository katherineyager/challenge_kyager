## FOOD TRUCK PROJECT
This project is a Laravel application designed to manage and search for food truck locations in San Francisco. It reads data from a CSV file, stores it in a database, and displays the information on a web page. Users can search for specific locations by the applicant's name and view details and a map of the location.

## Project Structure
Routes: Defines routes for the application,including  search .
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

Step 3: Configure Environment Variables
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
GOOGLE_MAPS_API_KEY=your_google_maps_api_key

Step 4: Run Migrations
php artisan migrate

Step 5: Start the Server
php artisan serve

Step 6: Access the Application
Open your web browser and navigate to http://localhost:8000