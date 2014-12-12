<?php 

class Feedback
{
	public function run()
	{
		// pole sisse loginud
		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1)
		{
			$view = new View();
			$view->setTemplateFile('views/login_error.php');
			echo $view->render();
			return;
		}
		
		$view = new View();
		$view->setTemplateFile('views/feedback.php');
		echo $view->render();
	}
}