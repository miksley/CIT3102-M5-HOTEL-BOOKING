# **CIT 3102 — MIDTERM ACTIVITY 2**

### BUILD YOUR OWN API

**Name:** Thea Mikaela S. Santos  
**Year & Section:** 3rd Year \- IT3E  
**Chosen Resource:** Hotel Booking  
---

        Project Setup

The Hotel Booking API is a Laravel project that enables users to create an account, log in and manage their hotel booking data. It is possible to add, view, edit, filter and delete one’s hotel booking information. The project uses SQLite database to store booking data and Laravel Sanctum to secure the API routes that require authentication. Bruno is used to test the API. 

**Technologies Used:**

* PHP  
* Laravel  
* SQLite  
* Laravel Sanctum  
* Bruno

        INSTALLATION SETUP

**STEP 1: Clone the repository**

1. 

- git clone \[https\://github.com/miksley/CIT3102-M5-HOTEL-BOOKING.git\]  
- cd hotel-booking-api

Replace the placeholder with the actual GitHub repository URL.

**STEP 2: Install the dependencies**

- composer install

If Composer is not installed globally, use the Composer PHAR file.

**STEP 3: Set up the environment file**

Copy .env.example to .env if the file does not already exist.

- copy .env.example .env

Generate the application key:

- php artisan key:generate

**STEP 4: Configure the database**

Set the database connection in .env:

- DB\_CONNECTION=sqlite

Make sure the SQLite database file exists at **database/database.sqlite**.

**STEP 5: Run the migrations**

- php artisan migrate

This creates the database tables needed by the application.

**STEP 6: Start the Laravel server**

- php artisan serve

The API will be available at: **http\://127.0.0.1:8000**

Make sure you keep the terminal open while testing the API.

        API Routes

The base URL is **http\://127.0.0.1:8000/api**.

| Verb | Path | Description | Token Required |
| :---- | :---- | :---- | ----- |
| POST | /register | Creates a new user account  | No |
| POST | /login | Checks the user's login details and returns a token  | No |
| GET | /me | Gets the currently authenticated user  | Yes |
| POST | /logout | Logs out the user by revoking the current token  | Yes |
| GET | /bookings | Gets all bookings and supports filtering | Yes |
| POST | /bookings | Creates a new hotel booking  | Yes |
| GET | /bookings/{id} | Gets one booking using its ID  | Yes |
| PUT | /bookings/{id} | Updates an existing booking  | Yes |
| DELETE | /bookings/{id} | Deletes a booking using its ID  | Yes |

**Booking Fields**

* **guest\_name** \- Name of the guest  
* **hotel\_name** \- Name of the hotel  
* **room\_type** \- Type of room booked  
* **nights** \- Number of nights booked  
* **total\_price** \- Total price of the booking  
* **guests** \- Number of guests

**Filtering Bookings**

* **GET /api/bookings?room\_type=Deluxe** – Filters bookings by room type.  
* **GET /api/bookings?nights=3** – Filters bookings by number of nights.

Both filtering requests require a valid Bearer Token.

        BRUNO TESTING SCREENSHOTS

The following screenshots represent the API requests and their corresponding responses tested in Bruno. 

1. **Register**

2. **Login**

3. **Get Bookings With No Token**

4. **Get Bookings With Token**

5. **Create Booking With Valid Data**

6. **Create Booking With A Required Field Missing**

7. **Get One Booking**

8. **Get a Non-Existing Booking**

9. **Update Booking with Changed Data**

10. **Delete Booking**

        BRUNO TESTING SCREENSHOTS

A 204 No Content status indicates that the request was successful, but the server is not returning any body content. A 200 OK status also indicates a success request but usually has body content sent back with it, such as a confirmation message. If a booking is deleted successfully, our API would send back 204 No Content because the record in the database was deleted, so no additional confirmation is needed. That is why a 204 status is used for a DELETE request.

