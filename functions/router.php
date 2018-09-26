<?php

class route{
	public $page;
	private $_uri = array();
	private $_method = array();

	public function add($uri, $method = Null)
	{
		$this->_uri[] = "/" . trim($uri, '/') . "(/)?";

		if($method != Null){
			$this->_method[] = $method;
		}
	}
 	
	public function submit()
	{
		$uri_param = isset($_GET['page']) ? "/" . $_GET['page'] : '/';

		foreach ($this->_uri as $uriKey => $uriValue) {

			if (preg_match("#^$uriValue$#", $uri_param)) {
				$useMethod =  $this->_method[$uriKey];
				if(is_string($useMethod)){
					load_page($useMethod);
				}else{
					call_user_func($useMethod);
				}

				$_404 = FALSE;
				break;
			}
			
		}
		
		if(!isset($_404)){
			load_page('errors/404');
		}

	}
}
