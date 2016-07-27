<?php
session_start();
require 'config.php';
$_SESSION['status'] = '';
date_default_timezone_set('America/Sao_Paulo');

spl_autoload_register(function ($class){
	if(strpos($class, 'Controller') > -1) {
		if(file_exists('controllers/'.$class.'.php')) {
			require_once 'controllers/'.$class.'.php';
		} else {
			require_once 'views/paginainvalida.php';
		}
	} else if(file_exists('models/'.$class.'.php')) {
		require_once 'models/'.$class.'.php';
	} else if(file_exists('core/'.$class.'.php')) {
		require_once 'core/'.$class.'.php';
	} else if (file_exists('tests/'.$class.'.php')){
		require_once 'tests/'.$class.'.php';
	} else {
		require_once 'views/paginainvalida.php';
	}
});

$core = new Core();
$core->run();
?>
