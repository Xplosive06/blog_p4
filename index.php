<?php 
include_once('_config.php');

MyAutoload::start();

(isset($_GET['r'])) ? $request = $_GET['r'] : header("HTTP/1.0 404 Not Found");

$router = new Router($request);
$router->renderController();