<?php
require_once('commun/connect.php');
require_once('./app/router.php');

$router = new Router($base);

$router->url();

?>