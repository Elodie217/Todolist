<?php
spl_autoload_register(function($class){
	$class = strtr($class,"\\",DIRECTORY_SEPARATOR);
	require_once($class.".php");
});