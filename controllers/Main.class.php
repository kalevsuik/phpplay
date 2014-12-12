<?php 

class Main
{
	public function run()
	{
		$view = new View();
		$view->setTemplateFile('views/main.php');
		echo $view->render();
	}
}