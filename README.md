 # E-commerce managment system

A brief description of your project and what it does.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)


## Features

- User authentication (registration, login, logout)
- Product management (CRUD operations)
- Order placement
- Responsive design

## Installation

Follow these steps to set up the project locally:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/your-repo.git
Navigate to the project directory:
bash

Copy
cd your-repo
Install dependencies:
bash

Copy
composer install
Copy the environment file:
bash

Copy
cp .env.example .env
Generate the application key:
bash

Copy
php artisan key:generate
Set up your database:
Create a new database in your preferred database management system.
Update the database configuration in the .env file.
Run migrations:
bash

Copy
php artisan migrate
Seed the database (optional):
bash

Copy
php artisan db:seed
Run the application:
bash

Copy
php artisan serve
Access your application at http://localhost:8000.
Usage
Navigate to the registration page to create a new account.
Log in with your credentials.
Explore the products and place orders.
API Endpoints
Authentication
POST /register - Register a new user
POST /login - Log in an existing user
POST /logout - Log out the logged-in user
Products
GET /products - Get all products
GET /products/{id} - Get a single product by ID
GET /products/search/{name} - Search for products by name
POST /products - Create a new product (protected)
PUT /products/{id} - Update a product by ID (protected)
DELETE /products/{id} - Delete a product by ID (protected)
Orders
POST /orders - Place a new order (protected)
Contributing
Fork the project.
Create your feature branch (git checkout -b feature/AmazingFeature).
Commit your changes (git commit -m 'Add some AmazingFeature').
Push to the branch (git push origin feature/AmazingFeature).
Open a pull request.
 
 
___________________________________________________________________________________


 these are the api routes in post man:
Public Routes for Authentication
Register User
Method: POST
URL: http://localhost:8000/register
Body: Choose raw and set it as JSON. Example:
json


{
  "name": "hala hasan",
  "email": "hala.hasan.hh@gmail",
  "password": "123456"
}
Login User
Method: POST
URL: http://localhost:8000/login
Body: Choose raw and set it as JSON. Example:
json


{
  "email": "hala.hasan.hh@gmail",
  "password": "123456"
}
Public Routes for Products
Get All Products
Method: GET
URL: http://localhost:8000/products

Get Single Product
Method: GET
URL: http://localhost:8000/products/{id} (replace {id} with an actual product ID)

Search Products
Method: GET
URL: http://localhost:8000/products/search/{name} (replace {name} with a product name)

Protected Routes for Products and Logout
Logout User
Method: POST
URL: http://localhost:8000/logout
Authorization: Use Bearer Token (the token you received after logging in).

Create Product (Protected)
Method: POST
URL: http://localhost:8000/products
Body: Choose raw and set it as JSON. Example:
json

{
  "name": "New Product",
  "description": "Product Description",
  "price": 29.99
}

Update Product (Protected)
Method: PUT
URL: http://localhost:8000/products/{id} (replace {id} with the actual product ID)
Body: Choose raw and set it as JSON. Example:
json

Copy
{
  "name": "Updated Product",
  "description": "Updated Description",
  "price": 39.99
}

Delete Product (Protected)
Method: DELETE
URL: http://localhost:8000/products/{id} (replace {id} with the actual product ID)

Place Order (Protected)
Method: POST
URL: http://localhost:8000/orders
Body: Choose raw and set it as JSON. Example:
json

Copy
{
  "product_id": 1,
  "quantity": 2
}