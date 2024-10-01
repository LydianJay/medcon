<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',                   'Home::index');
$routes->get('/signup',             'Home::sign_up');
$routes->get('/optionview',         'Home::optionview');
$routes->get('/signupfaculty',      'Home::sign_up_faculty');
$routes->post('/register',          'Home::register');
$routes->post('/registerfaculty',   'Home::register_faculty');
$routes->post('/signin',            'Home::signin');