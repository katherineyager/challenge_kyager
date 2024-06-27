## FOOD TRUCK PROJECT
This project is a Laravel application designed to manage and search for food truck locations in San Francisco. It reads data from a CSV file, stores it in a database, and displays the information on a web page. Users can search for specific locations by the applicant's name and view details and a map of the location.

This project uses Larvel latest version(11), built-in MVC architecture.

This project use Laravel's initial structure provides a well-organized foundation for web application development. It includes key directories like app/ for application logic, public/ as the web root, routes/ for defining application routes, and resources/ for views and assets. Important files include .env for environment configurations and artisan for command-line tasks.

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

## Project Structure Description  
Routes: Defines routes for the application, including search.  
Controllers: LocationController handles the main logic for displaying the main page, importing data, and searching locations.  
Services: CsvImportService handles CSV import functionality into the database.  
Models: Location represents the data model, defines the Location model and specifies the fillable fields.  
Views: index.blade.php for the main interface. Defines the main user interface for searching and displaying location data.  
Migrations: Defines the locations table structure.  

## Instructions
Step 1: Clone the Repository  
git clone https://github.com/katherineyager/challenge_kyager.git  
cd challenge_kyager (repo)  

Step 2: Configure Environment Variables (Environment Configuration)  
Rename the file .env.example to .env  
mv .env.example .env  

Step 3: Build and Start the Containers  
docker-compose up -d --build  

Step 4: Install Dependencies  
docker-compose exec app composer install  
docker-compose exec app npm install  
docker-compose exec app npm run dev  

Step 5: Run Migrations  
docker-compose exec app php artisan migrate  

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

