<?php

class Router
{
	private $path, $ismodule, $controller, $action;
	static $instance;

	public function __construct()
	{
			
		$request = (empty($_GET['request'])) ? '' : $_GET['request'];
		$split = explode('/',trim($request,'/'));
		
		$route = (empty($_GET['request'])) ? '' : $_GET['request'];
		$this->route = explode('/', $route);
		
		switch($split[0]){
			case 'modules':
				$this->ismodule = true;
				/*** load arguments for action ***/
					$arguments = array();
					foreach ($this->route as $key => $val) 
					{
						if ($key == 0 || $key == 1 || $key = 2)
						{
							switch($key){
								case 0:
								break;
								case 1:
									$this->controller = $val;
								break;
								case 2:
									$this->action = $val;
								break;
							}
						}
						else
						{
							$arguments[$key] = $val;
						}
					}
			
					
					$this->arguments = $arguments;
		
			
			break;
			default:
				$this->ismodule = false;
				/*** load arguments for action ***/
					$arguments = array();
					foreach ($this->route as $key => $val) 
					{
						if ($key == 0 || $key == 1)
						{
							
						} else {
						 $arguments[$key] = $val;
						}
					}
			
					$this->controller = !empty($split[0]) ? $split[0] : 'index';
					$this->action = !empty($split[1]) ? $split[1] : 'index';
					$this->arguments = $arguments;
		
		
			break;
		}
		
		
	}

	public function route($registry)
	{
		require_once('BaseController.class.php');
		if($this->ismodule){
			
			$file = __APP_PATH.'/modules/'.$this->controller.'/controllers/' . $this->controller . '.controller.php';
			
		} else {
		
			$file = __APP_PATH.'/controllers/' . $this->controller . '.controller.php';
		
		}
		if(is_readable($file))
		{
			include $file;
			$class = $this->controller . 'Controller';
		}
		else
		{
			include __APP_PATH.'/controllers/error.controller.php';
			$class = 'ErrorController';
		}
		$controller = new $class($registry);

		if (!empty($this->action))
		//call_user_func_array(array($controller, $this->action), $this->arguments);
			$action = $this->action;
		else
			$action = 'index';
		
		call_user_func_array(array($controller, $action), $this->arguments);
		//$controller->$action();
	}
}
