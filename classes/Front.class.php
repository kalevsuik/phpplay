<?php 

class Front
{
	protected $routes = array();  //avalikult ei saa ligi, aga laiendada saab
	protected $controllerDir;

	protected $defaultController;
	
	public function __construct($routes) 
	{
		$this->routes = $routes;
	}
	
	public function dispatch() {
		
		$controller = $this->defaultController;
		if (isset($_REQUEST['action']) && array_key_exists($_REQUEST['action'], $this->routes))
		{
			$controller = $this->routes[$_REQUEST['action']];
		}	
		
		require_once($this->controllerDir . $controller . '.class.php');
		$controller = new $controller();
		$controller->run();
	}

	public function setControllerDir($controllerDir)
	{
	    $this->controllerDir = $controllerDir;
	}

	public function setDefaultController($defaultController)
	{
	    $this->defaultController = $defaultController;
	}
}