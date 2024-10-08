<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',                                   'Home::index');
$routes->get('/signup',                             'Home::sign_up');
$routes->get('/optionview',                         'Home::optionview');
$routes->get('/signupfaculty',                      'Home::sign_up_faculty');
$routes->get('/dashboard',                          'Dashboard::index');
$routes->get('/appointments',                       'Appointments::index');
$routes->get('/appointments/form',                  'Appointments::form');
$routes->get('/admin/appointments',                 'Admin::index');
$routes->get('/admin/modify/(:num)',                'Admin::modify/$1');
$routes->get('/admin/inventory',                    'Inventory::index');
$routes->get('/admin/inventory/add',                'Inventory::add');
$routes->get('/admin/inventory/modify',             'Inventory::modify');
$routes->get('/admin/registrar',                    'Registrar::index');

$routes->post('/register',                          'Home::register');
$routes->post('/registerfaculty',                   'Home::register_faculty');
$routes->post('/signin',                            'Home::signin');
$routes->post('/signout',                           'Dashboard::signout');
$routes->post('/appointments/submit',               'Appointments::submitform');
$routes->post('/admin/schedule/(:num)',             'Admin::schedule/$1');
$routes->post('/admin/inventory/addmed',            'Inventory::post_add');
$routes->post('/admin/inventory/apply',             'Inventory::apply');
$routes->post('/admin/inventory/delete',            'Inventory::delete');