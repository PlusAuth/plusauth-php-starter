# Plusauth PHP Starter Project



This is a very simple PHP project demonstrating basic authentication flows such as register, login and logout. To keep things simple we used Jumbojett\OpenIDConnectClient for authentication.


## Table of Contents

- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
- [License](#license)

## Prerequisites
Before running the project, you must first follow these steps:

1) Create a Plusauth account and a tenant at https://dashboard.plusauth.com
2) Navigate to `Clients` tab and create a client of type `Regular Web Application`.
3) Go to details page of the client that you've just created and set the following fields as:
* Redirect Uris: http://localhost:3000/login.php
* Post Logout Redirect Uris: http://localhost:3000/


 Finally write down your Client Id and Client Secret for server configuration 
## Getting Started

First we need to configure the server. Rename `.env.example` file as just`.env`.

Then configure the `.env` file using your Client Id, Client Secret and your Plusauth tenant name.

### With PHP command
Note: You must have curl and xml extensions for php installed and enabled.

Finally start the server:

        composer install
        php -S localhost:3000 -t public

### With Docker-Compose

Finally start the server:

        composer install
        docker-compose up

The example is hosted at http://localhost:3000/

## License

This project is licensed under the MIT license. See the [LICENSE](LICENSE) file for more info.
