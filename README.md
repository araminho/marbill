# Marbill emails
A simple tool for Email marketing. Created with Laravel framework. 

Here are the steps you need to do for making this project work.

1. Clone the repository
2. Create a virtual host that follows `/public` folder or run `php -S localhost:8081 -t ./public`
3. Run`composer update`
4. Create a mysql database
5. Create an `.env` file, copying from `.env.example`
6. Change values for DB connection
7. Run `php artisan key:generate`
8. Run `php artisan migrate`

After deploying 
1. Go to `/register` page and create a new user (no email confirmation)
2. After logging in create a new customer group.
3. Create a new customer.
4. Create a new template.
5. Create a new campaign.

#### Source code
There are 4 models created with their respective controllers and view files:
* Customer
* CustomerGroup
* Template
* Campaign
