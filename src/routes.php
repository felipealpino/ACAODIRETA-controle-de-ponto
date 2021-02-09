<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/signin', 'LoginController@signin');
$router->post('/signin', 'LoginController@signinAction');

$router->get('/cadastro_user', 'LoginController@signup_user');


$router->get('/cadastro_colaborador', 'LoginController@signup_colaborador');
$router->post('/cadastro_colaborador', 'LoginController@signup_colaborador_action');
