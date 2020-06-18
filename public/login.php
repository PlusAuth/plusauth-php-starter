<?php 
require_once('./auth.php');

$auth->login();

header('Location: index.php');
die();

?>