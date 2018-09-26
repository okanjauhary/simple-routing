<?php

// error_reporting(0);
if(file_exists('core/init.php')){

	require_once 'core/init.php';
	$route->submit();

}else{
	echo "Opps! your file is not found";
}
