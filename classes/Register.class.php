<?php 

class Register
{
	public function run() 
	{
		$view = new View();
		$view->setTemplateFile('views/register.php');
		echo $view->render();
	}
}