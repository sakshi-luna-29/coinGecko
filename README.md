**Laravel CoinGecko API Data Fetcher
**This is a Laravel project that includes an artisan command to fetch data from the Coingecko API endpoint and store it in a database. It allows you to retrieve coin data and keep it up-to-date in your application's database.

**Requirements**
PHP (>= 7.4)
Composer
MySQL database

**1) Installation**
Clone the repository:

git clone https://github.com/sakshi-luna-29/coinGecko.git

**2) Navigate to the project directory: **
cd coinGecko

**3) Install project dependencies using Composer:**
composer install

**4)Copy the .env.example file and rename it to .env:**

**5)Update the .env file with your database connection details:**
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

**6)Run the migrations to create the necessary tables:**

 php artisan migrate

**7)Obtain a Coingecko API key by signing up at Coingecko. Update the COINGECKO_API_KEY value in the .env file with your API key:**
COINGECKO_API_KEY=your_coingecko_api_key

**8) You're ready to use the command! Run the following command to fetch the coin data and store it in the database:**    
     php artisan coin:fetch-store

