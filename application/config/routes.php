<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['wishes/index']='wishes/index';
$route['wishes/create']='wishes/create';
$route['wishes/update']='wishes/update';
$route['wishes/(:any)']='wishes/view/$1';
$route['wishes']='wishes/index';

$route['default_controller'] = 'pages/view';

$route['categories/create'] = 'categories/create';
$route['categories'] = 'categories/index';
$route['categories/posts/(:any)']='categories/posts/$1';

$route['priorities'] = 'priorities/index';
$route['priorities/posts/(:any)']='priorities/posts/$1';

$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
