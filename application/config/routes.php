<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['update-profile'] = 'auth/update_profile';
$route['login'] = 'auth/login';
$route['forgot_password'] = 'auth/forgot_password';
