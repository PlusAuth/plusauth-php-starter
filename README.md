<div align="center">
  <a href="https://plusauth.com/">
    <img src="https://docs.plusauth.com/favicon.png" alt="Logo" width="144">
  </a>
</div>

<h1 align="center">PlusAuth PHP Starter Project</h1>

 <p align="center">
    Simple PHP project demonstrates basic authentication flows with PlusAuth
    <br />
    <br />
    <a href="https://docs.plusauth.com/quickStart/web/php" target="_blank"><strong>Explore the PlusAuth PHP docs »</strong></a>
</p>

<details>
  <summary>Table of Contents</summary>
    <li><a href="#about-the-project">About The Project</a></li>
    <li><a href="#prerequisites">Prerequisites</a></li>
    <li><a href="#getting-started">Getting Started</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#what-is-plusauth">What is PlusAuth</a></li>
 </ol>
</details>

---

## About The Project

It is a simple `PHP` project demonstrating basic authentication flows such as register, login, and logout. `Jumbojett\OpenIDConnectClient` is used for authentication to keep things simple.

## Prerequisites

Before running the project, you must first follow these steps:

1. Create a PlusAuth account and a tenant at https://dashboard.plusauth.com
2. Navigate to the `Clients` tab and create a client of type `Regular Web Application`
3. Go to the details page of the client that you've just created and set the following fields as:

   - Redirect Uris: http://localhost:3000/login.php

   - Post-Logout Redirect Uris: http://localhost:3000/

Finally, write down your Client Id and Client Secret for server configuration

## Getting Started

First, we need to configure the server. Rename `.env.example` to `.env`.

Then configure the `.env` file using your Client Id, Client Secret, and your PlusAuth tenant name.

**_Note:_** `composer` must be installed on your system to install project dependencies.

You can run the project with the following options:

### With PHP command

**_Note:_** You must have `curl` and `XML` extensions for PHP installed and enabled.

Install following packages if not installed on your system

    sudo apt-get install composer zip php-curl php-xml

Install dependencies:

    composer install

Start the server:

    php -S localhost:3000 -t public

### With Docker-Compose

Install dependencies:

    composer install

Finally, start the server:

    docker-compose up

The example is hosted at http://localhost:3000/

## License

The project is licensed under the MIT license. See the [LICENSE](LICENSE) file for more info.

## What is PlusAuth

PlusAuth helps individuals, teams, and organizations to implement authorization and authentication systems in a secure, flexible and easy way.

<a href="https://plusauth.com/" target="_blank"><strong>Explore the PlusAuth Website »</strong></a>

<a href="https://docs.plusauth.com/" target="_blank"><strong>Explore the PlusAuth Docs »</strong></a>

<a href="https://forum.plusauth.com/" target="_blank"><strong>Explore the PlusAuth Forum »</strong></a>
