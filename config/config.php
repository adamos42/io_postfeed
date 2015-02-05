<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
$config['module']['ajax_shoutbox'] = array
(
    'module'        => "ajax_shoutbox",
    'name'          => "Shoutbox Module",
    'description'   => "Ajax shoutbox module",
    'author'        => "Adamos42",
    'version'       => "0.1.0",
    
    'uri'           => 'ajax_shoutbox',
    'has_admin'     => TRUE,
    'has_frontend'  => TRUE,
);
 
return $config['module']['ajax_shoutbox'];
