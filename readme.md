# Trip 

API "Trip" built in Laravel 

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them:

The Laravel framework has a few system requirements. Of course, all of these requirements are satisfied by the Laravel Homestead virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment.

However, if you are not using Homestead, you will need to make sure your server meets the following requirements:

```
PHP >= 7.0.0
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension

```
 
  

### Installing

A step by step series of examples that tell you have to get a development env running:
```
1-Install the composer from the root of the project.
2-Duplicate .env.exapmle to .env and register the DB info.
3-Run: php artisan migration to create the tables.
4-Run: php artisan db:seed.
```

 
If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command. This command will start a development server at http://localhost:8000:

```
5-php artisan serve 
```
 
 



## Running the tests

In order to test our API, we need to use an http debugger like fiddler or postman
for Get request we need to put the following commands :


```
The URLs:
http://localhost:8000/api/airports
or
http://localhost:8000/api/flights

The header :
Host: localhost:8000
Content-Type:application/json
```


For POST and Delete request we need the following commands 

Create a trip (POST request):
```
The URL:
http://localhost:8000/api/flights

The header: 

Host: localhost:8000
Content-Type: application/json
Accept: application/json 
Authorization: Bearer + "Token"

in the Body "jason format": 
{
   "flightNumber":"JWM54321",
   "status":"ontime",
   "arrival":
   {
      "datetime":"2017-04-10 22:34:01",
      "iataCode":"trU"
   },
   "departure":
  {
     "datetime":" 2017-04-10 21:34:01",
     "iataCode":"aWs"
  }
}
```


Delete trip (DELETE request):

```
Url:
http://localhost:8000/api/flights/"flightnumber"


The header:

Host: localhost:8000
Content-Type: application/json
Accept: application/json 
Authorization: Bearer + "Token"
```


## Break down into end to end tests
```
* When fetching the data using  GET request, we should get 200 or 404 in case any error
 
* When adding a trip (flight) using POST request, we should get 201 or 500 in case any error
 
* When deleting a trip and using DELETE request, we should get 204 or 500 in case any error
```
 

### And coding style tests

This api tests the http requests (GET,POST,DELETE,..).

 
### The Gaurd (Password/Token):

When developing an api, one of the most important of its requirments is to apply the authentication . Laravel provides gaurd out of the box.
For real applications we should use Password which was released  afther Laravel version  5.3. However for testing purpose, we can use token  which we use
in this demo test.

#Front-end link:
This  is the Front-end part of trip finder project "https://github.com/saeid78/Front-Trip".

## Built With

* [Laravel](https://laravel.com/docs/5.5/) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Management
 

 
