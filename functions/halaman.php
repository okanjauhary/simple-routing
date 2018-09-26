<?php

// loading page

function load_page($file)
{
	if(file_exists('views/'.$file.'.php')){
		require_once 'views/'.$file.'.php';
	}else{
		require_once 'views/'.$file.'.html';
	}
}

// url base

function base_url($path = Null)
{
	$site = "http://localhost/routing/";
	return $site.$path;
}

// assets

function assets($file = Null)
{
	return base_url('assets/'.$file);
}