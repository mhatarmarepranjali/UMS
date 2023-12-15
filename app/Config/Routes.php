<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->post('home', 'Home::processFormData');
$routes->post('userstore', 'Home::store');
$routes->post('update', 'Home::update');

$routes->get('edit/(:num)', 'Home::edituser/$1');
$routes->get('view/(:num)', 'Home::viewuser/$1');
$routes->get('delete/(:num)', 'Home::delete/$1');
//$routes->get('upload', 'Home::index');
$routes->post('upload/do_upload', 'Home::do_upload');
$routes->get('excel/export', 'Home::exportToExcel');
$routes->get('/generate-pdf', 'Home::generatePDF');
$routes->get('/export-to-pdf', 'Home::exportToPDF');

//$routes->post('form/processFormData', 'Home::processFormData');
// $routes->post('ajax-handler', 'Home::ajaxHandler');
