<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$route['default_controller'] = "ajax_shoutbox";
$route['(.*)'] = "ajax_shoutbox/index/$1";
$route[''] = 'ajax_shoutbox/index';

