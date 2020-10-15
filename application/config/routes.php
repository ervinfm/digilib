<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ============== Authentication ===========================
$route['login'] = 'home/login';
$route['forgot'] = 'home/forgot';
$route['register'] = 'home/register';
$route['logout'] = 'auth/logout';
