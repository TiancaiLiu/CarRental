<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE' => 'mysql',
	'DB_HOST' => 'localhost',
	'DB_NAME' => 'carshop',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_PORT' => 3306,
	'DB_PREFIX' => 'cs_',
	'DB_CHARSET' => 'utf8',

	'MODULE_ALLOW_LIST' => array('Home', 'Admin'),
	'DEFAULT_MODULE' => 'Home',

	//'SHOW_PAGE_TRACE' => true,

	'URL_ROUTER_ON'   => true,
	'URL_MODEL' => 2,
	'URL_HTML_SUFFIX' => 'html|shtml|xml',
);