<?php
require 'environment.php';

global $config;
$config = array();
if(AMBIENTE == 'development') {
	$config['dbname'] = 'redesocial';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	$config['dbname'] = 'redesocial';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

?>