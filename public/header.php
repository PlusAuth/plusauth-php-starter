<?php 
require_once('./auth.php');

$user = $auth->getUser();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Plusauth Starter Template</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <style>
      body {
        padding-top: 5rem;
      }
    </style>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/">Plusauth Starter</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto"></ul>
        <?php if($auth->isLoggedIn()) { ?>
        <li class="nav-item navbar-nav">
          <a class="nav-link" href="/profile.php">
            Logged in as: <?php echo $user->username ?>
          </a>
        </li>
        <a class="nav-link" href="/logout.php">
          Logout
        </a>
        <?php } else { ?>
        <li class="nav-item navbar-nav">
          <a class="nav-link" href="/login.php">
            Login
          </a>
        </li>
        <?php } ?>
      </div>
    </nav>
    <main role="main" class="container">